<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrestasiSiswaNon_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('PrestasiSiswaNon_model', 'prestasi');
        // Inisialisasi lain jika diperlukan
    }
    public function getMenu()
	{
		if($this->session->userdata('id') != 1) {
			return $this->db->where('is_active', 'Y')->where('user_id', '4')->get('menus')->result();
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
        return $this->db->insert('prestasisiswanon', $data); // Ganti 'nama_tabel' dengan nama tabel yang sesuai
    }
    public function get_all_siswa() {
        $query = $this->db->get('prestasisiswanon');
        return $query->result();
    }
    public function get_siswa_by_id($id) {
        $query = $this->db->get_where('prestasisiswanon', array('id_siswa' => $id));
        return $query->row();
    }
    public function delete_data($id_siswa) {
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->delete('prestasisiswanon');
    }


    public function delete($id) {
        $this->db->where('id_guru', $id);
        return $this->db->delete('prestasiguru');
    }
    

}

