<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('administrator/auth/login');
	}

	public function index()
	{
		$this->load->view('administrator/auth/register');
	}

    public function __construct() {
        parent::__construct();
        $this->load->model('users');
        $this->load->library('form_validation');
    }

    public function index() {
        if($this->session->userdata('login')){
            redirect('dashboard');
        }
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->User_model->login($username, $password);
            if ($user) {
                $userdata = array(
                    'user_id' => $user['user_id'],
                    'username' => $user['username'],
                    'logged_in' => true
                );
                $this->session->set_userdata($userdata);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', 'Invalid username or password');
                redirect('login');
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect('login');
    }

}


