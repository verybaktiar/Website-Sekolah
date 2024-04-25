<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progres extends CI_Controller {

public function __construct() {
    parent::__construct();
    // Memuat model
    $this->load->model('menu_model', 'menu');
  
}

public function index() {
    $data['title']		= 'Progres';
    $data['page']		= 'progres/index';// Sesuaikan path sesuai dengan struktur direktori Anda
    $this->load->view('back/layouts/main', $data);
}

}