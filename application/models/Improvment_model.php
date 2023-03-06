<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Improvment_model extends CI_Model {

	public function simpan($data){
		$this->db->insert('improvment',$data);

	}
	public function tampil(){
		$data = $this->db->get('improvment');
		return $data->result();
	}
	public function delete($id){
		$this->db->where('id',$id);
		$data = $this->db->delete('improvment');
	}
	public function edit($id){
		$this->db->where('id',$id);
		$data = $this->db->get('improvment');

		return $data->row();

	}
	public function simpan_edit($data,$id){
		$this->db->where('id',$id);
		$data = $this->db->update('improvment',$data);
	}
}