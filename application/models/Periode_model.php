<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('*');
		$this->db->from('periode');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Read data
	public function read($slug_periode) {
		$this->db->select('*');
		$this->db->from('periode');
		$this->db->where('slug_periode',$slug_periode);
		$this->db->order_by('id_periode','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function detail($id_periode) {
		$this->db->select('*');
		$this->db->from('periode');
		$this->db->where('id_periode',$id_periode);
		$this->db->order_by('id_periode','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('periode',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_periode',$data['id_periode']);
		$this->db->update('periode',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_periode',$data['id_periode']);
		$this->db->delete('periode',$data);
	}
}

/* End of file Periode_model.php */
/* Location: ./application/models/Periode_model.php */