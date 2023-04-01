<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Improvment extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model('improvment_model','imp');
        check_session_login();
    }

	public function index()
	{
		$this->load->library('pagination');

		$config['base_url'] = base_url('improvment');
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->imp->get_count();
		$config['per_page'] = 5;
	  	
	  	// Membuat Style pagination untuk BootStrap v4
      $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-end">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);
		$limit = $config['per_page'];
		$offset = html_escape($this->input->get('per_page'));
		$data['improvment'] = $this->imp->get_data($limit, $offset);

		$this->load->view('administrator/improvment',$data);

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
	public function print(){

	    $data['improvment']=$this->imp->tampil();

	    $this->load->library('pdf');

	    $this->pdf->setPaper('A4', 'potrait');
	    $this->pdf->filename = "Improvment.pdf";
	    $this->pdf->load_view('administrator/improvment_print', $data);
	}
}
