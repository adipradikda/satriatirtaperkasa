<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Buang_limbah_disumpit_model extends CI_Model {

	public function simpan($data){
		$this->db->insert('buang_limbah_disumpit',$data);

	}
	public function tampil(){
		$data = $this->db->get('buang_limbah_disumpit');
		return $data->result();
	}
	public function delete($id){
		$this->db->where('id_date_note',$id);
		$data = $this->db->delete('buang_limbah_disumpit');
	}
	public function edit($id){
		$this->db->where('id',$id);
		$data = $this->db->get('buang_limbah_disumpit');

		return $data->row();

	}
	public function simpan_edit($data,$id){
		$this->db->where('id_date_note',$id);
		$data = $this->db->update('buang_limbah_disumpit',$data);
	}
}