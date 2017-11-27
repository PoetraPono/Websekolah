<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {
	
	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('staff_model');
	}

	// Index
	public function index() {
		$staff	= $this->staff_model->listing();
		
		$data = array(	'title'	=> 'Guru dan Staff',
						'staff'	=> $staff,
						'isi'	=> 'admin/staff/list');
		$this->load->view('admin/layout/wrapper',$data);
	}
		
	// Tambah
	public function tambah() {
		// Validasi
		$v = $this->form_validation;
		$v->set_rules('nama','Staff name','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
		
		$data = array(	'title'		=> 'Tambah Guru dan Staff',
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/staff/tambah');
		$this->load->view('admin/layout/wrapper', $data);
		// Masuk database
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= FALSE;
				$config['width'] 			= 400; // Pixel
				$config['height'] 			= 400; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				
			$i = $this->input;
			$data = array(	'ukuran'		=> $i->post('ukuran'),
							'status_tutor'	=> $i->post('status_tutor'),
							'nama'			=> $i->post('nama'),
							'jabatan'		=> $i->post('jabatan'),
							'pendidikan'	=> $i->post('pendidikan'),
							'expertise'		=> $i->post('expertise'),
							'email'			=> $i->post('email'),
							'isi'			=> $i->post('isi'),
							'gambar'		=> $upload_data['uploads']['file_name'],
							'id_user'		=> $this->session->userdata('id'),
							'status_staff'	=> $i->post('status_staff'),
							'keywords'		=> $i->post('keywords'),
							'urutan'		=> $i->post('urutan')
							);
			$this->staff_model->tambah($data);
			$this->session->set_flashdata('sukses','Staff added successfully');
			redirect(base_url('admin/staff'));
		}}
		// End masuk database
		$data = array(	'title'		=> 'Tambah Guru dan Staff',
						'isi'		=> 'admin/staff/tambah');
		$this->load->view('admin/layout/wrapper', $data);
	}
	
	// Edit
	public function edit($id_staff) {
		// Dari database
		$staff		= $this->staff_model->detail($id_staff);
		// Validasi
		$v = $this->form_validation;
		$v->set_rules('nama','Staff name','required');
		
		if($v->run()) {
			if(!empty($_FILES->gambar['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
		
		$data = array(	'title'		=> 'Edit Guru dan Staff',
						'staff'	=> $staff,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/staff/edit');
		$this->load->view('admin/layout/wrapper', $data);
		// Masuk database
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= FALSE;
				$config['width'] 			= 400; // Pixel
				$config['height'] 			= 400; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				
			$i = $this->input;
			// Hapus gambar lama
			unlink('./assets/upload/image/'.$staff->gambar);
			unlink('./assets/upload/image/thumbs/'.$staff->gambar);
			// End hapus gambar lama
			$data = array(	'id_staff'		=> $staff->id_staff,
							'status_tutor'	=> $i->post('status_tutor'),
							'ukuran'		=> $i->post('ukuran'),
							'nama'			=> $i->post('nama'),
							'jabatan'		=> $i->post('jabatan'),
							'pendidikan'	=> $i->post('pendidikan'),
							'expertise'		=> $i->post('expertise'),
							'email'			=> $i->post('email'),
							'isi'			=> $i->post('isi'),
							'gambar'		=> $upload_data['uploads']['file_name'],
							'id_user'		=> $this->session->userdata('id'),
							'status_staff'	=> $i->post('status_staff'),
							'keywords'		=> $i->post('keywords'),
							'urutan'		=> $i->post('urutan')
							);
			$this->staff_model->edit($data);
			$this->session->set_flashdata('sukses','Staff data updated and photo replaced');
			redirect(base_url('admin/staff'));
		}}else{
			$i = $this->input;
			$data = array(	'id_staff'		=> $staff->id_staff,
							'status_tutor'	=> $i->post('status_tutor'),
							'ukuran'		=> $i->post('ukuran'),
							'nama'			=> $i->post('nama'),
							'jabatan'		=> $i->post('jabatan'),
							'pendidikan'	=> $i->post('pendidikan'),
							'expertise'		=> $i->post('expertise'),
							'email'			=> $i->post('email'),
							'isi'			=> $i->post('isi'),
							'id_user'		=> $this->session->userdata('id'),
							'status_staff'	=> $i->post('status_staff'),
							'keywords'		=> $i->post('keywords'),
							'urutan'		=> $i->post('urutan')
							);
			$this->staff_model->edit($data);
			$this->session->set_flashdata('sukses','Staff data updated successfully');
			redirect(base_url('admin/staff'));			
		}}
		// End masuk database
		$data = array(	'title'		=> 'Edit Guru dan Staff',
						'staff'	=> $staff,
						'isi'		=> 'admin/staff/edit');
		$this->load->view('admin/layout/wrapper', $data);
	}
	
	// Delete
	public function delete($id_staff) {
		$this->simple_login->cek_login();
		$staff		= $this->staff_model->detail($id_staff);
		// Hapus gambar lama
		unlink('./assets/upload/image/'.$staff->gambar);
		unlink('./assets/upload/image/thumbs/'.$staff->gambar);
		// End hapus gambar lama
		$data = array('id_staff'	=> $id_staff);
		$this->staff_model->delete($data);		
		$this->session->set_flashdata('sukses','Staff deleted successfully');
		redirect(base_url('admin/staff'));

	}
}