<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Flow_rate_model extends CI_Model {

	public function simpan($data){
		$this->db->insert('flow_rate',$data);

	}
	public function tampil(){
		$data = $this->db->get('flow_rate');
		return $data->result();
	}
	public function delete($id){
		$this->db->where('id',$id);
		$data = $this->db->delete('flow_rate');
	}
}