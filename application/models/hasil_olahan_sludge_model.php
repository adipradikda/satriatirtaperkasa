<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hasil_olahan_sludge_model extends CI_Model {

	public function simpan($data){
		$this->db->insert('hasil_olahan_sludge',$data);

	}
	public function tampil(){
		$data = $this->db->get('hasil_olahan_sludge');
		return $data->result();
	}
	public function delete($id){
		$this->db->where('id_date_note',$id);
		$data = $this->db->delete('hasil_olahan_sludge');
	}
	public function edit($id){
		$this->db->where('id',$id);
		$data = $this->db->get('hasil_olahan_sludge');

		return $data->row();

	}
	public function simpan_edit($data,$id){
		$this->db->where('id_date_note',$id);
		$data = $this->db->update('hasil_olahan_sludge',$data);
	}
}