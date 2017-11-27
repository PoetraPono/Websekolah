<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('periode_model');
	}

	// Halaman utama
	public function index()	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_periode','Nama periode','required|is_unique[periode.nama_periode]',
			array(	'required'		=> 'Nama periode harus diisi',
					'is_unique'		=> 'Nama periode sudah ada. Buat Nama periode baru!'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Periode Waktu Sewa',
						'periode'	=> $this->periode_model->listing(),
						'isi'		=> 'admin/periode/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_periode'),'dash',TRUE);

			$data = array(	'nama_periode'	=> $i->post('nama_periode'),
							'slug_periode'	=> $slug,
							'urutan'		=> $i->post('urutan'),
						);
			$this->periode_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/periode'),'refresh');
		}
		// End proses masuk database
	}

	// Edit periode
	public function edit($id_periode)	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_periode','Nama periode','required',
			array(	'required'		=> 'Nama periode harus diisi'));

		$valid->set_rules('urutan','Urutan','required',
			array(	'required'		=> 'Urutan harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit Periode Waktu Sewa',
						'periode'	=> $this->periode_model->detail($id_periode),
						'isi'		=> 'admin/periode/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$slug 	= url_title($i->post('nama_periode'),'dash',TRUE);

			$data = array(	'id_periode'	=> $id_periode,
							'nama_periode'	=> $i->post('nama_periode'),
							'slug_periode'	=> $slug,
							'urutan'		=> $i->post('urutan'),
						);
			$this->periode_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/periode'),'refresh');
		}
		// End proses masuk database
	}

	// Delete user
	public function delete($id_periode) {
		// Proteksi proses delete harus login
		$this->simple_login->cek_login();

		$data = array('id_periode'	=> $id_periode);
		$this->periode_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/periode'),'refresh');
	}
}

/* End of file Periode.php */
/* Location: ./application/controllers/admin/Periode.php */