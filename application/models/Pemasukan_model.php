<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasukan_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	// Listing
	public function listing() {
		$this->db->select('pemasukan.*, harga_barang.nama_harga_barang, barang.nama_barang, client.nama, transaksi.biaya');
		$this->db->from('pemasukan');
		$this->db->join('barang','barang.id_barang = pemasukan.id_barang','INNER');
		$this->db->join('harga_barang','harga_barang.id_harga_barang = pemasukan.id_harga_barang','INNER');
		$this->db->join('client','client.id_client = pemasukan.id_client','INNER');
		$this->db->join('transaksi','transaksi.id_transaksi = pemasukan.id_transaksi','INNER');
		$this->db->where('pemasukan.sumber','Kursus');
		$this->db->order_by('id_pemasukan','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	// Listing transaksi
	public function transaksi($id_transaksi) {
		$this->db->select('pemasukan.*, harga_barang.nama_harga_barang, barang.nama_barang, client.nama, transaksi.biaya');
		$this->db->from('pemasukan');
		$this->db->join('barang','barang.id_barang = pemasukan.id_barang','INNER');
		$this->db->join('harga_barang','harga_barang.id_harga_barang = pemasukan.id_harga_barang','INNER');
		$this->db->join('client','client.id_client = pemasukan.id_client','INNER');
		$this->db->join('transaksi','transaksi.id_transaksi = pemasukan.id_transaksi','INNER');
		$this->db->where('pemasukan.id_transaksi',$id_transaksi);
		$this->db->where('pemasukan.sumber','Kursus');
		$this->db->order_by('pemasukan.id_pemasukan','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	// Listing transaksi
	public function transaksi_total($id_transaksi) {
		$this->db->select('SUM(jumlah) AS total');
		$this->db->from('pemasukan');
		$this->db->where('id_transaksi',$id_transaksi);
		$this->db->where('pemasukan.sumber','Kursus');
		$this->db->order_by('id_pemasukan','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}
	
	// Listing transaksi
	public function transaksi_approved($id_transaksi) {
		$this->db->select('pemasukan.*, harga_barang.nama_harga_barang, barang.nama_barang, client.nama, transaksi.biaya');
		$this->db->from('pemasukan');
		$this->db->join('barang','barang.id_barang = pemasukan.id_barang','INNER');
		$this->db->join('harga_barang','harga_barang.id_harga_barang = pemasukan.id_harga_barang','INNER');
		$this->db->join('client','client.id_client = pemasukan.id_client','INNER');
		$this->db->join('transaksi','transaksi.id_transaksi = pemasukan.id_transaksi','INNER');
		$this->db->where(array(	'pemasukan.id_transaksi'	=> $id_transaksi,
								'status_pemasukan'		=> 'Approved'));
		$this->db->where('pemasukan.sumber','Kursus');
		$this->db->order_by('pemasukan.id_pemasukan','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	// Listing transaksi
	public function total_approved($id_transaksi) {
		$this->db->select('SUM(jumlah) AS total');
		$this->db->from('pemasukan');
		$this->db->where(array(	'pemasukan.id_transaksi'	=> $id_transaksi,
								'status_pemasukan'		=> 'Approved'));
		$this->db->where('pemasukan.sumber','Kursus');
		$this->db->order_by('id_pemasukan','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}
	
	// Listing nama
	public function nama() {
		$this->db->select('*');
		$this->db->from('pemasukan');
		$this->db->where('pemasukan.sumber','Kursus');
		$this->db->order_by('nama','ASC');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	// Semua pemasukan
	public function semua_pemasukan($limit,$start) {
		$this->db->select('*');
		$this->db->from('pemasukan');
		$this->db->where('status_pemasukan','Ya');
		$this->db->where('pemasukan.sumber','Kursus');
		$this->db->limit($limit, $start);
		$this->db->order_by('id_pemasukan','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	// Listing
	public function total_pemasukan() {
		$this->db->select('*');
		$this->db->from('pemasukan');
		$this->db->where('status_pemasukan','Ya');
		$this->db->where('pemasukan.sumber','Kursus');
		$this->db->order_by('id_pemasukan','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	// Detail
	public function detail($id_pemasukan) {
		$this->db->select('*');
		$this->db->from('pemasukan');
		$this->db->where('id_pemasukan',$id_pemasukan);
		$this->db->order_by('id_pemasukan','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}

	// Detail
	public function check($id_transaksi) {
		$this->db->select('*');
		$this->db->from('pemasukan');
		$this->db->where('id_transaksi',$id_transaksi);
		$this->db->where('pemasukan.sumber','Kursus');
		$this->db->order_by('id_pemasukan','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	/* PROYEK */
	// Listing proyek
	public function proyek($id_proyek) {
		$this->db->select('pemasukan.*, harga.nama_harga, layanan.nama_layanan, client.nama, proyek.biaya,proyek.nama_proyek');
		$this->db->from('pemasukan');
		$this->db->join('layanan','layanan.id_layanan = pemasukan.id_layanan','INNER');
		$this->db->join('harga','harga.id_harga = pemasukan.id_harga','INNER');
		$this->db->join('client','client.id_client = pemasukan.id_client','INNER');
		$this->db->join('proyek','proyek.id_proyek = pemasukan.id_proyek','INNER');
		$this->db->where('pemasukan.id_proyek',$id_proyek);
		$this->db->where('pemasukan.sumber','Proyek');
		$this->db->order_by('pemasukan.id_pemasukan','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	// Listing proyek
	public function proyek_total($id_proyek) {
		$this->db->select('SUM(jumlah) AS total');
		$this->db->from('pemasukan');
		$this->db->where('id_proyek',$id_proyek);
		$this->db->where('pemasukan.sumber','Proyek');
		$this->db->order_by('id_pemasukan','DESC');
		$query = $this->db->get();
		return $query->row_array();
	}

	public function check_proyek($id_proyek) {
		$this->db->select('*');
		$this->db->from('pemasukan');
		$this->db->where('id_proyek',$id_proyek);
		$this->db->where('pemasukan.sumber','Proyek');
		$this->db->order_by('id_pemasukan','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	// Listing
	public function listing_proyek() {
		$this->db->select('pemasukan.*, harga.nama_harga, layanan.nama_layanan, client.nama, proyek.biaya,proyek.nama_proyek');
		$this->db->from('pemasukan');
		$this->db->join('layanan','layanan.id_layanan = pemasukan.id_layanan','INNER');
		$this->db->join('harga','harga.id_harga = pemasukan.id_harga','INNER');
		$this->db->join('client','client.id_client = pemasukan.id_client','INNER');
		$this->db->join('proyek','proyek.id_proyek = pemasukan.id_proyek','INNER');
		$this->db->where('pemasukan.sumber','Proyek');
		$this->db->order_by('id_pemasukan','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	/* PROYEK */
	
	// Tambah
	public function tambah($data) {
		$this->db->insert('pemasukan',$data);
	}
	
	// Edit
	public function edit($data) {
		$this->db->where('id_pemasukan',$data['id_pemasukan']);
		$this->db->update('pemasukan',$data);
	}
	
	// Delete
	public function delete($data) {
		$this->db->where('id_pemasukan',$data['id_pemasukan']);
		$this->db->delete('pemasukan',$data);
	}
}