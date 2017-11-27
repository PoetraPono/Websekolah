<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nav_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	// Navigasi profil
	public function nav_profil() {
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where(array(	'jenis_berita'	=> 'Profil',
								'status_berita'	=> 'Publish'));
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Navigasi berita
	public function nav_berita() {
		$this->db->select('berita.*,kategori.nama_kategori,kategori.slug_kategori');
		$this->db->from('berita');
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori');
		$this->db->where(array(	'jenis_berita'	=> 'Berita',
								'status_berita'	=> 'Publish'));
		$this->db->group_by('berita.id_kategori');
		$this->db->order_by('kategori.urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Footer berita
	public function nav_news() {
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where(array(	'jenis_berita'	=> 'Berita',
								'status_berita'	=> 'Publish'));
		$this->db->order_by('id_berita','ASC');
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}

	// Provinsi
	public function provinsi() {
		$this->db->select('*');
		$this->db->from('provinsi');
		$this->db->order_by('id_prov','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// kabupaten
	public function kabupaten() {
		$this->db->select('*');
		$this->db->from('kabupaten');
		$this->db->order_by('id_kab','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Kecamatan
	public function kecamatan() {
		$this->db->select('*');
		$this->db->from('kecamatan');
		$this->db->order_by('id_kec','ASC');
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file Nav_model.php */
/* Location: ./application/models/Nav_model.php */