<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PrestasiGuruu extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PrestasiGuru_model', 'prestasiguruu');
        $this->load->model('menu_model', 'menu');
        $this->load->model('PrestasiGuru_model');
        $this->PrestasiGuru_model = new PrestasiGuru_model(); // Inisialisasi model
        $this->load->library('session'); // Memuat libr
	}

	public function index($page = null)
	{
		
        $this->load->model('PrestasiGuru_model'); // Pastikan nama model ini benar
        $data['data_guru'] = $this->PrestasiGuru_model->get_all_guru(); // Metode 'get_all_siswa' harus ada di model Anda
        $data['title']		= 'Prestasi Guru';
        

      $data['page'] = 'prestasiguru/index';
      $this->load->view('front/layouts/main', $data);
	}

	

	

}

/* End of file Controllername.php */
