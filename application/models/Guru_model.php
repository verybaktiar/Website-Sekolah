<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('Guru_model', 'guru');
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
        return $this->db->insert('guru', $data); // Ganti 'nama_tabel' dengan nama tabel yang sesuai
    }
    public function get_all_guru() {
        $query = $this->db->get('guru');
        return $query->result();
    }
    public function get_guru_by_id($id) {
        $query = $this->db->get_where('guru', array('id_guru' => $id));
        return $query->row();
    }
    public function delete_data($id_guru) {
        $this->db->where('id_guru', $id_guru);
        return $this->db->delete('guru');
    }
    public function update_data($id_guru, $nama_guru, $jabatan, $daftar_pelajaran) {
        $data = array(

            'nama_guru' => $nama_guru,
            'jabatan' => $jabatan,
            'daftar_pelajaran' => $daftar_pelajaran,
      
        );

        $this->db->where('id_guru', $id_guru);
        $this->db->update('guru', $data);
    }

    public function delete($id) {
        $this->db->where('id_guru', $id);
        return $this->db->delete('guru');
    }
    

}

