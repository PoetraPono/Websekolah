<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	// Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where('status_client <>','Pending');
		$this->db->order_by('id_client','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Pending
	public function pending() {
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where('status_client','Pending');
		$this->db->order_by('id_client','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Listing nama
	public function nama() {
		$this->db->select('*');
		$this->db->from('client');
		$this->db->order_by('nama','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Semua client
	public function home() {
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where(array('status_client'=>'Yes','status_testimoni' => 'Yes'));
		$this->db->where('gambar <>',NULL);
		$this->db->limit(12);
		$this->db->order_by('id_client','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Semua client
	public function semua_client($limit,$start) {
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where('status_client','Yes');
		$this->db->where('gambar <> ','');
		$this->db->limit($limit, $start);
		$this->db->order_by('id_client','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Listing
	public function total_client() {
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where('status_client','Yes');
		$this->db->where('gambar <> ','');
		$this->db->order_by('id_client','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	// Get daftar
	public function daftar($email,$password_hint) {
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where(array(	'email'			=> $email,
								'password_hint'	=> $password_hint));
		$this->db->order_by('id_client','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// Get change
	public function change($password,$id_client) {
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where(array(	'id_client'	=> $id_client,
								'password'	=> $password));
		$this->db->order_by('id_client','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// Detail
	public function detail($id_client) {
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where('id_client',$id_client);
		$this->db->order_by('id_client','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// Detail
	public function email($email) {
		$this->db->select('*');
		$this->db->from('client');
		$this->db->where('email',$email);
		$this->db->order_by('id_client','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// Tambah
	public function tambah($data) {
		$this->db->insert('client',$data);
	}
	
	// Edit
	public function edit($data) {
		$this->db->where('id_client',$data['id_client']);
		$this->db->update('client',$data);
	}
	
	// Check delete
	public function check($id_client) {
		$query = $this->db->get_where('produk',array('id_client' => $id_client));
		return $query->num_rows();
	}
	
	// Delete
	public function delete($data) {
		$this->db->where('id_client',$data['id_client']);
		$this->db->delete('client',$data);
	}
}