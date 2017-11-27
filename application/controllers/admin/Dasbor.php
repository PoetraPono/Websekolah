<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
	}

	// Halaman utama
	public function index()	{
		$data = array(	'title'		=> 'Halaman administrator',
						'isi'		=> 'admin/dasbor/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// General Configuration
	public function konfigurasi() {
		$site = $this->konfigurasi_model->listing();
		
		// Validasi 
		$this->form_validation->set_rules('namaweb','Website name website','required');
		$this->form_validation->set_rules('email','Email','valid_email');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'General Configuration',
						'site'	=> $site,
						'isi'	=> 'admin/dasbor/umum');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'id_konfigurasi'	=> $i->post('id_konfigurasi'),
							'namaweb'			=> $i->post('namaweb'),
							'tagline'			=> $i->post('tagline'),
							'tentang'			=> $i->post('tentang'),
							'deskripsi'			=> $i->post('deskripsi'),
							'website'			=> $i->post('website'),
							'email'				=> $i->post('email'),
							'email_cadangan'	=> $i->post('email_cadangan'),
							'alamat'			=> $i->post('alamat'),
							'telepon'			=> $i->post('telepon'),
							'hp'				=> $i->post('hp'),
							'fax'				=> $i->post('fax'),
							'keywords'			=> $i->post('keywords'),
							'metatext'			=> $i->post('metatext'),
							'facebook'			=> $i->post('facebook'),
							'youtube'			=> $i->post('youtube'),
							'instagram'			=> $i->post('instagram'),
							'rekening'			=> $i->post('rekening'),
							'visi'				=> $i->post('visi'),
							'misi'				=> $i->post('misi'),
							'sejarah'			=> $i->post('sejarah'),
							'sambutan'			=> $i->post('sambutan'),
							'kesiswaan'			=> $i->post('kesiswaan'),
							'fasilitas'			=> $i->post('fasilitas'),
							'kurikulum'			=> $i->post('kurikulum'),
							'google_map'		=> $i->post('google_map'),
							'id_user'			=> $this->session->userdata('id'));
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Site configuration updated successfully');
			redirect(base_url('admin/dasbor/konfigurasi'));
		}
	}

	// Chatpca
	public function captcha() {
		$site = $this->konfigurasi_model->listing();
		
		// Validasi 
		$this->form_validation->set_rules('site_key','Site key','required');
		$this->form_validation->set_rules('secret_key','Secret key','valid_email');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'General Configuration',
						'site'	=> $site,
						'isi'	=> 'admin/dasbor/captcha');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'id_konfigurasi'	=> $i->post('id_konfigurasi'),
							'site_key'			=> $i->post('site_key'),
							'secret_key'		=> $i->post('secret_key'),
							'id_user'			=> $this->session->userdata('id'));
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Site configuration updated successfully');
			redirect(base_url('admin/dasbor/konfigurasi'));
		}
	}
	
	// Google map
	public function map() {
		$site = $this->konfigurasi_model->listing();
		
		// Validasi 
		$this->form_validation->set_rules('google_map','Google map','required');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'Google Map Setting',
						'site'	=> $site,
						'isi'	=> 'admin/dasbor/google_map');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'id_konfigurasi'	=> $site->id_konfigurasi,
							'google_map'		=> $i->post('google_map'),
							'id_user'			=> $this->session->userdata('id'));
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Site configuration updated successfully');
			redirect(base_url('admin/dasbor/map'));
		}
	}
	
	
	// New logo
	public function logo() {
		$site = $this->konfigurasi_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','ID Konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB	
$this->load->library('upload', $config);
			if(! $this->upload->do_upload('logo')) {
				
		$data = array(	'title'	=> 'New logo',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/dasbor/logo');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site->logo);
				unlink('./assets/upload/image/thumbs/'.$site->logo);
				// End hapus gambar lama
				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'logo'			=> $upload_data['uploads']['file_name'],
								'id_user'			=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses','Logo changed');
				redirect(base_url('admin/dasbor/logo'));
		}}
		// Default page
		$data = array(	'title'	=> 'New logo',
						'site'	=> $site,
						'isi'	=> 'admin/dasbor/logo');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	// Konfigurasi Icon
	public function icon() {
		$site = $this->konfigurasi_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','ID Konfigurasi','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB	
$this->load->library('upload', $config);
			if(! $this->upload->do_upload('icon')) {
				
		$data = array(	'title'	=> 'New Icon',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/dasbor/icon');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site->icon);
				unlink('./assets/upload/image/thumbs/'.$site->icon);
				// End hapus gambar lama
				$this->image_lib->resize();
				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'icon'			=> $upload_data['uploads']['file_name'],
								'id_user'			=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses','Icon changed');
				redirect(base_url('admin/dasbor/icon'));
		}}
		// Default page
		$data = array(	'title'	=> 'New Icon',
						'site'	=> $site,
						'isi'	=> 'admin/dasbor/icon');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	// Quote
	public function quote() {
		$site = $this->konfigurasi_model->listing();
		
		// Validasi 
		$this->form_validation->set_rules('judul_1','Judul Quote 1','required');
		$this->form_validation->set_rules('pesan_1','Pesan Quote 1','required');
		$this->form_validation->set_rules('judul_2','Judul Quote 2','required');
		$this->form_validation->set_rules('pesan_2','Pesan Quote 2','required');
		$this->form_validation->set_rules('judul_3','Judul Quote 3','required');
		$this->form_validation->set_rules('pesan_3','Pesan Quote 3','required');
		$this->form_validation->set_rules('judul_4','Judul Quote 4','required');
		$this->form_validation->set_rules('pesan_4','Pesan Quote 4','required');
		
		if($this->form_validation->run() === FALSE) {
			
		$data = array(	'title'	=> 'General Configuration - Quote Front End',
						'site'	=> $site,
						'isi'	=> 'admin/dasbor/quote');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
			$i = $this->input;
			$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
							'judul_1'		=> $i->post('judul_1'),
							'pesan_1'		=> $i->post('pesan_1'),
							'judul_2'		=> $i->post('judul_2'),
							'pesan_2'		=> $i->post('pesan_2'),
							'judul_3'		=> $i->post('judul_3'),
							'pesan_3'		=> $i->post('pesan_3'),
							'judul_4'		=> $i->post('judul_4'),
							'pesan_4'		=> $i->post('pesan_4'),
							'judul_5'		=> $i->post('judul_5'),
							'pesan_5'		=> $i->post('pesan_5'),
							'judul_6'		=> $i->post('judul_6'),
							'pesan_6'		=> $i->post('pesan_6'),
							'isi_1'			=> $i->post('isi_1'),
							'isi_2'			=> $i->post('isi_2'),
							'isi_3'			=> $i->post('isi_3'),
							'isi_4'			=> $i->post('isi_4'),
							'isi_5'			=> $i->post('isi_5'),
							'isi_6'			=> $i->post('isi_6'),
							'link_1'		=> $i->post('link_1'),
							'link_2'		=> $i->post('link_2'),
							'link_3'		=> $i->post('link_3'),
							'link_4'		=> $i->post('link_4'),
							'link_5'		=> $i->post('link_5'),
							'link_6'		=> $i->post('link_6'),
							'id_user'		=> $this->session->userdata('id'));
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses','Site configuration updated successfully');
			redirect(base_url('admin/dasbor/quote'));
		}
	}
	
	// New javawebmedia
	public function javawebmedia() {
		$site = $this->konfigurasi_model->listing();
		
		$v = $this->form_validation;
		$v->set_rules('id_konfigurasi','ID Konfigurasi','required');
		
		if($v->run()) {
			if(!empty($_FILES['gambar']['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '12000'; // KB	
$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
				
		$data = array(	'title'	=> $site->namaweb.' Information',
						'site'	=> $site,
						'error'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/dasbor/javawebmedia');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				// Hapus gambar lama
				unlink('./assets/upload/image/'.$site['gambar']);
				unlink('./assets/upload/image/thumbs/'.$site['gambar']);
				// End hapus gambar lama
				// Masuk ke database
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'gambar'		=> $upload_data['uploads']['file_name'],
								'video'			=> $i->post('video'),
								'javawebmedia'			=> $i->post('javawebmedia'),
								'id_user'		=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses',$site->namaweb.' information changed');
				redirect(base_url('admin/dasbor/javawebmedia'));
		}}else{
				$i = $this->input;
				$data = array(	'id_konfigurasi'=> $i->post('id_konfigurasi'),
								'video'			=> $i->post('video'),
								'javawebmedia'			=> $i->post('javawebmedia'),
								'id_user'		=> $this->session->userdata('id'));
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses',$site->namaweb.' information changed');
				redirect(base_url('admin/dasbor/javawebmedia'));
		}}
		// Default page
		$data = array(	'title'	=> $site->namaweb.' Information',
						'site'	=> $site,
						'isi'	=> 'admin/dasbor/javawebmedia');
		$this->load->view('admin/layout/wrapper',$data);
	}
}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */