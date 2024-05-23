<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalPelajaran_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('JadwalPelajaran_model', 'jadwal');
		// Inisialisasi lain jika diperlukan
	}
	public function getMenu()
	{
		if ($this->session->userdata('id') != 1) {
			return $this->db->where('is_active', 'Y')->where('user_id', '2')->get('menus')->result();
		} else {
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

	public function get_all_pelajaran()
	{
		$query = $this->db->get('jadwal_pelajaran');
		return $query->result();
	}

	public function get_by_kelas($kelas)
	{
		$this->db->where('kelas', $kelas);
		$query = $this->db->get('jadwal_pelajaran');
		return $query->result();

	}
	public function get_data_by_kelas($kelas) {
		if (!empty($kelas)) {
			$this->db->where('kelas', $kelas);
		}
		$query = $this->db->get('jadwal_pelajaran');
		return $query->result();
	}
	public function insert_data($data)
	{
		return $this->db->insert('jadwal_pelajaran', $data); // Ganti 'nama_tabel' dengan nama tabel yang sesuai
	}
	public function get_all_guru()
	{
		$query = $this->db->get('jadwal_pelajaran');
		return $query->result();
	}
	public function get_guru_by_id($id)
	{
		$query = $this->db->get_where('jadwal_pelajaran', array('id_pelajaran' => $id));
		return $query->row();
	}
	public function delete_data($id_guru)
	{
		$this->db->where('id_pelajaran', $id_guru);
		return $this->db->delete('jadwal_pelajaran');
	}
	// public function update_data($id_pelajaran, $namaguru, $bidangkegiatan, $namakegiatan,$tingkatkegiatan,$tanggal,$penyelenggara,$keterangan) {
	// 	$data = array(

	// 		'namaguru' => $namaguru,
	// 		'bidangkegiatan' => $bidangkegiatan,
	// 		'namakegiatan' => $namakegiatan,
	// 		'tingkatkegiatan' =>$tingkatkegiatan,
	// 		'tanggal'=>$tanggal,
	// 		'penyelenggara'=>$penyelenggara,
	// 		'keterangan'=>$keterangan,
	// 	);

	// 	$this->db->where('id_guru', $id_guru);
	// 	$this->db->update('prestasiguru', $data);
	// }

	// public function delete($id) {
	// 	$this->db->where('id_guru', $id);
	// 	return $this->db->delete('prestasiguru');
	// }

	public function update_data($id_pelajaran, $data) {
		$this->db->where('id_pelajaran', $id_pelajaran);
		return $this->db->update('jadwal_pelajaran', $data);
	}
	public function delete($id) {
		$this->db->where('id_pelajaran', $id);
		return $this->db->delete('jadwal_pelajaran');
	}

}
