<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_kerusakan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('*');
		$this->db->from('jenis_kerusakan');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Read data
	public function read($slug_jenis_kerusakan) {
		$this->db->select('*');
		$this->db->from('jenis_kerusakan');
		$this->db->where('slug_jenis_kerusakan',$slug_jenis_kerusakan);
		$this->db->order_by('id_jenis_kerusakan','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function detail($id_jenis_kerusakan) {
		$this->db->select('*');
		$this->db->from('jenis_kerusakan');
		$this->db->where('id_jenis_kerusakan',$id_jenis_kerusakan);
		$this->db->order_by('id_jenis_kerusakan','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('jenis_kerusakan',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_jenis_kerusakan',$data['id_jenis_kerusakan']);
		$this->db->update('jenis_kerusakan',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_jenis_kerusakan',$data['id_jenis_kerusakan']);
		$this->db->delete('jenis_kerusakan',$data);
	}
}

/* End of file Jenis_kerusakan_model.php */
/* Location: ./application/models/Jenis_kerusakan_model.php */