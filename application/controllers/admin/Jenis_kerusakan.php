<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_kerusakan extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('jenis_kerusakan_model');
	}

	// Halaman utama
	public function index()	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_jenis_kerusakan','Nama Jenis kerusakan Barang','required|is_unique[jenis_kerusakan.nama_jenis_kerusakan]',
			array(	'required'		=> 'Nama Jenis kerusakan Barang harus diisi',
					'is_unique'		=> 'Nama Jenis kerusakan Barang sudah ada. Buat Nama jenis_kerusakan baru!'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'				=> 'Jenis kerusakan Barang',
						'jenis_kerusakan'	=> $this->jenis_kerusakan_model->listing(),
						'isi'				=> 'admin/jenis_kerusakan/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_jenis_kerusakan'),'dash',TRUE);

			$data = array(	'nama_jenis_kerusakan'	=> $i->post('nama_jenis_kerusakan'),
							'slug_jenis_kerusakan'	=> $slug,
							'urutan'		=> $i->post('urutan'),
						);
			$this->jenis_kerusakan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/jenis_kerusakan'),'refresh');
		}
		// End proses masuk database
	}

	// Edit jenis_kerusakan
	public function edit($id_jenis_kerusakan)	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_jenis_kerusakan','Nama jenis_kerusakan','required',
			array(	'required'		=> 'Nama jenis_kerusakan harus diisi'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'				=> 'Edit Jenis kerusakan Barang',
						'jenis_kerusakan'	=> $this->jenis_kerusakan_model->detail($id_jenis_kerusakan),
						'isi'				=> 'admin/jenis_kerusakan/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_jenis_kerusakan'),'dash',TRUE);

			$data = array(	'id_jenis_kerusakan'	=> $id_jenis_kerusakan,
							'nama_jenis_kerusakan'	=> $i->post('nama_jenis_kerusakan'),
							'slug_jenis_kerusakan'	=> $slug,
							'urutan'				=> $i->post('urutan'),
						);
			$this->jenis_kerusakan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/jenis_kerusakan'),'refresh');
		}
		// End proses masuk database
	}

	// Delete user
	public function delete($id_jenis_kerusakan) {
		// Proteksi proses delete harus login
		$this->simple_login->cek_login();

		$data = array('id_jenis_kerusakan'	=> $id_jenis_kerusakan);
		$this->jenis_kerusakan_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/jenis_kerusakan'),'refresh');
	}
}

/* End of file Jenis_kerusakan.php */
/* Location: ./application/controllers/admin/Jenis_kerusakan.php */