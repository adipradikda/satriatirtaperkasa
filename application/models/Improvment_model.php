<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Improvment_model extends CI_Model {
	var $_table = 'improvment';

	public function simpan($data){
		$this->db->insert($this->_table,$data);

	}
	public function tampil(){
		$data = $this->db->get($this->_table);
		return $data->result();
	}
	public function delete($id){
		$this->db->where('id',$id);
		$data = $this->db->delete($this->_table);
	}
	public function edit($id){
		$this->db->where('id',$id);
		$data = $this->db->get($this->_table);

		return $data->row();

	}
	public function simpan_edit($data,$id){
		$this->db->where('id',$id);
		$data = $this->db->update($this->_table,$data);
	}

	// pagination
	public function get_count()
	{
		$query = $this->db->get_where($this->_table);
		return $query->num_rows();
	}
	public function get_data($limit = null, $offset = null)
	{
		if (!$limit && $offset) {
			$query = $this->db->get_where($this->_table);
		} else {
			$query =  $this->db->get_where($this->_table, [], $limit, $offset);
		}
		return $query->result();
	}
}