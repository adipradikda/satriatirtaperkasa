<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chemical_model extends CI_Model {

	public function simpan($data){
		$this->db->insert('chemical',$data);

	}
	public function tampil(){
		$data = $this->db->get('chemical');
		return $data->result();
	}
	public function delete($id){
		$this->db->where('id',$id);
		$data = $this->db->delete('chemical');
	}
}