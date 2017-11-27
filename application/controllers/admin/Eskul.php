<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eskul extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('eskul_model');
	}

	// Halaman Eskul
	public function index()	{
		$eskul 	= $this->eskul_model->listing();
		$data 	= array('title'			=> 'Eskul ('.count($eskul).')',
						'eskul'			=> $eskul,
						'isi'			=> 'admin/eskul/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Tambah Eskul
	public function tambah()	{
		//$kategori = $this->kategori_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules(	'nama_eskul','Nama Eskul','required',
					array(	'required'	=> 'Nama eskul harus diisi'));

		if($valid->run()) {
			$config['upload_path']   = './assets/upload/image/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      		$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
      		if(! $this->upload->do_upload('gambar')) {
		// End validasi

		$data = array(	'title'			=> 'Tambah Eskul',
						'error'    		=> $this->upload->display_errors(),
						'isi'			=> 'admin/eskul/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/image/thumbs/';
	        $config['create_thumb']   	= TRUE;
	        $config['quality']       	= "100%";
	        $config['maintain_ratio']   = TRUE;
	        $config['width']       		= 360; // Pixel
	        $config['height']       	= 360; // Pixel
	        $config['x_axis']       	= 0;
	        $config['y_axis']       	= 0;
	        $config['thumb_marker']   	= '';
	        $this->load->library('image_lib', $config);
	        $this->image_lib->resize();

	        $i 		= $this->input;
	        $slug 	= url_title($i->post('nama_eskul'),'dash',TRUE);

	        $data = array(	'id_user'		=> $this->session->userdata('id'),
	        				'slug_eskul'	=> $slug,
	        				'nama_eskul'	=> $i->post('nama_eskul'),
	        				'keterangan'	=> $i->post('keterangan'),
	        				'gambar'		=> $upload_data['uploads']['file_name'],
	        				'tgl_update'		=> $i->post('tgl_update'),
	        				);
	        $this->eskul_model->tambah($data);
	        $this->session->set_flashdata('sukses', 'Data telah ditambah');
	        redirect(base_url('admin/eskul'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'			=> 'Tambah Eskul',
						'isi'			=> 'admin/eskul/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Edit prestasi
	public function edit($id_eskul)	{
		
		$eskul 	= $this->eskul_model->detail($id_eskul); 

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_eskul','Nama Eskul','required',
			array(	'required'	=> 'Nama eskul harus diisi'));

		if($valid->run()) {

			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path']   = './assets/upload/image/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      		$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
      		if(! $this->upload->do_upload('gambar')) {
		// End validasi

		$data = array(	'title'			=> 'Edit Eskul',
						'eskul'			=> $eskul,
						'error'    		=> $this->upload->display_errors(),
						'isi'			=> 'admin/eskul/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Masuk database
		}else{
			$upload_data        		= array('uploads' =>$this->upload->data());
	        // Image Editor
	        $config['image_library']  	= 'gd2';
	        $config['source_image']   	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
	        $config['new_image']     	= './assets/upload/image/thumbs/';
	        $config['create_thumb']   	= TRUE;
	        $config['quality']       	= "100%";
	        $config['maintain_ratio']   = TRUE;
	        $config['width']       		= 360; // Pixel
	        $config['height']       	= 360; // Pixel
	        $config['x_axis']       	= 0;
	        $config['y_axis']       	= 0;
	        $config['thumb_marker']   	= '';
	        $this->load->library('image_lib', $config);
	        $this->image_lib->resize();

	        //Hapus gambar
	        if($prestasi->gambar != "") {
	        	unlink('./assets/upload/image/'.$eskul->gambar);
				unlink('./assets/upload/image/thumbs/'.$eskul->gambar);
	        }
	        // End hapus

	        $i 		= $this->input;
	        $slug 	= url_title($i->post('nama_eskul'),'dash',TRUE);

	        $data = array(	'id_eskul'		=> $id_eskul,
	        				'id_user'		=> $this->session->userdata('id'),
	        				'slug_eskul'	=> $slug,
	        				'nama_eskul'	=> $i->post('nama_eskul'),
	        				'keterangan'	=> $i->post('keterangan'),
	        				'gambar'		=> $upload_data['uploads']['file_name'],
	        				'tgl_update'		=> $i->post('tgl_update'),
	        				);
	        $this->eskul_model->edit($data);
	        $this->session->set_flashdata('sukses', 'Data telah diedit');
	        redirect(base_url('admin/eskul'),'refresh');
		}}else{
			$i 		= $this->input;
	        $slug 	= url_title($i->post('nama_eskul'),'dash',TRUE);

	        $data = array(	'id_eskul'		=> $id_eskul,
	        				'id_user'		=> $this->session->userdata('id'),
	        				'slug_eskul'	=> $slug,
	        				'nama_eskul'	=> $i->post('nama_eskul'),
	        				'keterangan'	=> $i->post('keterangan'),
	        				'gambar'		=> $upload_data['uploads']['file_name'],
	        				'tgl_update'	=> $i->post('tgl_update'),
	        				);
	        $this->eskul_model->edit($data);
	        $this->session->set_flashdata('sukses', 'Data telah diedit');
	        redirect(base_url('admin/eskul'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'			=> 'Edit Eskul',
						'eskul'			=> $eskul,
						'isi'			=> 'admin/eskul/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}		

	// Delete
	public function delete($id_eskul) {
		$this->simple_login->cek_login();
		$eskul = $this->eskul_model->detail($id_eskul);

		$data = array('id_eskul' => $id_eskul);
		$this->eskul_model->delete($data);
	    $this->session->set_flashdata('sukses', 'Data telah dihapus');
	    redirect(base_url('admin/eskul'),'refresh');
	}

}