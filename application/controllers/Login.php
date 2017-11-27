<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// Halaman login
	public function index()	{

		// Validasi
		$username	= $this->input->post('username');
		$password 	= $this->input->post('password');

		$valid 		= $this->form_validation;
		
		$valid->set_rules('username','Username','required',
			array('required'	=> 'Username harus diisi'));

		$valid->set_rules('password','Password','required',
			array('required'	=> 'Password harus diisi'));

		if ($valid->run()) {
			$this->simple_login->login($username, $password,
			base_url('admin/dasbor'), base_url('login'));
		}
		// End validasi

		$data = array(	'title'	=> 'Login Administrator');
		$this->load->view('admin/login_view', $data, FALSE);
	}

	// Lupa password
	public function lupa() {
		$data = array(	'title'	=> 'Lupa password');
		$this->load->view('admin/lupa_password', $data, FALSE);
	}

	// Ganti password
	public function ganti($kode_rahasia) {
		$data = array(	'title'	=> 'Ganti password');
		$this->load->view('admin/ganti_password', $data, FALSE);
	}

	// Logout
	public function logout() {
		// Fungsi logout jalan di sini
		$this->simple_login->logout();
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */