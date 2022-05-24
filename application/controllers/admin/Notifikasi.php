<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('admin/NotifikasiModel', 'notifikasi');
        if (!$this->session->userdata('OpenedPTSP')) {
            redirect('admin/login');
        }
        $this->load->helper('notification');
        // helper_notification('Sidang Pak Jono', '2022-05-23 08:10:00', 'admin/permohonan', '1');
	}

	public function index()
	{
        $data['title'] = 'Notifikasi';
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/notifikasi');
		$this->load->view('admin/template/footer');
	}

	public function ajax_list() {
        $list = $this->notifikasi->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $notifikasi) {
            $no++;
            $row = array();
            if ($notifikasi->status == 0) {
                $warna = 'bg-light';
            } else {
                $warna = '';
            }
            $row[] = '  <a class="dropdown-item d-flex align-items-center p-3 px-4 '. $warna .'" onclick="customStatusNotif('.$notifikasi->id.')" href="#">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">'. $notifikasi->date_notif .'</div>
                                <span class="font-weight-bold">'. $notifikasi->judul_notif .'</div>
                            </div>
                        </a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->notifikasi->count_all(),
                        "recordsFiltered" => $this->notifikasi->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function show() {
        $datae = $this->notifikasi->show();
        $data = array();
        foreach($datae as $notif) {
            $row = array();
            $row[] = '<a class="dropdown-item d-flex align-items-center" onclick="customStatusNotif('.$notif->id.')" href="'. base_url($notif->link) .'">
                        <div class="mr-3">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">'. $notif->date_notif .'</div>
                            <span class="font-weight-bold">'. $notif->judul_notif .'</div>
                        </div>
                    </a>';
            $data[] = $row;
        }
        echo json_encode($data);
    }

    public function total_notif()
    {
        $data = $this->notifikasi->count_notif_all();
        if ($data > 9) {
            $data = '<span class="badge badge-danger badge-counter">9+</span>';
        } elseif ($data) {
            $data = '<span class="badge badge-danger badge-counter">'. $data .'</span>';
        } else {
            $data = '' ;
        }
        echo $data;
    }

    public function customStatusNotif($id)
    {
        $data = $this->notifikasi->updateStatus($id);
        echo json_encode($data);
    }

}
