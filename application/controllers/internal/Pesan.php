<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller
{
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pesan');
		$this->load->model('M_user');
		if ($this->session->userdata('username') == "" && $this->session->userdata('password') =="") {
			$this->session->set_flashdata('sukses', 'silahkan login terlebih dahulu');
			redirect(base_url('index.php/login'), 'refresh');
		}

	}
	//halaman ytama


	public function detailpesan($id_pesan)
	{
		$pesan = $this->M_pesan->detail($id_pesan);
		$id_konsultan = $this->session->userdata('id_user');

		$data = array(	'title' 			=> 'Detail Pesan',
						'id_konsultan'		=> $id_konsultan,
						'pesan'				=> $pesan,
						'isi' 				=> 'internal/pesan/detail');
		$this->load->view('layouts/wrapper', $data, FALSE);
	}
	

	public function buatPesan()
	{
		$id_konsultan = $this->session->userdata('id_user'); 

		$user = $this->M_user->listing();
		$pesan = $this->M_pesan->listing();


		$valid = $this->form_validation;

		$valid->set_rules('id_user','Konsultan', 'required',
			array(	'required'		=> 'Masukan nama konsutan'));

		if ($valid->run()=== FALSE) { 
			//end validasi
			$data = array(	'user'	=> $user,
							'pesan'	=> $pesan,
							'id_konsultan'	=> $id_konsultan,
							'title' => 'Tulis Pesan',
							'isi' 	=> 'internal/pesan/tambah');
			$this->load->view('layouts/wrapper', $data, FALSE);
			//jka tak error
		}else{
			$i = $this->input;
			$data = array( 	'id_user'			=> $i->post('id_user'),
							'id_pengirim'		=> $i->post('id_pengirim'),
							'sub'				=> $i->post('sub'),
							'isi_pesan'			=> $i->post('isi_pesan'),
							'status'			=> $i->post('status')							
						);
			$this->M_pesan->tambah($data);
			$this->session->set_flashdata('sukses', 'Pesan berhasil dikirim');
			redirect(base_url('index.php/internal/pesan/index/'.$id_konsultan ), 'refresh');

		}

	
	}

	public function index($id_user)
	{
		$id_konsultan = $this->session->userdata('id_user');
	//	$id_pesan = $this->M_pesan->detail($id_pesan);

		
		$user = $this->M_pesan->getHiji($id_user);

		if ($id_konsultan != $user) {
			$user1 	= $user->id_user;
			//$user2	= $user->id_user,
			$date 	= $user->tanggal;
			$date 	= date("d-m-Y");
		}else{
			$user1	= null;
			$user2 	= null;
			$date 	= null;
		}
		
		$pesan = $this->M_pesan->getPesan($id_user);

		$data = array(	'id_konsultan'		=> $id_konsultan,
						// 'id_pesan'			=> $id_pesan,
						'id_user'			=> $id_user,
						'date'				=> $date,
						'pesan'				=> $pesan,
						'user1'				=> $user1,
						//'user2'				=> $user2,
						'title' 			=> 'Pesan',
						'isi' 				=> 'internal/pesan/list');
		$this->load->view('layouts/wrapper', $data, FALSE);

	}

	public function sent($id_user)
	{
		$id_konsultan = $this->session->userdata('id_user');
	//	$id_pesan = $this->M_pesan->detail($id_pesan);

		
		$user = $this->M_pesan->getHiji($id_user);

		if ($id_konsultan != $user) {
			$user1 	= $user->id_user;
			//$user2	= $user->id_user,
			$date 	= $user->tanggal;
			$date 	= date("d-m-Y");
		}else{
			$user1	= null;
			$user2 	= null;
			$date 	= null;
		}
		
		$pesan = $this->M_pesan->sent($id_user);

		$data = array(	'id_konsultan'		=> $id_konsultan,
						// 'id_pesan'			=> $id_pesan,
						'id_user'			=> $id_user,
						'date'				=> $date,
						'pesan'				=> $pesan,
						'user1'				=> $user1,
						//'user2'				=> $user2,
						'title' 			=> 'Pesan',
						'isi' 				=> 'internal/pesan/list');
		$this->load->view('layouts/wrapper', $data, FALSE);

	}

	public function belumDibaca()
	{
		$bdibaca = $this->M_pesan->belumDibaca();

		return $bdibaca;
	}

	public function delete()
	{
		$id_konsultan = $this->session->userdata('id_user');
		
		foreach ($_POST['id_pesan'] as $id_pesan) {
			$this->M_pesan->delete($id_pesan);

		}
		return redirect(base_url('index.php/internal/pesan/index/'.$id_konsultan ), 'refresh');
	}

	

}

 ?>