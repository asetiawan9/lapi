<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Projek extends CI_Controller
{
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_projek');
		$this->load->model('M_klien');
		$this->load->model('M_user');
		$this->load->model('M_pekerjaan');


		
		if ($this->session->userdata('username') == "" && $this->session->userdata('password') =="") {
			$this->session->set_flashdata('sukses', 'silahkan login terlebih dahulu');
			redirect(base_url('index.php/login'), 'refresh');
		}
	}
	//halaman ytama
	public function index()
	{
		$klien = $this->M_klien->listing();
		$projek = $this->M_projek->listing();
		$klien2 = $this->M_klien->listing();
		$user = $this->M_user->listing();
		$user1 = $this->M_user->listing(); 
		

		
		$data = array(	'title' 			=> 'Data Projek',
						'projek' 			=> $projek,
						'klien'				=> $klien,
						'klien2'			=> $klien2,
						'user'				=> $user,
						'user1'				=> $user1,
						
						'isi' 				=> 'internal/projek/list');
		$this->load->view('layouts/wrapper', $data, FALSE);
	}

	//halaman tambah
	public function tambah()
	{
		//validasi

		$valid = $this->form_validation;

		$valid->set_rules('nama_projek','Nama', 'required',
			array(	'required'		=> 'Nama projek harus diisi'));

		if ($valid->run()=== FALSE) {  
			//end validasi
			$data = array(	'title' => 'Tambah Projek',
							'isi' 	=> 'internal/projek/tambah');
			$this->load->view('layouts/wrapper', $data, FALSE);
			//jka tak error
		}else{
			$i = $this->input;
			$data = array( 	'id_user'		=> $i->post('id_user'),
							'id_klien'		=> $i->post('id_klien'),
							'no_bukti'		=> $i->post('no_bukti'),
							'nama_projek'	=> $i->post('nama_projek'),
							'tanggal_mulai'	=> $i->post('tanggal_mulai'),
							'batas_waktu'	=> $i->post('batas_waktu'),
							'deskripsi'		=> $i->post('deskripsi')							
						);
			$this->M_projek->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('index.php/internal/Projek'), 'refresh');
		}

		}

			//halaman edit
	public function edit($id_projek)	{
		$projek = $this->M_projek->detail($id_projek);
		$pekerjaan = $this->M_pekerjaan->listing();
		

		$valid = $this->form_validation;

		$valid->set_rules('nama_projek','Nama', 'required',
			array(	'required'		=> 'Nama Projek'));
		

		if ($valid->run()=== FALSE) {
			//end validasi
			$data = array(	'title' 		=> 'Edit Projek'.$projek->nama,
							'projek'		=> $projek,
							'pekerjaan'			=> $pekerjaan,
							'isi' 			=> 'internal/projek/edit');
			$this->load->view('layouts/wrapper', $data, FALSE);
			//jka tak error
		}else{
			$i = $this->input;
			$data = array( 	'id_projek'			=> $id_projek,
							'id_user'	=> $i->post('id_user'),
							'id_klien'		=> $i->post('id_klien'),
							'no_bukti'		=> $i->post('no_bukti'),
							'nama_projek'	=> $i->post('nama_projek'),
							'tanggal_mulai'	=> $i->post('tanggal_mulai'),
							'batas_waktu'	=> $i->post('batas_waktu'),
							'deskripsi'		=> $i->post('deskripsi'));
			$this->M_projek->edit($data);
			$this->session->set_flashdata('sukses', 'Data berhasil dirubah');
			redirect(base_url('index.php/internal/Projek'), 'refresh');
		}

		}

		public function delete($id_projek)
		{
			
			$data = array('id_projek'	=> $id_projek);
			$this->M_projek->delete($data);
			$this->session->set_flashdata('sukses', 'Data telah hapus');
			redirect(base_url('index.php/internal/Projek'), 'refresh');
		}

		public function detail($id_projek)
		{
			$id = ($this->uri->segment(4))?$this->uri->segment(4):0;
			$projek = $this->M_projek->get_one($id_projek);
			$pekerjaan = $this->M_projek->pekerjaan($id_projek);
			$pekerjaan1 = $this->M_projek->pekerjaan($id);




			$data = array(	'id_projek'			=> $id_projek,
							'id'				=> $id,
							'titlepekerjaan'	=> 'List Pekerjaan',
							'title' 			=> $projek->nama_projek,
							'projek' 			=> $projek,
							'pekerjaan'			=> $pekerjaan,
							'pekerjaan1'		=> $pekerjaan1,
							'isi' 				=> 'internal/projek/detail');
			$this->load->view('layouts/wrapper', $data, FALSE);
		}

		public function editkomentar($id_pekerjaan)	{
			$pembayaran = $this->M_pekerjaan->detail($id_pekerjaan);

		
			$i = $this->input;
			$data = array( 	
							'id_pekerjaan'		=> $id_pekerjaan,
							'komentar'			=> $i->post('komentar'),
							);
			$this->M_pekerjaan->edit($data);
			redirect(base_url('index.php/internal/projek'), 'refresh');
		

		}


		public function tambahpekerjaan($id_projek)
	{
		$pekerjaan 	= $this->M_pekerjaan->detail1($id_projek);
		$id = ($this->uri->segment(4))?$this->uri->segment(4):0;

		
		//validasi
		$valid = $this->form_validation; 
		$valid->set_rules(	'list_tugas','Nama Pekerjaan', 'required',
				array(		'required'		=> ' Nama pekerjaan harus diisi'));

		if ($valid->run()=== FALSE) {
		$data = array(		'title' 	 		=> 'Tambah Pekerjaan',
							'pekerjaan' 		=> 	$pekerjaan,
							'isi' 	 			=> 'internal/projek/tambahpekerjaan');
		$this->load->view('layouts/wrapper', $data, FALSE);
		}else{
		$i = $this->input;
		$data = array ( 	'id_projek'		=>	$i->post('id_projek'),
							'list_tugas'	=>	$i->post('list_tugas')
						);
		$this->M_pekerjaan->tambah($data);
		$this->session->set_flashdata('sukses', 'Pekerjaan telah ditambah');
		redirect(base_url('index.php/internal/projek/detail/'.$id), 'refresh');
	}
	}
}

 ?>