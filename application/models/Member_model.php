<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
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
	public function transaksi($id_client) {
		$this->db->select('transaksi.*,harga_barang.keterangan, barang.nama_barang, client.nama');
		$this->db->from('transaksi');
		$this->db->join('barang','barang.id_barang = transaksi.id_barang','INNER');
		$this->db->join('harga_barang','harga_barang.id_harga_barang = transaksi.id_harga_barang','INNER');
		$this->db->join('client','client.id_client = transaksi.id_client','INNER');
		$this->db->where('transaksi.id_client',$id_client);
		$this->db->order_by('id_transaksi','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Detail
	public function transaksi_client($id_transaksi,$id_client) {
		$this->db->select('transaksi.*,harga_barang.keterangan, barang.nama_barang, client.nama');
		$this->db->from('transaksi');
		$this->db->join('barang','barang.id_barang = transaksi.id_barang','INNER');
		$this->db->join('harga_barang','harga_barang.id_harga_barang = transaksi.id_harga_barang','INNER');
		$this->db->join('client','client.id_client = transaksi.id_client','INNER');
		$this->db->where(array(	'transaksi.id_client'	=> $id_client,
								'transaksi.id_transaksi'	=> $id_transaksi));
		$this->db->order_by('id_transaksi','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// Listing
	public function pembayaran($id_client) {
		$this->db->select('pemasukan.*, harga_barang.keterangan, barang.nama_barang, client.nama, transaksi.total_transaksi');
		$this->db->from('pemasukan');
		$this->db->join('barang','barang.id_barang = pemasukan.id_barang','INNER');
		$this->db->join('harga_barang','harga_barang.id_harga_barang = pemasukan.id_harga_barang','INNER');
		$this->db->join('client','client.id_client = pemasukan.id_client','INNER');
		$this->db->join('transaksi','transaksi.id_transaksi = pemasukan.id_transaksi','INNER');
		$this->db->where('pemasukan.id_client',$id_client);
		$this->db->order_by('id_pemasukan','DESC');
		$query = $this->db->get();
		return $query->result();
	}
}