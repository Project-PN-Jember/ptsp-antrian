<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('DashboardModel', 'dashboard');
        if (!$this->session->userdata('OpenedPTSP')) {
            redirect('login');
        }
	}

	public function index()
	{
        $data['title'] = 'Dashboard';
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/dashboard');
		$this->load->view('admin/template/footer');
	}

	public function ajax_list() {
        $list = $this->dashboard->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $dashboard) {
            $no++;
            $row = array();
            $row[] = '<p class="text-center">' .$no. '</p>';
            $row[] = $dashboard->no_antrian;
            $row[] = $dashboard->email;
            $row[] = $dashboard->nama;
            $row[] = '0' . $dashboard->telp_wa;
            $row[] = $dashboard->pegawai;
 
            //add html for action
			$status = $dashboard->status == 0 ? 'btn-success' : 'btn-light';
            $row[] = '
            	<div align="center">
                  	<a class="btn '.$status.' btn-sm" target="_blank" onclick="hubungi('.$dashboard->id.')" href="https://wa.me/62'.$dashboard->telp_wa.'?text=Selamat Siang Bpk/Ibu '.$dashboard->nama.' kami Petugas PTSP PN Jember dari bagian ' . $dashboard->level . '. Ada yang bisa kami bantu?" title="Hubungi"><i class="fa-brands fa-whatsapp"></i> Hubungi</a>
                </div>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->dashboard->count_all(),
                        "recordsFiltered" => $this->dashboard->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

	public function jumlah_antrian()
    {
        $data = $this->dashboard->total_antrian();
        echo json_encode($data);
    }

	public function antrian_sekarang()
    {
        $data = $this->dashboard->now_antrian();
        echo $data;
    }

	public function antrian_selanjutnya()
    {
        $data = $this->dashboard->next_antrian();
        echo $data;
    }

	public function sisa_antrian()
    {
        $data = $this->dashboard->restOfThe_antrian();
        echo json_encode($data);
    }
	
	public function hubungi($id)
    {
        $data = $this->dashboard->updateStatus($id);
        echo json_encode($data);
    }

    public function getStatus()
    {
        $data = $this->db->select('status')
                ->where('id', $this->session->userdata('idUser'))
                ->get('user')->row();

        echo json_encode($data);
    }
    
    public function customStatus()
    {
        $status = $this->input->post('statusLayanan') == 'Online' ? 'Offline' : 'Online';
        $data = array('status' => $status);
        $where = array('id' => $this->session->userdata('idUser'));

        $results = $this->db->update('user', $data, $where);

        echo json_encode([$status, $this->input->post('statusLayanan'), $results]);
    }
}
