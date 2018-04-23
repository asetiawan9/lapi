<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		if ($this->session->userdata('username') == "" && $this->session->userdata('password') =="") {
			$this->session->set_flashdata('sukses', 'silahkan login terlebih dahulu');
			redirect(base_url('index.php/login'), 'refresh');
		}
	}
	//halaman ytama
	public function index()
	{
		$user = $this->M_user->listing();
		$user1 = $this->M_user->listing();
		$data = array(	'title' => 'Data User',
						'user' 	=> $user,
						'user'	=> $user1,
						'isi' 	=> 'internal/user/list');
		$this->load->view('layouts/wrapper', $data, FALSE);
	}

	//halaman tambah
	public function tambah()
	{
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_user','Nama', 'required',
			array(	'required'		=> 'Nama harus diisi'));

		$valid->set_rules('username','Username', 'required',
			array(	'required'		=> 'Username harus diisi'));
		
		$valid->set_rules('password','Password', 'required',
			array(	'required'		=> 'Password harus diisi',
					));
		

		if ($valid->run()=== FALSE) {
			//end validasi
			$data = array(	'title' => 'Tambah User',
						'isi' 	=> 'internal/user/tambah');
			$this->load->view('layouts/wrapper', $data, FALSE);
			//jka tak error
		}else{
			$i = $this->input;
			$data = array( 	'nama_user'			=> $i->post('nama_user'),
							'username'		=> $i->post('username'),
							'password'		=> sha1($i->post('password')),
							'akses_level'	=> $i->post('akses_level'),

						);
			$this->M_user->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('index.php/internal/user'), 'refresh');
		}

		}

			//halaman edit
	public function edit($id_user)	{

		$user = $this->M_user->get_one($id_user);

		$valid = $this->form_validation;

		$valid->set_rules('nama_user','Nama', 'required',
			array(	'required'		=> 'Nama harus diisi'));

		
		if ($valid->run()=== FALSE) {
			//end validasi
			$data = array(	'title' => 'Edit User'.$user->nama,
							'user'	=> $user,
							'isi' 	=> 'internal/user/edit');
			$this->load->view('layouts/wrapper', $data, FALSE);
			//jka tak error
		}else{
			$i = $this->input;

			// jika input password lebih dari 6
			if(strlen($i->post('password')) > 6){
			$data = array( 	'id_user'		=> $id_user,
							'nama_user'		=> $i->post('nama_user'),
							'password'		=> sha1($i->post('password')),
							'akses_level'	=> $i->post('akses_level')
						);
		}else{
			$data = array(	'id_user'		=> $id_user,
							'nama_user'		=> $i->post('nama_user'),
							'akses_level'	=> $i->post('akses_level'));
		}
			$this->M_user->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('index.php/internal/user'), 'refresh');
		}

		}
		public function delete($id_user)
		{
			
			$data = array('id_user'	=> $id_user);
			$this->M_user->delete($data);
			$this->session->set_flashdata('sukses', 'Data telah hapus');
			redirect(base_url('index.php/internal/user'), 'refresh');
		}

}

 ?>