<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('admin/AntrianModel', 'antrian');
        if (!$this->session->userdata('OpenedPTSP')) {
            redirect('admin/login');
        }
	}

	public function index()
	{
        $data['title'] = 'Antrian';
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/antrian');
		$this->load->view('admin/template/footer');
	}

	public function ajax_list() {
        $list = $this->antrian->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $antrian) {
            $no++;
            $row = array();
            $row[] = '<p class="text-center">' .$no. '</p>';
            $row[] = $antrian->no_antrian;
            $row[] = $antrian->email;
            $row[] = $antrian->nama;
            $row[] = '+62' . $antrian->telp_wa;
            $row[] = $antrian->pegawai;
            
            //add html for action
            $status = $antrian->status == 0 ? 'btn-success' : 'btn-light';
            $row[] = '
            	<div align="center">
                  	<a class="btn '.$status.' btn-sm" target="_blank" onclick="hubungi('.$antrian->id.')" href="https://wa.me/62'.$antrian->telp_wa.'?text=Selamat Siang Bpk/Ibu '.$antrian->nama.' kami Petugas PTSP PN Jember dari bagian ' . $antrian->level . '. Ada yang bisa kami bantu?" title="Hubungi"><i class="fa-brands fa-whatsapp"></i> Hubungi</a>
                </div>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->antrian->count_all(),
                        "recordsFiltered" => $this->antrian->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function hubungi($id)
    {
        $data = $this->antrian->updateStatus($id);
        echo json_encode($data);
    }

}
