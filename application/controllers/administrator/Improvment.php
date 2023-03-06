<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Improvment extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model('improvment_model','imp');
    }

	public function index()
	{
		$data['improvment']=$this->imp->tampil();
		$this->load->view('administrator/Improvment',$data);

	}

	public function simpan()
	{
		//data view to controlers
		$judul 		= $this->input->post('judul');
		$keterangan = $this->input->post('keterangan');
		$status 	= $this->input->post('status');

		//data controlers to models
		$data = array(
			'judul'			=> $judul,
			'keterangan'	=>$keterangan,
			'status'		=>$status
		);
		$config['upload_path']          = './assets/uploads/improvment/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = 'improvment_'.date('YmdHis');
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar'))
        {
            $uploaded_data = $this->upload->data();
            $data['gambar'] = $uploaded_data['file_name'];

        }
        else{
        	$data['error'] = $this->upload->display_errors();
        	var_dump($data); exit();
        }
		$this->imp->simpan($data);
		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Disimpan</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

		redirect('improvment');

	}
	public function delete()
	{
		$id=$this->input->post('id');
		$this->imp->delete($id);
		$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Dihapus</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

		redirect('improvment');

	}
	public function edit()
	{
		$id=$this->input->post('id');
		$data=$this->imp->edit($id);
		echo json_encode([
			'data'=>$data

		]);

	}
	public function simpan_edit()
	{
		//data view to controlers
		$id 		= $this->input->post('id');
		$judul 		= $this->input->post('judul');
		$keterangan = $this->input->post('keterangan');
		$status 	= $this->input->post('status');

		//data controlers to models
		$data = array(
			'judul'			=> $judul,
			'keterangan'	=>$keterangan,
			'status'		=>$status
		);
		$config['upload_path']          = './assets/uploads/improvment/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = 'improvment_'.date('YmdHis');
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar'))
        {
            $uploaded_data = $this->upload->data();
            $data['gambar'] = $uploaded_data['file_name'];

        }
        
		$this->imp->simpan_edit($data,$id);
		$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Data Berhasil Diedit</strong>
			  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');

		redirect('improvment');
	}
}
