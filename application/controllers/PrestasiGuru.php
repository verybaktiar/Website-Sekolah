<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrestasiGuru extends CI_Controller {

public $PrestasiGuru_model; // Tambahkan baris ini

public function __construct() {
    parent::__construct();
    // Memuat model
    $this->load->model('menu_model', 'menu');
    $this->load->model('PrestasiGuru_model');
    $this->load->library('session'); // Memuat library session
}

}