<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('admin/UserModel', 'user');
        if (!$this->session->userdata('OpenedPTSP')) {
            redirect('admin/login');
        } elseif($this->session->userdata('level') !== 'admin') {
            redirect('admin/dashboard');
        } 
	}

	public function index() {
        $data['title'] = 'Manajement User';
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/user');
		$this->load->view('admin/template/footer');
	}
    
    public function ajax_list() {
        $list = $this->user->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = '<p class="text-center">' .$no. '</p>';
            $row[] = $user->nama;
            $row[] = $user->email;
            $row[] = $user->username;
            $row[] = $user->jenis_kelamin;
            $row[] = $user->status;
 
            //add html for action
            $row[] = '
            	<div align="center">
            		<a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Edit" onclick="edit('."'".$user->id."'".')"><i class="fas fa-pencil-alt"></i></a>
                  	<a class="btn btn-danger btn-sm" href="javascript:void(0)" title="Hapus" onclick="deleted('."'".$user->id."'".')"><i class="fas fa-trash"></i></a>
                </div>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->user->count_all(),
                        "recordsFiltered" => $this->user->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->user->get_by_id($id);
        echo json_encode($data);
    }
    
    public function ajax_add() {
        $this->_validate();
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'status' => $this->input->post('status'),
            'status_user' => $this->input->post('statusUser'),
            'level' => $this->input->post('level'),
            'alamat' => $this->input->post('alamat'),
            // 'foto' => $namaFile,
            'created_at' => date('Y-m-d H:i:s'),
        );

        if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();
            $data['foto'] = $upload;
        }

        $insert = $this->user->save($data);
        // helper_log("add", "Tambah Data User");
        echo json_encode(array("status" => TRUE));
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
            'status_user' => $this->input->post('statusUser'),
            'level' => $this->input->post('level'),
            'alamat' => $this->input->post('alamat'),
            // 'created_at' => date('Y-m-d H:i:s'),
        );
 
        if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();
             
            //delete file
            $fotoe = $this->user->get_by_id($this->input->post('idne'));
            if(file_exists('files/user/'.$fotoe->foto) && $fotoe->foto)
                unlink('files/user/'.$fotoe->foto);
 
            $data['foto'] = $upload;
        }

        $this->user->update(array('id' => $this->input->post('idne')), $data);
        // helper_log("update", "Ubah Data User");
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        //delete file
        $fotoe = $this->user->get_by_id($id);
        if(file_exists('files/user/'.$fotoe->foto) && $fotoe->foto) {
            unlink('files/user/'.$fotoe->foto);
        }
        $this->user->delete_by_id($id);
        // helper_log("delete", "Hapus Data User");
        echo json_encode(array("status" => TRUE));
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
