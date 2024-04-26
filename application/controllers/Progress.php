<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Progress extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Progres_model', 'progress');
        $this->load->model('menu_model', 'menu');
        $this->load->model('Progres_model');
        $this->Progres_model = new Progres_model(); // Inisialisasi model
        $this->load->library('session'); // Memuat libr
	}

	public function index($page = null)
	{
		
        $this->load->model('Progres_model'); // Pastikan nama model ini benar
        $data['data_siswa'] = $this->Progres_model->get_all_siswa(); // Metode 'get_all_siswa' harus ada di model Anda
        $data['title']		= 'Progres';
        

      $data['page'] = 'progres/index';
      $this->load->view('front/layouts/main', $data);
	}

	

	

}

/* End of file Controllername.php */
