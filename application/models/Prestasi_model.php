<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	// Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('prestasi');
//		$this->db->where('status_prestasi <>','Pending');
		$this->db->order_by('id_prestasi','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Read data
	public function read($slug_prestasi) {
		$this->db->select('*');
		$this->db->from('prestasi');
		// Join dg 2 tabel
		$this->db->join('users','users.id_user = prestasi.id_user','LEFT');
		$this->db->where('slug_prestasi',$slug_prestasi);
		$this->db->order_by('id_prestasi','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Listing prestasi
	public function prestasi($limit,$start) {
		$this->db->select('*');
		$this->db->from('prestasi');
		// Join dg 1 tabel
		$this->db->join('users','users.id_user = prestasi.id_user','LEFT');
		// End join
		$this->db->order_by('id_prestasi','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}	

	// Listing total
	public function total() {
		$this->db->select('*');
		$this->db->from('prestasi');
		// Join dg 1 tabel
		$this->db->join('users','users.id_user = prestasi.id_user','LEFT');
		// End join		
		$this->db->order_by('id_prestasi','DESC');
		$query = $this->db->get();
		return $query->result();
	}	


	// Pending
	public function pending() {
		$this->db->select('*');
		$this->db->from('prestasi');
		$this->db->where('status_prestasi','Pending');
		$this->db->order_by('id_prestasi','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Listing nama
	public function nama() {
		$this->db->select('*');
		$this->db->from('prestasi');
		$this->db->order_by('nama','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Semua prestasi
	public function home() {
		$this->db->select('*');
		$this->db->from('prestasi');
		$this->db->where(array('status_prestasi'=>'Yes','status_testimoni' => 'Yes'));
		$this->db->where('gambar <>',NULL);
		$this->db->limit(12);
		$this->db->order_by('id_prestasi','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Semua prestasi
	public function semua_prestasi($limit,$start) {
		$this->db->select('*');
		$this->db->from('prestasi');
		$this->db->where('status_prestasi','Yes');
		$this->db->where('gambar <> ','');
		$this->db->limit($limit, $start);
		$this->db->order_by('id_prestasi','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Listing
	public function total_prestasi() {
		$this->db->select('*');
		$this->db->from('prestasi');
		$this->db->where('status_prestasi','Yes');
		$this->db->where('gambar <> ','');
		$this->db->order_by('id_prestasi','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	// Get daftar
	public function daftar($email,$password_hint) {
		$this->db->select('*');
		$this->db->from('prestasi');
		$this->db->where(array(	'email'			=> $email,
								'password_hint'	=> $password_hint));
		$this->db->order_by('id_prestasi','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// Get change
	public function change($password,$id_prestasi) {
		$this->db->select('*');
		$this->db->from('prestasi');
		$this->db->where(array(	'id_prestasi'	=> $id_prestasi,
								'password'	=> $password));
		$this->db->order_by('id_prestasi','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// Detail
	public function detail($id_prestasi) {
		$this->db->select('*');
		$this->db->from('prestasi');
		$this->db->where('id_prestasi',$id_prestasi);
		$this->db->order_by('id_prestasi','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// Detail
	public function email($email) {
		$this->db->select('*');
		$this->db->from('prestasi');
		$this->db->where('email',$email);
		$this->db->order_by('id_prestasi','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// Tambah
	public function tambah($data) {
		$this->db->insert('prestasi',$data);
	}
	
	// Edit
	public function edit($data) {
		$this->db->where('id_prestasi',$data['id_prestasi']);
		$this->db->update('prestasi',$data);
	}
	
	// Check delete
	public function check($id_prestasi) {
		$query = $this->db->get_where('produk',array('id_prestasi' => $id_prestasi));
		return $query->num_rows();
	}
	
	// Delete
	public function delete($data) {
		$this->db->where('id_prestasi',$data['id_prestasi']);
		$this->db->delete('prestasi',$data);
	}
}