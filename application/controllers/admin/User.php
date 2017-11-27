<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	// Main page user
	public function index()	{
		$data = array(	'title'		=> 'User/Admin',
						'user'		=> $this->user_model->listing(),
						'isi'		=> 'admin/user/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Tambah user/admin
	public function tambah()	{

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array(	'required'		=> 'Nama harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array(	'required'		=> 'Email harus diisi',
					'valid_email'	=> 'Format email tidak valid'));

		$valid->set_rules('username','Username','required|is_unique[users.username]',
			array(	'required'		=> 'Username harus diisi',
					'is_unique'		=> 'Username sudah ada. Buat username baru!'));

		$valid->set_rules('password','Password','required',
			array(	'required'		=> 'Password harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Tambah User/Admin',
						'isi'		=> 'admin/user/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$data = array(	'nama'			=> $i->post('nama'),
							'email'			=> $i->post('email'),
							'username'		=> $i->post('username'),
							'password'		=> sha1($i->post('password')),
							'akses_level'	=> $i->post('akses_level'),
						);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/user'),'refresh');
		}
		// End proses masuk database
	}

	// Edit data
	public function edit($id_user) {
		$user = $this->user_model->detail($id_user);
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array(	'required'		=> 'Nama harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
			array(	'required'		=> 'Email harus diisi',
					'valid_email'	=> 'Format email tidak valid'));

		$valid->set_rules('password','Password','required',
			array(	'required'		=> 'Password harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

		$data = array(	'title'		=> 'Edit User/Admin',
						'user'		=> $user,
						'isi'		=> 'admin/user/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Proses masuk ke database
		}else{
			$i 	= $this->input;
			$data = array(	'id_user'		=> $id_user,
							'nama'			=> $i->post('nama'),
							'email'			=> $i->post('email'),
							'username'		=> $i->post('username'),
							'password'		=> sha1($i->post('password')),
							'akses_level'	=> $i->post('akses_level'),
						);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/user'),'refresh');
		}
		// End proses masuk database
	}

	// Delete user
	public function delete($id_user) {
		// Proteksi proses delete harus login
		$this->simple_login->cek_login();

		$data = array('id_user'	=> $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/user'),'refresh');
	}
}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */