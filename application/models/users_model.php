<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class users_model extends CI_Model {

    public function insertData(){
        $this->db->insert('users', $data);
    }

    public function getDatauser($username){
        $this->db->where('username', $user);
        return $query->row();
    }
    public function getLoginUser($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query - $this->db->get('users');
        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }
}
