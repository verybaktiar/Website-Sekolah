<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model', 'siswa');
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

	public function get_all_siswa()
	{
		$query = $this->db->get('siswa');
		return $query->result();
	}

	public function get_by_kelas($kelas)
	{
		$this->db->where('kelas', $kelas);
		$query = $this->db->get('siswa');
		return $query->result();

	}
	public function get_data_by_kelas($kelas) {
		if (!empty($kelas)) {
			$this->db->where('kelas', $kelas);
		}
		$query = $this->db->get('siswa');
		return $query->result();
	}
	public function insert_data($data)
	{
		return $this->db->insert('siswa', $data); // Ganti 'nama_tabel' dengan nama tabel yang sesuai
	}

	public function delete_data($id_siswa)
	{
		$this->db->where('id_siswa', $id_siswa);
		return $this->db->delete('siswa');
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

	public function update_data($id_siswa, $data) {
		$this->db->where('id_siswa', $id_siswa);
		return $this->db->update('siswa', $data);
	}

}
