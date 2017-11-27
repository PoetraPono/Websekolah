<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	// Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('pesan');
		$this->db->order_by('id_pesan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	
	// Detail
	public function detail($id_pesan) {
		$this->db->select('*');
		$this->db->from('pesan');
		$this->db->where('id_pesan',$id_pesan);
		$this->db->order_by('id_pesan','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// Tambah
	public function tambah($data) {
		$this->db->insert('pesan',$data);
	}
	
	// Edit
	public function edit($data) {
		$this->db->where('id_pesan',$data['id_pesan']);
		$this->db->update('pesan',$data);
	}
	
	// Check delete
	public function check($id_pesan) {
		$query = $this->db->get_where('produk',array('id_pesan' => $id_pesan));
		return $query->num_rows();
	}
	
	// Delete
	public function delete($data) {
		$this->db->where('id_pesan',$data['id_pesan']);
		$this->db->delete('pesan',$data);
	}
}