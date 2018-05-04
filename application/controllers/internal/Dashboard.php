<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pembayaran');

		if ($this->session->userdata('username') == "" && $this->session->userdata('password') =="" && $this->session->userdata('akses_level') != "internal") {
			$this->session->set_flashdata('sukses', 'silahkan login terlebih dahulu');
			redirect(base_url('index.php/login'), 'refresh');
		}
		//$this->load->database();
		// $this->load->model('M_konsumen');
		// $this->load->model('M_stok_kendaraan');
	}

	public function index()
	{
		$pembayaran = $this->M_pembayaran->listing1();

		//foreach ($pembayaran as $pembayaran) {
			// $harga = $pembayaran->harga;
			// echo 'adddddddddddddddddddddddddd';
			// echo count($harga);
		//}
		
		
		$data 		= array (	'title'				=>	'Dasboard',
								// 'harga'				=>  $harga,
								'pembayaran'		=> $pembayaran,
								'isi'				=>	'internal/isian');
		$this->load->view('layouts/wrapper', $data, FALSE);

	}
}