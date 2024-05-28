<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matematika extends CI_Controller {

public $Matematika_model; // Tambahkan baris ini

public function __construct() {
    parent::__construct();
    // Memuat model
    $this->load->model('menu_model', 'menu');
    $this->load->model('Matematika_model');
    $this->Matematika_model = new Matematika_model(); // Inisialisasi model
    $this->load->library('session'); // Memuat library session
}

public function index() {
    
    $this->load->model('Matematika_model'); // Pastikan nama model ini benar
    $data['data_siswa'] = $this->Matematika_model->get_all_siswa(); // Metode 'get_all_siswa' harus ada di model Anda
    $data['title']		= 'Matematika';
    $data['page']		= 'matematika/index';// Sesuaikan path sesuai dengan struktur direktori Anda
    $this->load->view('back/layouts/main', $data);
}
public function add()
{

    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        // Ambil data dari form
        $namasiswa = $this->input->post('namasiswa');
        $namaguru = $this->input->post('namaguru');
        $prestasi = $this->input->post('prestasi');
   

        // Konfigurasi upload
        $config['upload_path'] =  './img/guru';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE; // Enkripsi nama file

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
        } else {
            $file_data = $this->upload->data();
            $foto= $file_data['file_name'];

            // Data array untuk insert
            $data = array(
                'namasiswa'=>$namasiswa,
                'namaguru' => $namaguru,
                'prestasi' => $prestasi,
                'foto' => $foto
            );

            // Simpan data ke database melalui model
            if ($this->Matematika_model->insert_data($data)) {
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan data.');
            }
        }

        // Redirect ke halaman yang diinginkan
        redirect('matematika/index');
    }
}
    public function delete($id)
    {
        $this->load->model('Matematika_model');
        if ($this->Matematika_model->delete_data($id)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus.');
        }
        redirect('ipa');
    }
}
