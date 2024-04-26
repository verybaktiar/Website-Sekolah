<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progres_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('progres_model', 'progres');
        // Inisialisasi lain jika diperlukan
    }
    public function getMenu()
	{
		if($this->session->userdata('id') != 1) {
			return $this->db->where('is_active', 'Y')->where('user_id', '2')->get('menus')->result();
		}else{
			return $this->db->where('is_active', 'Y')->get('menus')->result();
		}
	}
    public function getSubmenu($id)
	{
		$this->db->select(['submenus.sub_title', 'submenus.sub_url', 'submenus.is_active']);
		$this->db->from('submenus');
		$this->db->join('menus', 'submenus.menu_id = menus.id');
		$this->db->where('submenus.menu_id', $id);
		$this->db->where('submenus.is_active', 'Y');
		return $this->db->get()->result();
	}

    public function insert_data($data) {
        return $this->db->insert('progres', $data); // Ganti 'nama_tabel' dengan nama tabel yang sesuai
    }

    public function get_all_siswa() {
        $query = $this->db->get('progres');
        return $query->result();
    }

    public function update_data($id, $namaSiswa, $kelas, $progresHafalan) {
        $data = array(
            'nama_siswa' => $namaSiswa,
            'kelas' => $kelas,
            'progres_hafalan' => $progresHafalan
        );

        $this->db->where('id', $id);
        $this->db->update('progres', $data);
    }

    // Metode lain
}