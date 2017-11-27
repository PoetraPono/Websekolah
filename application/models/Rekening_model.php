<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	// Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('rekening');
		$this->db->order_by('id_rekening','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Listing
	public function home() {
		$this->db->select('*');
		$this->db->from('rekening');
		$this->db->order_by('id_rekening','DESC');
		$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}
	
	// Listing
	public function rekening() {
		$this->db->select('*');
		$this->db->from('rekening');
		$this->db->where('posisi =','Rekening');
		$this->db->order_by('id_rekening','DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}
	
	// Listing semua
	public function semua_rekening($limit,$start) {
		$this->db->select('*');
		$this->db->from('rekening');
		$this->db->limit($limit, $start);
		$this->db->order_by('id_rekening','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Listing semua
	public function total_rekening() {
		$this->db->select('*');
		$this->db->from('rekening');
		$this->db->order_by('id_rekening','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	// Detail
	public function detail($id_rekening) {
		$this->db->select('*');
		$this->db->from('rekening');
		$this->db->where('id_rekening',$id_rekening);
		$this->db->order_by('id_rekening','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// Slider
	public function slider() {
		$this->db->select('*');
		$this->db->from('rekening');
		$this->db->where('posisi','Home');
		$this->db->order_by('id_rekening','DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}
	
	// Tambah
	public function tambah($data) {
		$this->db->insert('rekening',$data);
	}
	
	// Edit
	public function edit($data) {
		$this->db->where('id_rekening',$data['id_rekening']);
		$this->db->update('rekening',$data);
	}
	
	// Check delete
	public function check($id_rekening) {
		$query = $this->db->get_where('produk',array('id_rekening' => $id_rekening));
		return $query->num_rows();
	}
	
	// Delete
	public function delete($data) {
		$this->db->where('id_rekening',$data['id_rekening']);
		$this->db->delete('rekening',$data);
	}
}