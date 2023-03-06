<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daily_report extends CI_Controller {



	public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model('flow_rate_model','frm');
        $this->load->model('inlet_outlet_model','io');
        $this->load->model('chemical_model','cmc');
        $this->load->model('mbbr_model','mbbr');
        $this->load->model('hasil_olahan_sludge_model','hos');
        $this->load->model('buang_limbah_disumpit_model','blds');
        $this->load->model('date_note_model','dt');
    }

	public function index()
	{
		$year 	= date('Y');
		$month  = (int) date('m');

		$data['date_note'] 	= $this->dt->tampil();
		$data['fyear'] 		= $year;
		$data['fmonth'] 	= $month;
		$this->load->view('administrator/daily_report',$data);

	}

	public function simpan()
	{
		//data view to controlers
		$date 		= str_replace('/','-',$this->input->post('date'));
		$date 		= date('Y-m-d',strtotime($date));
		$awal 		= $this->input->post('awal');
		$akhir 		= $this->input->post('akhir');
		$proses 	= $this->input->post('proses');
		$awal_1 		= $this->input->post('awal_1');
		$akhir_1 		= $this->input->post('akhir_1');
		$proses_1 	= $this->input->post('proses_1');
		$ph 		= $this->input->post('ph');
		$tds 		= $this->input->post('tds');
		$ph_1		= $this->input->post('ph_1');
		$tds_1 		= $this->input->post('tds_1');
		$fecl3 		= $this->input->post('fecl3');
		$anion 		= $this->input->post('anion');
		$cation 	= $this->input->post('cation');
		$coustik 	= $this->input->post('coustik');
		$bakteri 	= $this->input->post('bakteri');
		$tsp 		= $this->input->post('tsp');
		$antifoam 	= $this->input->post('antifoam');
		$ph_2 		= $this->input->post('ph_2');
		$tds_2 		= $this->input->post('tds_2');
		$sv30 		= $this->input->post('sv30');
		$stok 		= $this->input->post('stok');
		$karung 	= $this->input->post('karung');
		$jumbo 		= $this->input->post('jumbo');
		$angkut 	= $this->input->post('angkut');
		$saos 		= $this->input->post('saos');
		$mayones 	= $this->input->post('mayones');
		$keju 		= $this->input->post('keju');
		$ibc 		= $this->input->post('ibc');
		$keterangan = $this->input->post('keterangan');

		//data controlers to models

		$data_dt = array(
			'tanggal'	=> $date,
			'catatan'	=> $keterangan,
		);
		$id_date_note = $this->dt->simpan($data_dt);

		$data_frm = array(
			'id_date_note'			=> 	$id_date_note,
			'awal_inlet'			=>	$awal,
			'akhir_inlet'			=>	$akhir,
			'hasil_proses_m3_1'		=>	$proses,
			'awal_outlet'			=>	$awal_1,
			'akhir_outlet'			=>	$akhir_1,
			'hasil_proses_m3_2'		=>	$proses_1,

		);

		$data_io = array(
			'id_date_note'		=> 	$id_date_note,
			'ph_eq'				=>	$ph,
			'tds_eq'			=>	$tds,
			'ph_daf'			=>	$ph_1,
			'tds_daf'			=>	$tds_1,
			
		);

		$data_cmc = array(
			'id_date_note'		=> 	$id_date_note,
			'fecl3'				=> $fecl3,
			'anion'				=> $anion,
			'cation'			=> $cation,
			'coustik'			=> $coustik,
			'bakteri'			=> $bakteri,
			'tsp'				=> $tsp,
			'antifoam'			=> $antifoam,
		);

		$data_mbbr = array(
			'id_date_note'		=> 	$id_date_note,
			'ph'				=> 	$ph_2,
			'tds'				=> 	$tds_2,
			'sv_30'				=> 	$sv30,
		);

		$data_hos = array(
			'id_date_note'		=> 	$id_date_note,
			'stok_karung'		=> 	$stok,
			'karung_sak'		=> 	$karung,
			'jumbo_bag'			=> 	$jumbo,
		);

		$data_blds = array(
			'id_date_note'			=> 	$id_date_note,
			'angkut_mobil_limbah'	=> 	$angkut,
			'saos'					=> 	$saos,
			'mayones'				=> 	$mayones,
			'keju'					=> 	$keju,
			'ibc'					=> 	$ibc,
		);

		//$config['upload_path']          = './assets/uploads/improvment/';
        //$config['allowed_types']        = 'gif|jpg|png';
        //$config['file_name']            = 'improvment_'.date('YmdHis');
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        //$this->load->library('upload', $config);

		$this->frm->simpan ($data_frm);
		$this->io->simpan ($data_io);
		$this->cmc->simpan ($data_cmc);
		$this->mbbr->simpan ($data_mbbr);
		$this->hos->simpan ($data_hos);
		$this->blds->simpan ($data_blds);

		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Disimpan</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

		redirect('daily_report');
	}

		public function delete()
	{
		$id=$this->input->post('id');
		$this->frm->delete ($id);
		$this->io->delete ($id);
		$this->cmc->delete ($id);
		$this->mbbr->delete ($id);
		$this->hos->delete ($id);
		$this->blds->delete ($id);
		$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

		redirect('daily_report');
	}
}
