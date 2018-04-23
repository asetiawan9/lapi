<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pembayaran');
		$this->load->model('M_klien');
		$this->load->model('M_projek');
		if ($this->session->userdata('username') == "" && $this->session->userdata('password') =="") {
			$this->session->set_flashdata('sukses', 'silahkan login terlebih dahulu');
			redirect(base_url('index.php/login'), 'refresh');
		}
	}
	//halaman ytama
	public function index()
	{	
		$pembayaran = $this->M_pembayaran->listing();
		$klien 		= $this->M_klien->listing();
		$klien1 	= $this->M_klien->listing();
		$projek		= $this->M_projek->listing();
		$projek1 	= $this->M_projek->listing();
		$data = array(	'title' 			=> 'Data Pembayaran',
						'pembayaran' 		=> $pembayaran,
						'klien'				=> $klien,
						'klien1'			=> $klien1,
						'projek'			=> $projek,
						'projek1'			=> $projek1,
						'isi' 				=> 'internal/pembayaran/list');
		$this->load->view('layouts/wrapper', $data, FALSE);
	}

	//halaman tambah
	public function tambah()
	{
		//validasi

		$valid = $this->form_validation;

		$valid->set_rules('no_bukti','No Bukti', 'required',
			array(	'required'		=> 'Bukti pembayaran harus diisi'));

		if ($valid->run()=== FALSE) { 
			//end validasi
			$data = array(	'title' => 'Tambah Pembayaran',
							'isi' 	=> 'internal/pembayaran/tambah');
			$this->load->view('layouts/wrapper', $data, FALSE);
			//jka tak error
		}else{
			$i = $this->input;
			$data = array( 	'no_bukti'			=> $i->post('no_bukti'),
							'id_klien'			=> $i->post('id_klien'),
							'id_projek'			=> $i->post('id_projek'),
							'tanggal_pembuatan'	=> $i->post('tanggal_pembuatan'),
							'batas_tanggal'		=> $i->post('batas_tanggal'),
							'harga'				=> $i->post('harga'),
							'status'			=> $i->post('status'),
							'persaratan'		=> $i->post('persaratan')							
						);
			$this->M_pembayaran->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('index.php/internal/Pembayaran'), 'refresh');
		}

		}

			//halaman edit
	public function edit($id_pembayaran)	{
		$pembayaran = $this->M_pembayaran->detail($id_pembayaran);
		

			$i = $this->input;
			$data = array( 	'id_pembayaran'		=> $id_pembayaran,
							'no_bukti'			=> $i->post('no_bukti'),
							'id_klien'			=> $i->post('id_klien'),
							'id_projek'			=> $i->post('id_projek'),
							'tanggal_pembuatan'	=> $i->post('tanggal_pembuatan'),
							'batas_tanggal'		=> $i->post('batas_tanggal'),
							'harga'				=> $i->post('harga'),
							'status'			=> $i->post('status'),
							'persaratan'		=> $i->post('persaratan'));
			$this->M_pembayaran->edit($data);
			$this->session->set_flashdata('sukses', 'Data berhasil dirubah');
			redirect(base_url('index.php/internal/Pembayaran'), 'refresh');
		

		}
	public function editstatus($id)	{
		$pembayaran = $this->M_pembayaran->detail($id);
		
			$i = $this->input;
			$data = array( 	'id_pembayaran'				=> $id,
							'status'			=> $i->post('status'),
							);
			$this->M_pembayaran->edit($data);
			redirect(base_url('index.php/internal/Pembayaran/detail/'.$id), 'refresh');
		

		}

		public function delete($id_pembayaran)
		{
			
			$data = array('id_pembayaran'	=> $id_pembayaran);
			$this->M_pembayaran->delete($data);
			$this->session->set_flashdata('sukses', 'Data telah hapus');
			redirect(base_url('index.php/internal/Pembayaran'), 'refresh');
		}

		public function detail($id)
		{
			$pembayaran = $this->M_pembayaran->get_one($id);
			$pembayaran1 = $this->M_pembayaran->listing();
			$klien 		= $this->M_klien->listing();
			$klien1 	= $this->M_klien->listing();
			$projek		= $this->M_projek->listing();
			$projek1 	= $this->M_projek->listing();

			$data = array(	'id'		=> $id,
							'title' 	=> $pembayaran->no_bukti,
							'pembayaran' 	=> $pembayaran,
							'pembayaran1' 	=> $pembayaran1,
							'klien'				=> $klien,
							'klien1'			=> $klien1,
							'projek'			=> $projek,
							'projek1'			=> $projek1,
							'isi' 		=> 'internal/pembayaran/detail');
			$this->load->view('layouts/wrapper', $data, FALSE);
		}

}

 ?>