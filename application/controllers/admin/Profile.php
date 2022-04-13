<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('admin/UserModel', 'user');
        if (!$this->session->userdata('OpenedPTSP')) {
            redirect('admin/login');
        }
	}

	public function index()
	{
        $data['title'] = 'Data Diri';
        $data['datadiri'] = $this->db->get_where('user', array('id' => $this->session->userdata('idUser')))->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/profile');
		$this->load->view('admin/template/footer');
	}

    public function ajax_update()
    {
        $this->_validate();
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'status' => $this->input->post('status'),
            'level' => $this->input->post('level'),
            'alamat' => $this->input->post('alamat'),
            // 'created_at' => date('Y-m-d H:i:s'),
        );
 
        if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();
             
            //delete file
            $fotoe = $this->user->get_by_id($this->session->userdata('idUser'));
            if(file_exists('files/user/'.$fotoe->foto) && $fotoe->foto)
                unlink('files/user/'.$fotoe->foto);
 
            $data['foto'] = $upload;
            $this->session->set_userdata('foto', $data['foto']);
        }

        $data = $this->user->update(array('id' => $this->session->userdata('idUser')), $data);
        if ($data) {
            $this->session->set_userdata('name', $this->input->post('nama'));
            $this->session->set_userdata('username', $this->input->post('username'));
        }
        // helper_log("update", "Ubah Data User");
        $dataStatus = array(
            'status' => TRUE, 
            'nameProfile' => $this->session->userdata('name'),
            'photoProfile' => $this->session->userdata('foto')
        );
        echo json_encode($dataStatus);
    }

    private function _do_upload()
    {
        $config['upload_path']          = 'files/user/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png|svg';
        // $config['max_size']             = 10000; //set max size allowed in Kilobyte
        // $config['max_width']            = 1000; // set max width image allowed
        // $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
 
        $this->load->library('upload', $config);
 
        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
    
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('nama') == '' || $this->input->post('email') == '' ||  $this->input->post('username') == '' ||  $this->input->post('password') == '' ||  $this->input->post('tanggal_lahir') == '' ||  $this->input->post('status') == '' ||  $this->input->post('level') == '' ||  $this->input->post('alamat') == '')
        {
            $data['inputerror'][] = 'nama';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}