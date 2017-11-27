<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
	
	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('client_model');
	}

	// Index
	public function index() {
		$client	= $this->client_model->listing();
		
		$data = array(	'title'		=> 'Siswa ('.count($client).')',
						'client'	=> $client,
						'isi'		=> 'admin/client/list');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	// Index
	public function pending() {
		$client	= $this->client_model->pending();
		
		$data = array(	'title'		=> 'Calon Siswa ('.count($client).')',
						'client'	=> $client,
						'isi'		=> 'admin/client/list');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	// Approve
	public function password($id_client) {
		$client		= $this->client_model->detail($id_client);
		$i			= $this->input;
		$site		= $this->konfigurasi_model->listing();
		
		$this->form_validation->set_rules('id_client','Pilih client','required');
		if($this->form_validation->run() === FALSE) {
		
		$data = array(	'title'		=> 'Setting Password: '.$client->nama,
						'client'	=> $client,
						'site'		=> $site,
						'isi'		=> 'admin/client/password');
		$this->load->view('admin/layout/wrapper',$data);
		// Masuk database
		}else{
			$data = array(	'id_client'		=> $client->id_client,
							'id_user'		=> $this->session->userdata('id'),
							'password'		=> sha1($i->post('password')),
							'password_hint'	=> $i->post('password'),
							'status_client'	=> 'Yes',
							'status_client'	=> 'Yes');
			$this->client_model->edit($data);
			
			// Kirim email
			/* Kirim Email ke Pelanggan */
				$nama 		= $client->nama;
				$email 		= $client->email;
				$subject 	= 	"Username Password Anda - ".$site['namaweb'];
				$pesan 		= 	'<p>Hai <strong>'.$client->nama.'</strong>. Terimakasih telah
								menjadi bagian dari '.$site['namaweb'].'. 
								Bersama email ini kami kirimkan 
								Username dan password untuk login ke '.
								'<strong>Member Area</strong> kami.</p>'.
								'<h3>Hak akses Anda:</h3>'.
								'Username: '.$client->email.'<br>'.
								'Password: '.$i->post('password').'<hr>'.
								'<h3>Login dan optimalkan</h3>'.
								'Silakan login dengan username/email dan password di atas ke Member Area 
								kami di <a href="'.base_url('member').'">'.base_url('member').'</a>'.
								'<br>Terimakasih atas perhatian yang diberikan<hr>'.
								$site['namaweb'].'<br>'.
								nl2br($site['alamat']).
								'Phone: '.$site['telepon'].'<br>'.
								'Email: '.$site->email.'<br>'.
								'Website: '.$site['website'];
				
				$config 	= array('mailtype'  => 'html', 
									'charset'   => 'utf-8',
									'newline'	=> "\r\n",
									'validation'=> TRUE
									);
				$this->load->library('email', $config);
				$this->email->from($site->email, $site['namaweb']);
				$this->email->to($email);
				$this->email->cc($site->email);
				$this->email->subject($subject);
				$this->email->message($pesan);
				if($this->email->send());
				/* End kirim email */
			// End kirim email
			$this->session->set_flashdata('sukses','Client description updated successfully');
			redirect(base_url('admin/client'));	
		}
		// End masuk database
	}
		
	// Tambah
	public function tambah() {
		// Validasi
		$v = $this->form_validation;
		$v->set_rules('nama','Full name','required');
		
		if($v->run()) {
			if(!empty($_FILES->gambar['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
		
		$data = array(	'title'		=> 'Tambah Siswa',
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/client/tambah');
		$this->load->view('admin/layout/wrapper', $data);
		// Masuk database
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
				
			$i = $this->input;
			$data = array(	'nama'			=> $i->post('nama'),
							'alamat'		=> $i->post('alamat'),
							'telepon'		=> $i->post('telepon'),
							'website'		=> $i->post('website'),
							'email'			=> $i->post('email'),
							'isi'			=> $i->post('isi'),
							'status_testimoni'		=> $i->post('status_testimoni'),
							'isi_testimoni'			=> $i->post('isi_testimoni'),
							'gambar'		=> $upload_data['uploads']['file_name'],
							'id_user'		=> $this->session->userdata('id'),
							'status_client'	=> $i->post('status_client'),
							'keywords'		=> $i->post('keywords')
							);
			$this->client_model->tambah($data);
			$this->session->set_flashdata('sukses','Client added successfully');
			redirect(base_url('admin/client'));
		}}else{
			$i = $this->input;
			$data = array(	'nama'			=> $i->post('nama'),
							'alamat'		=> $i->post('alamat'),
							'telepon'	=> $i->post('telepon'),
							'website'		=> $i->post('website'),
							'email'			=> $i->post('email'),
							'isi'			=> $i->post('isi'),
							'status_testimoni'		=> $i->post('status_testimoni'),
							'isi_testimoni'			=> $i->post('isi_testimoni'),
							'id_user'		=> $this->session->userdata('id'),
							'status_client'	=> $i->post('status_client'),
							'keywords'		=> $i->post('keywords')
							);
			$this->client_model->tambah($data);
			$this->session->set_flashdata('sukses','Client added successfully');
			redirect(base_url('admin/client'));
		}}
		// End masuk database
		$data = array(	'title'		=> 'Tambah Siswa',
						'isi'		=> 'admin/client/tambah');
		$this->load->view('admin/layout/wrapper', $data);
	}
	
	// Edit
	public function edit($id_client) {
		// Dari database
		$client		= $this->client_model->detail($id_client);
		// Validasi
		$v = $this->form_validation;
		$v->set_rules('nama','Full name','required');
		
		if($v->run()) {
			if(!empty($_FILES->gambar['name'])) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
		
		$data = array(	'title'		=> 'Edit Client',
						'client'	=> $client,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/client/edit');
		$this->load->view('admin/layout/wrapper', $data);
		// Masuk database
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
				
			$i = $this->input;
			
			// Hapus gambar lama
			if($client->gambar!="") {
				unlink('./assets/upload/image/'.$client->gambar);
				unlink('./assets/upload/image/thumbs/'.$client->gambar);
			}
			// End hapus gambar lama
			$data = array(	'id_client'		=> $client->id_client,
							'nama'			=> $i->post('nama'),
							'alamat'		=> $i->post('alamat'),
							'telepon'	=> $i->post('telepon'),
							'website'		=> $i->post('website'),
							'email'			=> $i->post('email'),
							'isi'			=> $i->post('isi'),
							'status_testimoni'		=> $i->post('status_testimoni'),
							'isi_testimoni'			=> $i->post('isi_testimoni'),
							'gambar'		=> $upload_data['uploads']['file_name'],
							'id_user'		=> $this->session->userdata('id'),
							'status_client'	=> $i->post('status_client'),
							'keywords'		=> $i->post('keywords')
							);
			$this->client_model->edit($data);
			$this->session->set_flashdata('sukses','Client description updated and picture changed');
			redirect(base_url('admin/client'));
		}}else{
			$i = $this->input;
			$data = array(	'id_client'		=> $client->id_client,
							'nama'			=> $i->post('nama'),
							'alamat'		=> $i->post('alamat'),
							'telepon'	=> $i->post('telepon'),
							'website'		=> $i->post('website'),
							'email'			=> $i->post('email'),
							'isi'			=> $i->post('isi'),
							'status_testimoni'		=> $i->post('status_testimoni'),
							'isi_testimoni'			=> $i->post('isi_testimoni'),
							'id_user'		=> $this->session->userdata('id'),
							'status_client'	=> $i->post('status_client'),
							'status_client'	=> $i->post('status_client'),
							'keywords'		=> $i->post('keywords')
							);
			$this->client_model->edit($data);
			$this->session->set_flashdata('sukses','Client description updated successfully');
			redirect(base_url('admin/client'));			
		}}
		// End masuk database
		$data = array(	'title'		=> 'Edit Client',
						'client'	=> $client,
						'isi'		=> 'admin/client/edit');
		$this->load->view('admin/layout/wrapper', $data);
	}
	
	// Delete
	public function delete($id_client) {
		$this->simple_login->cek_login();
		$client		= $this->client_model->detail($id_client);
		// Hapus gambar lama
		if($client->gambar!="") {
				unlink('./assets/upload/image/'.$client->gambar);
				unlink('./assets/upload/image/thumbs/'.$client->gambar);
			}
		// End hapus gambar lama
		$data = array('id_client'	=> $id_client);
		$this->client_model->delete($data);		
		$this->session->set_flashdata('sukses','Client deleted successfully');
		redirect(base_url('admin/client'));

	}
}