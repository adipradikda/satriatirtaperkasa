<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inlet_outlet_model extends CI_Model {

	public function simpan($data){
		$this->db->insert('inlet_outlet',$data);

	}
	public function tampil(){
		$data = $this->db->get('inlet_outlet');
		return $data->result();
	}
	public function delete($id){
		$this->db->where('id',$id);
		$data = $this->db->delete('inlet_outlet');
	}
}