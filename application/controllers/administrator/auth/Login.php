<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
		$this->load->view('administrator/auth/login');
	}

	// public function index()
	// {
	// 	$this->load->view('administrator/auth/register');
	// }

    public function login_process() {
        if($this->session->userdata('login')){
            redirect('dashboard');
        }
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            alert_bs_4('isi dengan benar','danger');
            $this->load->view('administrator/auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->users_model->login($username, $password);
            if ($user) {
                $userdata = array(
                    'username' => $user['username'],
                    'password' => $user['password'],
                    'logged_in' => true
                );
                $this->session->set_userdata($userdata);
                redirect('dashboard');
            } else {
                alert_bs_4('password salah','danger');
                redirect('login');
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect('login');
    }

}


