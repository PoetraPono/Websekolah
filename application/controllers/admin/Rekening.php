<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {
	
	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('rekening_model');
	}

	// Index
	public function index() {
		$rekening	= $this->rekening_model->listing();
		
		$data = array(	'title'	=> 'Manajemen Rekening',
						'rekening'	=> $rekening,
						'isi'	=> 'admin/rekening/list');
		$this->load->view('admin/layout/wrapper',$data);
	}
		
	// Tambah
	public function tambah() {
		// Validasi
		$v = $this->form_validation;
		$v->set_rules('nama_bank','Nama rekening','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
		
		$data = array(	'title'		=> 'Tambah Rekening',
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/rekening/tambah');
		$this->load->view('admin/layout/wrapper', $data);
		// Masuk database
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= FALSE;
				$config['width'] 			= 400; // Pixel
				$config['height'] 			= 250; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				
			$i = $this->input;
			$data = array(	'nama_bank'		=> $i->post('nama_bank'),
							'nomor_rekening'	=> $i->post('nomor_rekening'),
							'pemilik_rekening'	=> $i->post('pemilik_rekening'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'id_user'			=> $this->session->userdata('id')
							);
			$this->rekening_model->tambah($data);
			$this->session->set_flashdata('sukses','Data telah ditambah');
			redirect(base_url('admin/rekening'));
		}}
		// End masuk database
		$data = array(	'title'		=> 'Tambah Rekening',
						'isi'		=> 'admin/rekening/tambah');
		$this->load->view('admin/layout/wrapper', $data);
	}
	
	// Edit
	public function edit($id_rekening) {
		// Dari database
		$rekening		= $this->rekening_model->detail($id_rekening);
		// Validasi
		$v = $this->form_validation;
		$v->set_rules('nama_bank','Nama rekening','required');
		
		if($v->run()) {
			if(!empty($_FILES->gambar['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '1000'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
		
		$data = array(	'title'		=> 'Edit Rekening',
						'rekening'	=> $rekening,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/rekening/edit');
		$this->load->view('admin/layout/wrapper', $data);
		// Masuk database
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= FALSE;
				$config['width'] 			= 400; // Pixel
				$config['height'] 			= 250; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				
			$i = $this->input;
			// Hapus gambar lama
			unlink('./assets/upload/image/'.$rekening->gambar);
			unlink('./assets/upload/image/thumbs/'.$rekening->gambar);
			// End hapus gambar lama
			$data = array(	'id_rekening'		=> $rekening->id_rekening,
							'nama_bank'		=> $i->post('nama_bank'),
							'nomor_rekening'	=> $i->post('nomor_rekening'),
							'pemilik_rekening'	=> $i->post('pemilik_rekening'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'id_user'			=> $this->session->userdata('id')
							);
			$this->rekening_model->edit($data);
			$this->session->set_flashdata('sukses','Data telah diedit dan gambar telah diganti');
			redirect(base_url('admin/rekening'));
		}}else{
			$i = $this->input;
			$data = array(	'id_rekening'		=> $rekening->id_rekening,
							'nama_bank'		=> $i->post('nama_bank'),
							'nomor_rekening'	=> $i->post('nomor_rekening'),
							'pemilik_rekening'	=> $i->post('pemilik_rekening'),
							'id_user'			=> $this->session->userdata('id')
							);
			$this->rekening_model->edit($data);
			$this->session->set_flashdata('sukses','Data telah diedit dan gambar tidak diganti');
			redirect(base_url('admin/rekening'));			
		}}
		// End masuk database
		$data = array(	'title'		=> 'Edit Rekening',
						'rekening'	=> $rekening,
						'isi'		=> 'admin/rekening/edit');
		$this->load->view('admin/layout/wrapper', $data);
	}
	
	// Delete
	public function delete($id_rekening) {
		$this->simple_login->cek_login();
		$rekening		= $this->rekening_model->detail($id_rekening);
		// Hapus gambar lama
		if($rekening->gambar != "") {
			unlink('./assets/upload/image/'.$rekening->gambar);
			unlink('./assets/upload/image/thumbs/'.$rekening->gambar);
		}
		// End hapus gambar lama
		$data = array('id_rekening'	=> $id_rekening);
		$this->rekening_model->delete($data);		
		$this->session->set_flashdata('sukses','Data telah dihapus');
		redirect(base_url('admin/rekening'));

	}
}