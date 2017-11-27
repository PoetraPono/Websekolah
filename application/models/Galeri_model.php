<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data slider
	public function slider() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where('jenis_galeri','Homepage');
		$this->db->order_by('id_galeri','DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data profil
	public function profil() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where('jenis_galeri','Profil');
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}

	// Listing data struktur
	public function struktur() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where('jenis_galeri','Struktur');
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}	

	// Kepala Sekolah
	public function kepala_sekolah() {
		$this->db->select('*');
		$this->db->from('staff');		
		$this->db->where('jabatan','Kepala Sekolah');
		$this->db->order_by('id_staff','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}			



	// Listing data slider
	public function galeri($limit,$start) {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama, 
						kategori_galeri.slug_kategori_galeri');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where('jenis_galeri','Galeri');
		$this->db->order_by('id_galeri','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing data slider
	public function total_galeri() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri','LEFT');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where('jenis_galeri','Galeri');
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Kategori
	public function kategori() {
		$this->db->select('galeri.*, kategori_galeri.nama_kategori_galeri, users.nama, 
						kategori_galeri.slug_kategori_galeri');
		$this->db->from('galeri');
		// Join dg 2 tabel
		$this->db->join('kategori_galeri','kategori_galeri.id_kategori_galeri = galeri.id_kategori_galeri');
		$this->db->join('users','users.id_user = galeri.id_user','LEFT');
		// End join
		$this->db->where('jenis_galeri','Galeri');
		$this->db->group_by('galeri.id_kategori_galeri');
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function detail($id_galeri) {
		$this->db->select('*');
		$this->db->from('galeri');
		$this->db->where('id_galeri',$id_galeri);
		$this->db->order_by('id_galeri','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('galeri',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_galeri',$data['id_galeri']);
		$this->db->update('galeri',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_galeri',$data['id_galeri']);
		$this->db->delete('galeri',$data);
	}
}

/* End of file Galeri_model.php */
/* Location: ./application/models/Galeri_model.php */