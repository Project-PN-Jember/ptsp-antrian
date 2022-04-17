<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('ViewModel', 'viewM');
        $this->load->library('secure');
    }

	public function index() {
        // $data['title'] = 'View Antrian';
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('view/view', $data);
		// $this->load->view('admin/template/footer');
        redirect('');
	}
	
    public function cs($id) {
        // d054b1V6ODFFMTZCdis4NVFMdEdZZz09 = 3
        // MXMzMmtBNFlNK0N5V0tlMUpzcloxdz09 = 2
        // czNlR0YzK0ViZ0FFNGdtTW82SSs4Zz09 = 1
        // echo $this->secure->encrypt_url($id);
        $decrypt_id     = $this->secure->decrypt_url($id);
        
        $data['title'] = 'View Antrian';
		$data['dataCs'] = $this->viewM->dataCs($decrypt_id);
        // var_dump($data['dataCs']);
        if (!$data['dataCs']) { redirect(''); }
		$this->load->view('view/view', $data);
	}

    public function statusCs($id) {
        $decrypt_id = $this->secure->decrypt_url($id);
        $data = $this->viewM->dataCs($decrypt_id);

        echo json_encode($data);
    }

    public function jumlah_antrian($id) {
        $decrypt_id = $this->secure->decrypt_url($id);
        $data = $this->viewM->total_antrian($decrypt_id);
        echo json_encode($data);
    }

	public function antrian_sekarang($id) {
        $decrypt_id = $this->secure->decrypt_url($id);
        $data = $this->viewM->now_antrian($decrypt_id);
        echo $data;
    }

	public function antrian_selanjutnya($id) {
        $decrypt_id = $this->secure->decrypt_url($id);
        $data = $this->viewM->next_antrian($decrypt_id);
        echo $data;
    }

	public function sisa_antrian($id) {
        $decrypt_id = $this->secure->decrypt_url($id);
        $data = $this->viewM->restOfThe_antrian($decrypt_id);
        echo json_encode($data);
    }

    public function add_antrian($id) {
        $decrypt_id = $this->secure->decrypt_url($id);
        if(!$decrypt_id) {
            redirect('/');
        }
        
        // Validasi Form
        $this->_validate();
        
        $no_antrian = $this->viewM->noAntrian($decrypt_id);
        $data = array(
            'no_antrian' => $no_antrian,
            'email' => $this->input->post('email'),
            'nama' => $this->input->post('name'),
            'telp_wa' => $this->input->post('telp'),
            'user_id' => $decrypt_id,
            'tanggal' => date('Y-m-d'),
            'created_at' => date('Y-m-d H:i:s'),
        );

        $insert = $this->viewM->save($data);
        if ($insert) { 
            $this->session->set_userdata('statusDaftarAntrian', $data); 
            $datae = $data;
        }
        // helper_log("update", "Ubah Data User");
        echo json_encode(array('status' => TRUE, 'isi' => $datae));
    }
    
    private function _validate() {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('name') == '' ||  $this->input->post('telp') == '' )
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