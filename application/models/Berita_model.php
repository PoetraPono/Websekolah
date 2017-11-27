<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('berita.*, kategori.nama_kategori, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Latest Post
	public function latest_post() {
		$this->db->select('berita.*, kategori.nama_kategori, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		$this->db->where(array('berita.status_berita' => 'Publish'));
		$this->db->limit(5);
		// End join
		$this->db->order_by('id_berita','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Latest Post Footer
	public function latest_post_footer() {
		$this->db->select('berita.*, kategori.nama_kategori, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		$this->db->where(array('berita.status_berita' => 'Publish'));
		$this->db->limit(3);
		// End join
		$this->db->order_by('id_berita','ASC');
		$query = $this->db->get();
		return $query->result();
	}	

	// Listing kategori
	public function kategori_admin($id_kategori) {
		$this->db->select('berita.*, kategori.nama_kategori, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.id_kategori'	=> $id_kategori));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing kategori
	public function status_admin($status_berita) {
		$this->db->select('berita.*, kategori.nama_kategori, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> $status_berita));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing kategori
	public function jenis_admin($jenis_berita) {
		$this->db->select('berita.*, kategori.nama_kategori, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.jenis_berita'	=> $jenis_berita));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing kategori
	public function author_admin($id_user) {
		$this->db->select('berita.*, kategori.nama_kategori, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.id_user'	=> $id_user));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing kategori
	public function kategori($id_kategori) {
		$this->db->select('berita.*, kategori.nama_kategori, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.id_kategori'	=> $id_kategori,
								'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing berita
	public function berita($limit,$start) {
		$this->db->select('berita.*, kategori.nama_kategori, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->order_by('id_berita','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing total
	public function total() {
		$this->db->select('berita.*, kategori.nama_kategori, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing read
	public function listing_read() {
		$this->db->select('berita.*, kategori.nama_kategori, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Berita'));
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}

	// Listing profil
	public function listing_profil() {
		$this->db->select('berita.*, kategori.nama_kategori, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		// End join
		$this->db->where(array(	'berita.status_berita'	=> 'Publish',
								'berita.jenis_berita'	=> 'Profil'));
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result();
	}

	// Read data
	public function read($slug_berita) {
		$this->db->select('berita.*, kategori.nama_kategori, users.nama');
		$this->db->from('berita');
		// Join dg 2 tabel
		$this->db->join('kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join('users','users.id_user = berita.id_user','LEFT');
		$this->db->where('slug_berita',$slug_berita);
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function detail($id_berita) {
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where('id_berita',$id_berita);
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('berita',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->update('berita',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->delete('berita',$data);
	}
}

/* End of file Berita_model.php */
/* Location: ./application/models/Berita_model.php */