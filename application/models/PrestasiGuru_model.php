<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrestasiGuru_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('PrestasiGuru_model', 'prestasi');
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
        return $this->db->insert('prestasiguru', $data); // Ganti 'nama_tabel' dengan nama tabel yang sesuai
    }
    public function get_all_guru() {
        $query = $this->db->get('prestasiguru');
        return $query->result();
    }
    public function get_guru_by_id($id) {
        $query = $this->db->get_where('prestasiguru', array('id_guru' => $id));
        return $query->row();
    }
    public function delete_data($id_guru) {
        $this->db->where('id_guru', $id_guru);
        return $this->db->delete('prestasiguru');
    }
    public function update_data($id_guru, $namaguru, $bidangkegiatan, $namakegiatan,$tingkatkegiatan,$tanggal,$penyelenggara,$keterangan) {
        $data = array(

            'namaguru' => $namaguru,
            'bidangkegiatan' => $bidangkegiatan,
            'namakegiatan' => $namakegiatan,
            'tingkatkegiatan' =>$tingkatkegiatan,
            'tanggal'=>$tanggal,
            'penyelenggara'=>$penyelenggara,
            'keterangan'=>$keterangan,
        );

        $this->db->where('id_guru', $id_guru);
        $this->db->update('prestasiguru', $data);
    }

    public function delete($id) {
        $this->db->where('id_guru', $id);
        return $this->db->delete('prestasiguru');
    }
    

}

