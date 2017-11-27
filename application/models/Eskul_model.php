<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eskul_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('*');
		$this->db->from('eskul');
		$this->db->order_by('id_eskul','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail data
	public function detail($id_eskul) {
		$this->db->select('*');
		$this->db->from('eskul');
		$this->db->where('id_eskul',$id_eskul);
		$this->db->order_by('id_eskul','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('eskul',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_eskul',$data['id_eskul']);
		$this->db->update('eskul',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_eskul',$data['id_eskul']);
		$this->db->delete('eskul',$data);
	}
}

/* End of file Eskul_model.php */
/* Location: ./application/models/User_model.php */