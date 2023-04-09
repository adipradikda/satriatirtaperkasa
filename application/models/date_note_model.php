<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Date_note_Model extends CI_Model {

	public function simpan($data){
		$this->db->insert('date_note',$data);
	   	$insert_id = $this->db->insert_id();

	   	return  $insert_id;
	}
	public function tampil($tahun,$bulan){
		$this->db->select('
			t1.id,t1.tanggal,t1.catatan,t1.shift,
			t2.awal_inlet,t2.akhir_inlet,t2.hasil_proses_m3_1,t2.awal_outlet,t2.akhir_outlet,t2.hasil_proses_m3_2,
			t3.ph_eq,t3.tds_eq,t3.ph_daf,t3.tds_daf,
			t4.fecl3,t4.anion,t4.cation,t4.coustik,t4.bakteri,t4.antifoam,
			t5.ph,t5.tds,t5.sv_30,
			t6.stok_karung,t6.karung_sak,t6.jumbo_bag,
			t7.angkut_mobil_limbah,t7.saos,t7.mayones,t7.keju,t7.ibc,
			(select count(id) from date_note where tanggal = t1.tanggal) as count_tanggal
		');
		$this->db->join('flow_rate as t2','t1.id = t2.id_date_note','left');
		$this->db->join('inlet_outlet as t3','t1.id = t3.id_date_note','left');
		$this->db->join('chemical as t4','t1.id = t4.id_date_note','left');
		$this->db->join('mbbr as t5','t1.id = t5.id_date_note','left');
		$this->db->join('hasil_olahan_sludge as t6','t1.id = t6.id_date_note','left');
		$this->db->join('buang_limbah_disumpit as t7','t1.id = t7.id_date_note','left');
		$this->db->order_by('t1.tanggal','asc');
		$this->db->order_by('t1.shift','asc');
		$this->db->where('year(t1.tanggal)',$tahun);
		$this->db->where('month(t1.tanggal)',$bulan);
		$this->db->from('date_note as t1');
		$data = $this->db->get();
		return $data->result();
	}
	public function delete($id){
		$this->db->where('id',$id);
		$data = $this->db->delete('date_note');
	}
	public function edit($id){
		$this->db->select('
			t1.id,t1.tanggal,t1.catatan,t1.shift,
			t2.awal_inlet,t2.akhir_inlet,t2.hasil_proses_m3_1,t2.awal_outlet,t2.akhir_outlet,t2.hasil_proses_m3_2,
			t3.ph_eq,t3.tds_eq,t3.ph_daf,t3.tds_daf,
			t4.fecl3,t4.anion,t4.cation,t4.coustik,t4.bakteri,t4.antifoam,
			t5.ph,t5.tds,t5.sv_30,
			t6.stok_karung,t6.karung_sak,t6.jumbo_bag,
			t7.angkut_mobil_limbah,t7.saos,t7.mayones,t7.keju,t7.ibc,
		');
		$this->db->join('flow_rate as t2','t1.id = t2.id_date_note','left');
		$this->db->join('inlet_outlet as t3','t1.id = t3.id_date_note','left');
		$this->db->join('chemical as t4','t1.id = t4.id_date_note','left');
		$this->db->join('mbbr as t5','t1.id = t5.id_date_note','left');
		$this->db->join('hasil_olahan_sludge as t6','t1.id = t6.id_date_note','left');
		$this->db->join('buang_limbah_disumpit as t7','t1.id = t7.id_date_note','left');
		$this->db->order_by('t1.id','desc');
		$this->db->where('t1.id',$id);
		$this->db->from('date_note as t1');
		$data = $this->db->get();
		return $data->row();

	}
	public function simpan_edit($data,$id){
		$this->db->where('id',$id);
		$data = $this->db->update('date_note',$data);
	}

	public function chart_flow_inlet_outlet($tahun,$bulan){
		$this->db->select("
			t1.tanggal,
			COALESCE(
				case 
					when t4.hasil_proses_m3_1 = '' OR t4.hasil_proses_m3_1 IS NULL then t2.hasil_proses_m3_1 
					ELSE t4.hasil_proses_m3_1 
				END,0
			) AS inlet,
			COALESCE(
				case 
					when t4.hasil_proses_m3_2 = '' OR t4.hasil_proses_m3_2 IS NULL then t2.hasil_proses_m3_2 
					ELSE t4.hasil_proses_m3_2 
				END,0
			) AS outlet
		");
		$this->db->from('date_note t1');
		$this->db->where('year(t1.tanggal)',$tahun);
		$this->db->where('month(t1.tanggal)',$bulan);
		$this->db->where('t1.shift',1);
		$this->db->join('flow_rate as t2','t1.id = t2.id_date_note');
		$this->db->join('date_note as t3','t3.tanggal = t1.tanggal AND t3.shift = 2');
		$this->db->join('flow_rate as t4','t3.id = t4.id_date_note');
		$this->db->order_by('t1.tanggal','asc');
		$this->db->order_by('t1.shift','asc');
		$data = $this->db->get();
		// debug_json($data->result());
		return $data->result();
	}	

	public function chart_inlet_outlet($tahun,$bulan){
		$this->db->select("
			t1.tanggal,
			COALESCE(case when t4.ph_eq = '' OR t4.ph_eq IS NULL then t2.ph_eq ELSE t4.ph_eq END,0) AS ph_eq,
			COALESCE(case when t4.tds_eq = '' OR t4.tds_eq IS NULL then t2.tds_eq ELSE t4.tds_eq END,0) AS tds_eq,
			COALESCE(case when t4.ph_daf = '' OR t4.ph_daf IS NULL then t2.ph_daf ELSE t4.ph_daf END,0) AS ph_daf,
			COALESCE(case when t4.tds_daf = '' OR t4.tds_daf IS NULL then t2.tds_daf ELSE t4.tds_daf END,0) AS tds_daf
		");
		$this->db->from('date_note t1');
		$this->db->where('year(t1.tanggal)',$tahun);
		$this->db->where('month(t1.tanggal)',$bulan);
		$this->db->where('t1.shift',1);
		$this->db->join('inlet_outlet as t2','t1.id = t2.id_date_note');
		$this->db->join('date_note as t3','t3.tanggal = t1.tanggal AND t3.shift = 2');
		$this->db->join('inlet_outlet as t4','t3.id = t4.id_date_note');
		$this->db->order_by('t1.tanggal','asc');
		$this->db->order_by('t1.shift','asc');
		$data = $this->db->get();
		// debug_json($data->result());
		return $data->result();
	}

	public function chart_chemical($tahun,$bulan){
		$this->db->select("
			t1.tanggal,
			COALESCE(case when t4.fecl3 = '' OR t4.fecl3 IS NULL then t2.fecl3 ELSE t4.fecl3 END,0) AS fecl3,
			COALESCE(case when t4.anion = '' OR t4.anion IS NULL then t2.anion ELSE t4.anion END,0) AS anion,
			COALESCE(case when t4.cation = '' OR t4.cation IS NULL then t2.cation ELSE t4.cation END,0) AS cation,
			COALESCE(case when t4.coustik = '' OR t4.coustik IS NULL then t2.coustik ELSE t4.coustik END,0) AS coustik,
			COALESCE(case when t4.bakteri = '' OR t4.bakteri IS NULL then t2.bakteri ELSE t4.bakteri END,0) AS bakteri,
			COALESCE(case when t4.antifoam = '' OR t4.antifoam IS NULL then t2.antifoam ELSE t4.antifoam END,0) AS antifoam
		");
		$this->db->from('date_note t1');
		$this->db->where('year(t1.tanggal)',$tahun);
		$this->db->where('month(t1.tanggal)',$bulan);
		$this->db->where('t1.shift',1);
		$this->db->join('chemical as t2','t1.id = t2.id_date_note');
		$this->db->join('date_note as t3','t3.tanggal = t1.tanggal AND t3.shift = 2');
		$this->db->join('chemical as t4','t3.id = t4.id_date_note');
		$this->db->order_by('t1.tanggal','asc');
		$this->db->order_by('t1.shift','asc');
		$data = $this->db->get();
		// debug_json($data->result());
		return $data->result();
	}

	public function chart_mbbr($tahun,$bulan){
		$this->db->select("
			t1.tanggal,
			COALESCE(case when t4.ph = '' OR t4.ph IS NULL then t2.ph ELSE t4.ph END,0) AS ph,
			COALESCE(case when t4.tds = '' OR t4.tds IS NULL then t2.tds ELSE t4.tds END,0) AS tds,
			COALESCE(case when t4.sv_30 = '' OR t4.sv_30 IS NULL then t2.sv_30 ELSE t4.sv_30 END,0) AS sv_30
		");
		$this->db->from('date_note t1');
		$this->db->where('year(t1.tanggal)',$tahun);
		$this->db->where('month(t1.tanggal)',$bulan);
		$this->db->where('t1.shift',1);
		$this->db->join('mbbr as t2','t1.id = t2.id_date_note');
		$this->db->join('date_note as t3','t3.tanggal = t1.tanggal AND t3.shift = 2');
		$this->db->join('mbbr as t4','t3.id = t4.id_date_note');
		$this->db->order_by('t1.tanggal','asc');
		$this->db->order_by('t1.shift','asc');
		$data = $this->db->get();
		// debug_json($data->result());
		return $data->result();
	}

	public function chart_hos($tahun,$bulan){
		$this->db->select("
			t1.tanggal,
			COALESCE(case when t4.stok_karung = '' OR t4.stok_karung IS NULL then t2.stok_karung ELSE t4.stok_karung END,0) AS stok_karung,
			COALESCE(case when t4.karung_sak = '' OR t4.karung_sak IS NULL then t2.karung_sak ELSE t4.karung_sak END,0) AS karung_sak,
			COALESCE(case when t4.jumbo_bag = '' OR t4.jumbo_bag IS NULL then t2.jumbo_bag ELSE t4.jumbo_bag END,0) AS jumbo_bag
		");
		$this->db->from('date_note t1');
		$this->db->where('year(t1.tanggal)',$tahun);
		$this->db->where('month(t1.tanggal)',$bulan);
		$this->db->where('t1.shift',1);
		$this->db->join('hasil_olahan_sludge as t2','t1.id = t2.id_date_note');
		$this->db->join('date_note as t3','t3.tanggal = t1.tanggal AND t3.shift = 2');
		$this->db->join('hasil_olahan_sludge as t4','t3.id = t4.id_date_note');
		$this->db->order_by('t1.tanggal','asc');
		$this->db->order_by('t1.shift','asc');
		$data = $this->db->get();
		// debug_json($data->result());
		return $data->result();
	}

	public function chart_bls($tahun,$bulan){
		$this->db->select("
			t1.tanggal,
			COALESCE(case when t4.angkut_mobil_limbah = '' OR t4.angkut_mobil_limbah IS NULL then t2.angkut_mobil_limbah ELSE t4.angkut_mobil_limbah END,0) AS angkut_mobil_limbah,
			COALESCE(case when t4.saos = '' OR t4.saos IS NULL then t2.saos ELSE t4.saos END,0) AS saos,
			COALESCE(case when t4.mayones = '' OR t4.mayones IS NULL then t2.mayones ELSE t4.mayones END,0) AS mayones,
			COALESCE(case when t4.keju = '' OR t4.keju IS NULL then t2.keju ELSE t4.keju END,0) AS keju,
			COALESCE(case when t4.ibc = '' OR t4.ibc IS NULL then t2.ibc ELSE t4.ibc END,0) AS ibc
		");
		$this->db->from('date_note t1');
		$this->db->where('year(t1.tanggal)',$tahun);
		$this->db->where('month(t1.tanggal)',$bulan);
		$this->db->where('t1.shift',1);
		$this->db->join('buang_limbah_disumpit as t2','t1.id = t2.id_date_note');
		$this->db->join('date_note as t3','t3.tanggal = t1.tanggal AND t3.shift = 2');
		$this->db->join('buang_limbah_disumpit as t4','t3.id = t4.id_date_note');
		$this->db->order_by('t1.tanggal','asc');
		$this->db->order_by('t1.shift','asc');
		$data = $this->db->get();
		// debug_json($data->result());
		return $data->result();
	}
}