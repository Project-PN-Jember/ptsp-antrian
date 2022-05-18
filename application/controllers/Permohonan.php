<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Permohonan';
        $this->load->view('view/tambah', $data);
    }
    public function tambah()
    {
        $data['title'] = 'Form Pemohon';



        // $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        // $this->form_validation->set_rules('noWA', 'Nomor Ponsel', 'required|numeric');
        // $this->form_validation->set_rules('aktaKelahiran', 'Akta Kelahiran', 'required');
        // $this->form_validation->set_rules('ijazah', 'Ijazah', 'required');
        // $this->form_validation->set_rules('ktp', 'KTP', 'required');
        // $this->form_validation->set_rules('skbi', 'Surat Keterangan Beda Identitas', 'required');
        // $this->form_validation->set_rules('sktm', 'Surat Keterangan Tidak Mampu', 'required');
        $this->load->library('upload');
        $config['upload_path'] = './assets/file';
        $config['allowed_types'] = 'doc|docx|pdf';
        $config['overwrite'] = false;
        $config['max_size'] = 1024;
        $media = $this->upload->data();
        $inputFileName = '.assets/file' . $media['file_name'];
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('akta')) {
            //  echo "Upload gagal";


            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            redirect('pemohon/tambah', 'refresh');
        } else {
            $this->load->library('upload');
            $config['upload_path'] = './assets/file';
            $config['allowed_types'] = 'doc|docx|pdf';
            $config['overwrite'] = false;
            $config['max_size'] = 5000;
            $media1 = $this->upload->data();
            $inputFileName = '.assets/file' . $media1['file_name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('ijazah')) {
                echo "Upload gagal";
                die();
            } else {
                $this->load->library('upload');
                $config['upload_path'] = './assets/file';
                $config['allowed_types'] = 'doc|docx|pdf';
                $config['overwrite'] = false;
                $config['max_size'] = 5000;
                $media2 = $this->upload->data();
                $inputFileName = '.assets/file' . $media2['file_name'];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('ktp')) {
                    echo "Upload gagal";
                    die();
                } else {
                    $this->load->library('upload');
                    $config['upload_path'] = './assets/file';
                    $config['allowed_types'] = 'doc|docx|pdf';
                    $config['overwrite'] = false;
                    $config['max_size'] = 5000;
                    $media3 = $this->upload->data();
                    $inputFileName = '.assets/file' . $media3['file_name'];
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('kk')) {
                        echo "Upload gagal";
                        die();
                    } else {
                        $this->load->library('upload');
                        $config['upload_path'] = './assets/file';
                        $config['allowed_types'] = 'doc|docx|pdf';
                        $config['overwrite'] = false;
                        $config['max_size'] = 5000;
                        $media4 = $this->upload->data();
                        $inputFileName = '.assets/file' . $media4['file_name'];
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if (!$this->upload->do_upload('skbi')) {
                            echo "Upload gagal";
                            die();
                        } else {
                            $this->load->library('upload');
                            $config['upload_path'] = './assets/file';
                            $config['allowed_types'] = 'doc|docx|pdf';
                            $config['overwrite'] = false;
                            $config['max_size'] = 5000;
                            $media5 = $this->upload->data();
                            $inputFileName = '.assets/file' . $media5['file_name'];
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            if (!$this->upload->do_upload('sktm')) {
                                echo "Upload gagal";
                                die();
                            } else {
                                $media5 = $this->upload->data();
                                $inputFileName = '.assets/file' . $media5['file_name'];
                                $data = array(
                                    'nama' => $this->input->post('nama', true),
                                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                                    'tempat_tinggal' => $this->input->post('tempat_tinggal'),
                                    'nik' => $this->input->post('nik'),
                                    'bank' => $this->input->post('bank'),
                                    'no_rek' => $this->input->post('no_rek'),
                                    'akun_bank' => $this->input->post('akun_bank'),
                                    'telepon' => $this->input->post('telepon'),
                                    'email' => $this->input->post('email'),
                                    'alamat' => $this->input->post('alamat'),
                                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                                    'agama' => $this->input->post('agama'),
                                    'pekerjaan' => $this->input->post('pekerjaan'),
                                    'ibk' => $this->input->post('ibk'),
                                    'status_kawin' => $this->input->post('status_kawin'),
                                    'pendidikan' => $this->input->post('pendidikan'),
                                    'perkara' => $this->input->post('perkara'),
                                    "ktp" => $media3['file_name'],
                                    "kk" => $media4['file_name'],
                                    "skbi" => $media5['file_name'],
                                    "akta" => $media1['file_name'],
                                    "sktm" => $media5['file_name'],
                                    "ijazah" => $media2['file_name']
                                );
                                $res = $this->db->insert('pemohon', $data);
                                $this->session->set_flashdata('flash', 'Ditambahkan');
                                $this->session->set_flashdata('pesan', 'Ditambahkan');
                                if ($res > 0) {

                                    echo "data berhasil ditambahkan";

                                    $this->session->set_flashdata('flash', 'Ditambahkan');
                                    $this->session->set_flashdata('pesan', 'Ditambahkan');
                                } else {
                                    echo "data gagal";
                                }
                            }
                        }
                    }
                }
            }
            $this->session->set_flashdata('flash', 'Ditambahkan');
            $this->session->set_flashdata('pesan', 'Ditambahkan');
        }



        $this->session->set_flashdata('flash', 'Ditambahkan');
        $this->session->set_flashdata('pesan', 'Ditambahkan');

        redirect('http://localhost/ptsp/permohonan/tambah', $data);
    }
}
