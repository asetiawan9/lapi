<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller
{

	public function __construct()
	 {
	 		parent::__construct();

	 		$this->load->model('M_pesan');

	 		if ($this->session->userdata('username') == "" && $this->session->userdata('password') =="") {
			$this->session->set_flashdata('sukses', 'silahkan login terlebih dahulu');
			redirect(base_url('index.php/login'), 'refresh');
		}
	// 	parent::__construct();
	// 	$this->load->model('M_supplier');
	// 	$this->load->model('M_konsumen');
	// 	$this->load->model('M_stok_kendaraan');
	}

	public function index()
	{
		$data = $this->M_pesan->belumDibaca();
		$bdibaca = $this->M_pesan->belumDibaca();
		$count = 0;


		// echo $data->num_rows();

		$pesan = '';
		$notif = false;

		if ($bdibaca) {
			$count = $bdibaca->num_rows();
			foreach($bdibaca->result() as $key => $value)
			{


				// $pesan = $value->isi_pesan;
				$pesan .= '<a href="#" class="child" id='.$value->isi_pesan.'>
				<div class="btn btn-danger btn-circle" style="margin-right: 10px"><i class="fa fa-link"></i></div>
				<div class="mail-contnet">
				<h5>'. $value->pengirim .'</h5> <span class="mail-desc">'. $value->sub .'</span> <span class="time">'. substr($value->isi_pesan, 0,50) .'</span>
				</div>
				</a>';


				// echo $value->isi_pesan;
			}

			$notif = 'Y';

			# code...
		} else {
			$count = 0;
			$pesan .= '<a href="#" class="child"><h5>Tidak ada Pesan</h5></a>';
			$notif = 'N';
		}

		
		// echo $pesan;

		// echo $test;
		$data = array(
			'pesan' => $pesan,
			'notif' => $notif,
			'count' => $count
		);
		echo json_encode($data);

	}

	public function inbox($id_user)
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
						'isi' 				=> 'konsultant/pesan/list');
		$this->load->view('layouts/wrapper', $data, FALSE);

	}
}