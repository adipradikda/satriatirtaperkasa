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
		$this->db->where('id_date_note',$id);
		$data = $this->db->delete('flow_rate');
	}
	public function edit($id){
		$this->db->where('id',$id);
		$data = $this->db->get('flow_rate');

		return $data->row();

	}
	public function simpan_edit($data,$id){
		$this->db->where('id_date_note',$id);
		$data = $this->db->update('flow_rate',$data);
	}
}