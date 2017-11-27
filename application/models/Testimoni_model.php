<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing data
	public function listing() {
		$this->db->select('*');
		$this->db->from('testimoni');
		$this->db->order_by('id_testimoni','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// Read data
	public function read($slug_testimoni) {
		$this->db->select('*');
		$this->db->from('testimoni');
		$this->db->where('slug_testimoni',$slug_testimoni);
		$this->db->order_by('id_testimoni','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Detail data
	public function detail($id_testimoni) {
		$this->db->select('*');
		$this->db->from('testimoni');
		$this->db->where('id_testimoni',$id_testimoni);
		$this->db->order_by('id_testimoni','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah
	public function tambah($data) {
		$this->db->insert('testimoni',$data);
	}

	// Edit
	public function edit($data) {
		$this->db->where('id_testimoni',$data['id_testimoni']);
		$this->db->update('testimoni',$data);
	}

	// Delete
	public function delete($data) {
		$this->db->where('id_testimoni',$data['id_testimoni']);
		$this->db->delete('testimoni',$data);
	}
}

/* End of file testimoni_model.php */
/* Location: ./application/models/testimoni_model.php */