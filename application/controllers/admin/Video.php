<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {
	
	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('video_model');
	}

	// Index
	public function index() {
		$video	= $this->video_model->listing();
		
		$data = array(	'title'	=> 'Video',
						'video'	=> $video,
						'isi'	=> 'admin/video/list');
		$this->load->view('admin/layout/wrapper',$data);
	}
		
	// Tambah
	public function tambah() {
		// Validasi
		$v = $this->form_validation;
		$v->set_rules('judul','Video title','required');
		
		if($v->run()=== FALSE) {
		$data = array(	'title'		=> 'Add Video',
						'isi'		=> 'admin/video/tambah');
		$this->load->view('admin/layout/wrapper', $data);
		// Masuk database
		}else{
				
			$i = $this->input;
			$data = array(	'judul'			=> $i->post('judul'),
							'posisi'		=> $i->post('posisi'),
							'keterangan'	=> $i->post('keterangan'),
							'video'			=> $i->post('video'),
							'urutan'		=> $i->post('urutan'),
							'id_user'		=> $this->session->userdata('id'),
							'bahasa'		=> $i->post('bahasa')
							);
			$this->video_model->tambah($data);
			$this->session->set_flashdata('sukses','Data added successfully');
			redirect(base_url('admin/video'));
		}
	}
	
	// Edit
	public function edit($id_video) {
		// Dari database
		$video		= $this->video_model->detail($id_video);
		// Validasi
		$v = $this->form_validation;
		$v->set_rules('judul','Video title','required');
		
		if($v->run()=== FALSE) {
		$data = array(	'title'		=> 'Edit Video',
						'video'		=> $video,
						'isi'		=> 'admin/video/edit');
		$this->load->view('admin/layout/wrapper', $data);
		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'id_video'		=> $video->id_video,
							'judul'			=> $i->post('judul'),
							'posisi'		=> $i->post('posisi'),
							'keterangan'	=> $i->post('keterangan'),
							'video'			=> $i->post('video'),
							'urutan'		=> $i->post('urutan'),
							'id_user'		=> $this->session->userdata('id'),
							'bahasa'		=> $i->post('bahasa')
							);
			$this->video_model->edit($data);
			$this->session->set_flashdata('sukses','Data updated successfully');
			redirect(base_url('admin/video'));
		}
	}
	
	// Delete
	public function delete($id_video) {
		$this->simple_login->cek_login();
		$video	= $this->video_model->detail($id_video);
		$data = array('id_video'	=> $id_video);
		$this->video_model->delete($data);		
		$this->session->set_flashdata('sukses','Data deleted successfully');
		redirect(base_url('admin/video'));

	}
}