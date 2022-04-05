<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel','lm');
    }
 
    public function index()
    {
        // Kondisi Ketika Session Opened == TRUE
        if ($this->session->userdata('OpenedPTSP')) {
			redirect('dashboard');
		}
		
        $data['title'] = "Login PTSP PN Jember";
        $this->load->view('admin/login', $data);
    }

    public function signIn() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    	$data = $this->lm->signIn($username, $password);
		if ($data->num_rows() > 0) {
			$this->session->set_userdata('idUser', $data->row()->id);
            $this->session->set_userdata('name', $data->row()->nama);
            $this->session->set_userdata('username', $data->row()->username);
            $this->session->set_userdata('level', $data->row()->level);
            $this->session->set_userdata('foto', $data->row()->foto);
			$this->session->set_userdata('OpenedPTSP', TRUE);
            // helper_log("login", "Login PTSP PN Jember");
            
            redirect('dashboard');
		}else{
			redirect('login');
		}
    }

    public function logout() {
        // helper_log("logout", "Logout PTSP PN Jember");
    	
        $this->session->set_userdata('idUser', "");
		$this->session->set_userdata('name', "");
		$this->session->set_userdata('username', "");
		$this->session->set_userdata('level', "");
		$this->session->set_userdata('foto', "");
		$this->session->set_userdata('OpenedPTSP', FALSE);

		redirect('login');
    }
}