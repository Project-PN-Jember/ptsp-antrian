<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemohon extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/PemohonModel', 'pemohon');
        if (!$this->session->userdata('OpenedPTSP')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'Pemohon';
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/pemohon');
        $this->load->view('admin/template/footer');
    }

    public function ajax_list()
    {
        $list = $this->pemohon->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pemohon) {
            $no++;
            $row = array();
            $row[] = '<p class="text-center">' . $no . '</p>';
            $row[] = $pemohon->nama;
            // $row[] = $pemohon->no_wa;
            // $row[] = $pemohon->kebangsaan;

            // add html for action
            // $status = $pemohon->status == 0 ? 'btn-success' : 'btn-light';
            $row[] = $pemohon->nik;
            $row[] = $pemohon->email;
            $row[] = $pemohon->perkara;



            $row[] = '
            	<div align="center">
                    <a class="btn btn-sm" target="_blank" onclick="hubungi(' . $pemohon->id . ')" href="https://wa.me/62' . $pemohon->telepon . '?text=Selamat Siang Bpk/Ibu ' . $pemohon->nama . ' kami Petugas PTSP PN Jember dari bagian   Ada yang bisa kami bantu?" title="Hubungi"><i class="fa-brands fa-whatsapp"></i> chat</a>
                    <a class="btn btn-primary btn-sm" href="' . base_url('pemohon/cetak/') .  $pemohon->id . '' . '" >C</a>
                    <a class="btn btn-warning btn-sm" href="javascript:void(0)" title="Edit" onclick="edit(' . "'" . $pemohon->id . "'" . ')"><i class="fas fa-pencil-alt"></i></a>
                  	<a class="btn btn-danger btn-sm" href="javascript:void(0)" title="Hapus" onclick="deleted(' . "'" . $pemohon->id . "'" . ')"><i class="fas fa-trash"></i></a>
                </div>';

            $data[] = $row;
        }


        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pemohon->count_all(),
            "recordsFiltered" => $this->pemohon->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id)
    {
        $data = $this->pemohon->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_update()
    {

        $this->_validate();
        $data = array(
            'nama' => $this->input->post('nama'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'tempat_tinggal' => $this->input->post('tempat_tinggal'),
            'nik' => $this->input->post('nik'),
            'bank' => $this->input->post('bank'),
            'no_rek' => $this->input->post('no_rek'),
            'akun_bank' => $this->input->post('akun_bank'),
            'telepon' => $this->input->post('telepon'),

        );
        // $upload = $this->_do_upload();
        // $data['permohonan'] = $upload;
        // $data['permohonan_bermaterai'] = $upload;




        $this->pemohon->update(array('id' => $this->input->post('id')), $data);
        // helper_log("update", "Ubah Data User");
        echo json_encode(array("status" => TRUE));
    }


    private function _do_upload()
    {
        // $config['upload_path'] = './assets/file';
        // $config['allowed_types'] = 'doc|docx|pdf';
        // // $config['max_size']             = 10000; //set max size allowed in Kilobyte
        // // $config['max_width']            = 1000; // set max width image allowed
        // // $config['max_height']           = 1000; // set max height allowed
        // $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name

        // $this->load->library('upload', $config);

        // if (!$this->upload->do_upload('permohonan')) //upload and validate
        // {
        //     $data['inputerror'][] = 'permohonan';
        //     $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
        //     $data['status'] = FALSE;
        //     echo json_encode($data);
        //     exit();
        // }
        // if (!$this->upload->do_upload('permohonan_bermaterai')) //upload and validate
        // {
        //     $data['inputerror'][] = 'permohonan_bermaterai';
        //     $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
        //     $data['status'] = FALSE;
        //     echo json_encode($data);
        //     exit();
        // }


        $this->load->library('upload');
        $config['upload_path'] = './assets/file';
        $config['allowed_types'] = 'doc|docx|pdf';
        $config['overwrite'] = false;
        $config['max_size'] = 1024;
        $media = $this->upload->data();
        $inputFileName = '.assets/file' . $media['file_name'];
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('permohonan')) {
            //  echo "Upload gagal";


            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            redirect('pemohon/tambah', 'refresh');
        } else {

            $this->upload->do_upload('permohonan');

            $data = array(

                "permohonan" => $inputFileName
            );
            return $this->upload->data('file_name');
            // $inputFileName = '.assets/file' . $media['file_name'];
            // $data = array(

            //     "permohonan" => $media['file_name'],

            // );
        }
        $this->load->library('upload');
        $config['upload_path'] = './assets/file';
        $config['allowed_types'] = 'doc|docx|pdf';
        $config['overwrite'] = false;
        $config['max_size'] = 5000;
        $media1 = $this->upload->data();
        $inputFileName = '.assets/file' . $media1['file_name'];
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('permohonan_bermaterai')) {
            echo "Upload gagal";
            die();
        } else {

            $this->upload->do_upload('permohonan_bermaterai');

            $data = array(

                "permohonan_bermaterai" => $inputFileName
            );
            return $this->upload->data('file_name');

            // $media1 = $this->upload->data();
            // $inputFileName = '.assets/file' . $media1['file_name'];
            // $data = array(

            //     "permohonan_bermaterai" => $media1['file_name'],

            // );
        }
        return $this->upload->data('file_name');
        print_r($this->upload->data('file_name'));
        die;
    }

    public function ajax_delete($id)
    {

        $this->pemohon->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if (
            $this->input->post('nama') == ''
            || $this->input->post('tanggal_lahir') == ''
            || $this->input->post('tempat_tinggal') == ''
            || $this->input->post('nik') == ''
            || $this->input->post('bank') == ''
            || $this->input->post('no_rek') == ''
            || $this->input->post('akun_bank') == ''
            || $this->input->post('telepon') == ''



        ) {
            $data['inputerror'][] = 'nama';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

    public function hubungi($id)
    {
        $data = $this->antrian->updateStatus($id);
        echo json_encode($data);
    }


    public function cetak($id)
    {
        $data['title'] = 'Cetak Data';
        $data['pemohon'] = $this->pemohon->get_by_id($id);
        $this->load->view('admin/cetak', $data);
    }
}
