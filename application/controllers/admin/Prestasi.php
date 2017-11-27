<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi extends CI_Controller {

	// Load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('prestasi_model');
	}

	// Halaman prestasi
	public function index()	{
		$prestasi = $this->prestasi_model->listing();
		$data = array(	'title'			=> 'Prestasi ('.count($prestasi).')',
						'prestasi'		=> $prestasi,
						'isi'			=> 'admin/prestasi/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

	// Tambah Prestasi
	public function tambah()	{
		//$kategori = $this->kategori_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_kegiatan','Nama Kegiatan','required',
					array(	'required'	=> 'Nama Kegiatan harus diisi'));

		$valid->set_rules('prestasi','Prestasi','required',
			array(	'required'	=> 'Prestasi harus diisi'));

		if($valid->run()) {
			$config['upload_path']   = './assets/upload/image/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      		$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
      		if(! $this->upload->do_upload('gambar')) {
		// End validasi

		$data = array(	'title'			=> 'Tambah Prestasi',
						//'kategori'		=> $kategori,
						'error'    		=> $this->upload->display_errors(),
						'isi'			=> 'admin/prestasi/tambah');
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
	        $slug 	= url_title($i->post('nama_kegiatan'),'dash',TRUE);

	        $data = array(	//'id_kategori'	=> $i->post('id_kategori'),
	        				'id_user'		=> $this->session->userdata('id'),
	        				'slug_prestasi'	=> $slug,
	        				'nama_kegiatan'	=> $i->post('nama_kegiatan'),
	        				'penyelenggara'	=> $i->post('penyelenggara'),
	        				'prestasi'		=> $i->post('prestasi'),
	        				'penghargaan'	=> $i->post('penghargaan'),
	        				'gambar'		=> $upload_data['uploads']['file_name'],
	        				'tingkat'		=> $i->post('tingkat'),
	        				'jenis_prestasi'=> $i->post('jenis_prestasi'),
	        				'keterangan'	=> $i->post('keterangan'),
	        				'tahun_prestasi'=> $i->post('tahun_prestasi'),
	        				'tanggal'		=> date('Y-m-d H:i:s'),
	        				);
	        $this->prestasi_model->tambah($data);
	        $this->session->set_flashdata('sukses', 'Data telah ditambah');
	        redirect(base_url('admin/prestasi'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'			=> 'Tambah Prestasi',
						//'kategori'		=> $kategori,
						'isi'			=> 'admin/prestasi/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}

// Edit prestasi
	public function edit($id_prestasi)	{
		//$kategori 	= $this->kategori_model->listing();
		$prestasi 	= $this->prestasi_model->detail($id_prestasi); 

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_kegiatan','Nama Kegiatan','required',
			array(	'required'	=> 'Nama Kegiatan harus diisi'));

		$valid->set_rules('keterangan','Keterangan','required',
			array(	'required'	=> 'Keterangan Prestasi harus diisi'));

		if($valid->run()) {

			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path']   = './assets/upload/image/';
      		$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      		$config['max_size']      = '12000'; // KB  
			$this->load->library('upload', $config);
      		if(! $this->upload->do_upload('gambar')) {
		// End validasi

		$data = array(	'title'			=> 'Edit Prestasi',
						//'kategori'		=> $kategori,
						'prestasi'		=> $prestasi,
						'error'    		=> $this->upload->display_errors(),
						'isi'			=> 'admin/pretasi/edit');
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
	        	unlink('./assets/upload/image/'.$prestasi->gambar);
				unlink('./assets/upload/image/thumbs/'.$prestasi->gambar);
	        }
	        // End hapus

	        $i 		= $this->input;
	        $slug 	= url_title($i->post('nama_kegiatan'),'dash',TRUE);

	        $data = array(	'id_prestasi'	=> $id_prestasi,
	        				//'id_kategori'	=> $i->post('id_kategori'),
	        				'id_user'		=> $this->session->userdata('id'),
	        				'slug_prestasi'	=> $slug,
	        				'nama_kegiatan'	=> $i->post('nama_kegiatan'),
	        				'keterangan'	=> $i->post('keterangan'),
	        				'jenis_prestasi'=> $i->post('jenis_prestasi'),
	        				'tahun_prestasi'=> $i->post('tahun_prestasi'),
	        				'gambar'		=> $upload_data['uploads']['file_name'],
	        				'tanggal'		=> date('Y-m-d H:i:s'),
	        				'penyelenggara'	=> $i->post('penyelenggara'),
	        				'prestasi'		=> $i->post('prestasi'),
	        				'penghargaan'	=> $i->post('penghargaan'),
	        				'tingkat'		=> $i->post('tingkat')
	        				);
	        $this->pretasi_model->edit($data);
	        $this->session->set_flashdata('sukses', 'Data telah diedit');
	        redirect(base_url('admin/prestasi'),'refresh');
		}}else{
			$i 		= $this->input;
	        $slug 	= url_title($i->post('nama_kegiatan'),'dash',TRUE);

	        $data = array(	'id_prestasi'	=> $id_prestasi,
	        				//'id_kategori'	=> $i->post('id_kategori'),
	        				'id_user'		=> $this->session->userdata('id'),
	        				'slug_prestasi'	=> $slug,
	        				'nama_kegiatan'	=> $i->post('nama_kegiatan'),
	        				'keterangan'	=> $i->post('keterangan'),
	        				'jenis_prestasi'=> $i->post('jenis_prestasi'),
	        				'tahun_prestasi'=> $i->post('tahun_prestasi'),
	        				'tanggal'		=> date('Y-m-d H:i:s'),
	        				'penyelenggara'	=> $i->post('penyelenggara'),
	        				'prestasi'		=> $i->post('prestasi'),
	        				'penghargaan'	=> $i->post('penghargaan'),
	        				'tingkat'		=> $i->post('tingkat')
	        				);
	        $this->prestasi_model->edit($data);
	        $this->session->set_flashdata('sukses', 'Data telah diedit');
	        redirect(base_url('admin/prestasi'),'refresh');
		}}
		// End masuk database
		$data = array(	'title'			=> 'Edit Prestasi',
						//'kategori'		=> $kategori,
						'prestasi'		=> $prestasi,
						'isi'			=> 'admin/prestasi/edit');
		$this->load->view('admin/layout/wrapper', $data, FALSE);		
	}		

	// Delete
	public function delete($id_prestasi) {
		$this->simple_login->cek_login();
		$prestasi = $this->prestasi_model->detail($id_prestasi);
		// Proses hapus gambar
		if($prestasi->gambar != "") {
			unlink('./assets/upload/image/'.$prestasi->gambar);
			unlink('./assets/upload/image/thumbs/'.$prestasi->gambar);
		}
		// End hapus gambar
		$data = array('id_prestasi'	=> $id_prestasi);
		$this->prestasi_model->delete($data);
	    $this->session->set_flashdata('sukses', 'Data telah dihapus');
	    redirect(base_url('admin/prestasi'),'refresh');
	}

}