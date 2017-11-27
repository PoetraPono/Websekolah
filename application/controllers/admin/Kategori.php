<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_model');
	}

	// Halaman utama
	public function index()	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori','Nama kategori','required|is_unique[kategori.nama_kategori]',
			array(	'required'		=> 'Nama kategori harus diisi',
					'is_unique'		=> 'Nama kategori sudah ada. Buat Nama kategori baru!'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Kategori Berita/Profil',
						'kategori'	=> $this->kategori_model->listing(),
						'isi'		=> 'admin/kategori/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_kategori'),'dash',TRUE);

			$data = array(	'nama_kategori'	=> $i->post('nama_kategori'),
							'slug_kategori'	=> $slug,
							'urutan'		=> $i->post('urutan'),
						);
			$this->kategori_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/kategori'),'refresh');
		}
		// End proses masuk database
	}

	// Edit kategori
	public function edit($id_kategori)	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori','Nama kategori','required',
			array(	'required'		=> 'Nama kategori harus diisi'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit Kategori Berita/Profil',
						'kategori'	=> $this->kategori_model->detail($id_kategori),
						'isi'		=> 'admin/kategori/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_kategori'),'dash',TRUE);

			$data = array(	'id_kategori'	=> $id_kategori,
							'nama_kategori'	=> $i->post('nama_kategori'),
							'slug_kategori'	=> $slug,
							'urutan'		=> $i->post('urutan'),
						);
			$this->kategori_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/kategori'),'refresh');
		}
		// End proses masuk database
	}

	// Delete user
	public function delete($id_kategori) {
		// Proteksi proses delete harus login
		$this->simple_login->cek_login();

		$data = array('id_kategori'	=> $id_kategori);
		$this->kategori_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/kategori'),'refresh');
	}
}

/* End of file Kategori.php */
/* Location: ./application/controllers/admin/Kategori.php */