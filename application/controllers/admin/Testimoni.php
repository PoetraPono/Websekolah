<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('testimoni_model');
	}

	// Halaman utama
	public function index()	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_testi','Nama Testimoni','required',
			array(	'required'		=> 'Nama Testimoni harus diisi'));

		$valid->set_rules('isi','Isi Testimoni','required',
			array(	'required'		=> 'Isi Testimoni harus diisi'));
	

		if($valid->run()===FALSE) {
		// End Validasi

		$data = array(	'title'		=> 'Testimoni',
						'testimoni'	=> $this->testimoni_model->listing(),
						'isi'		=> 'admin/testimoni/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$data = array(	'nama_testi'	=> $i->post('nama_testi'),
							'isi'			=> $i->post('isi'),
							'tanggal_posting'=> $i->post('tanggal_posting'),
						);
			$this->testimoni_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/testimoni'),'refresh');
		}
		// End proses masuk database
	}

	// Edit testimoni
	public function edit($id_testimoni)	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_testi','Nama Testimoni','required',
			array(	'required'		=> 'Nama testimoni harus diisi'));

		$valid->set_rules('isi','Isi Testimoni','required',
			array(	'required'		=> 'Isi Testimoni harus diisi'));


		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit Testimoni',
						'testimoni'	=> $this->testimoni_model->detail($id_testimoni),
						'isi'		=> 'admin/testimoni/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$data = array(	'id_testimoni'	=> $id_testimoni,
							'nama_testi'	=> $i->post('nama_testi'),
							'isi'			=> $i->post('isi'),
							'tanggal_posting'=> $i->post('tanggal_posting'),
						);
			$this->testimoni_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/testimoni'),'refresh');
		}
		// End proses masuk database
	}

	// Delete testimoni
	public function delete($id_testimoni) {
		// Proteksi proses delete harus login
		$this->simple_login->cek_login();

		$data = array('id_testimoni' => $id_testimoni);
		$this->testimoni_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/testimoni'),'refresh');
	}
}

/* End of file Kategori.php */
/* Location: ./application/controllers/admin/Kategori.php */