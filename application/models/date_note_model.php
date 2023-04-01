<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Date_note_Model extends CI_Model {

	public function simpan($data){
		$this->db->insert('date_note',$data);
	   	$insert_id = $this->db->insert_id();

	   	return  $insert_id;
	}
	public function tampil(){
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
		$this->db->order_by('t1.tanggal','asc');
		$this->db->order_by('t1.shift','asc');
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

}