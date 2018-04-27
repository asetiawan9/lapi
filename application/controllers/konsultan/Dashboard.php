<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		$bdibaca = $this->M_pesan->belumDibaca();

		//return $bdibaca;

		$data 		= array (	'title'				=>	'Dasboard',
								'web'				=>	'Dashboard',
								'isi'				=>	'internal/isian');
		$this->load->view('layouts/wrapper', $data, FALSE);

	}
}