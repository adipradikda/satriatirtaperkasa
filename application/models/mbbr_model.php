<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mbbr_model extends CI_Model {

	public function simpan($data){
		$this->db->insert('mbbr',$data);

	}
	public function tampil(){
		$data = $this->db->get('mbbr');
		return $data->result();
	}
	public function delete($id){
		$this->db->where('id_date_note',$id);
		$data = $this->db->delete('mbbr');
	}
	public function edit($id){
		$this->db->where('id',$id);
		$data = $this->db->get('mbbr');

		return $data->row();

	}
	public function simpan_edit($data,$id){
		$this->db->where('id_date_note',$id);
		$data = $this->db->update('mbbr',$data);
	}
}