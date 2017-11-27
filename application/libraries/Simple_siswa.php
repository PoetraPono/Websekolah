<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_siswa {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	// Login
	public function login($email, $password) {
		// Query untuk pencocokan data
		$query = $this->CI->db->get_where('client', array(
										'email' => $email, 
										'password' => sha1($password)
										));
										
		// Jika ada hasilnya
		if($query->num_rows() == 1) {
			$row 	= $this->CI->db->query('SELECT * FROM client WHERE email = "'.$email.'"');
			$admin 	= $row->row();
			$id 	= $admin->id_client;
			$nama	= $admin->nama;
			$level	= $admin->status_client;
			// $_SESSION['email'] = $email;
			$this->CI->session->set_userdata('email', $email); 
			$this->CI->session->set_userdata('status_client', $level); 
			$this->CI->session->set_userdata('nama_client', $nama); 
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			$this->CI->session->set_userdata('id_client', $id);
			// Kalau benar di redirect
		
			
			redirect(base_url('member'));
		}else{
			$this->CI->session->set_flashdata('sukses','Oopss.. Username/password salah');
			redirect(base_url('masuk'));
		}
		return false;
	}
	
	// Cek login
	public function cek_login() {
		if($this->CI->session->userdata('email') == '' && $this->CI->session->userdata('status_client')=='') {
			$this->CI->session->set_flashdata('sukses','Oops...silakan login dulu');
			redirect(base_url('masuk'));
		}	
	}
	
	// Logout
	public function logout() {
		$this->CI->session->unset_userdata('email');
		$this->CI->session->unset_userdata('status_client');
		$this->CI->session->unset_userdata('nama_client');
		$this->CI->session->unset_userdata('id_login');
		$this->CI->session->unset_userdata('id_client');
		$this->CI->session->set_flashdata('sukses','Terimakasih, Anda berhasil logout');
		redirect(base_url('masuk'));
	}
	
}