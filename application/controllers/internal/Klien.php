<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Klien extends CI_Controller
{
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_klien');
		if ($this->session->userdata('username') == "" && $this->session->userdata('password') =="") {
			$this->session->set_flashdata('sukses', 'silahkan login terlebih dahulu');
			redirect(base_url('index.php/login'), 'refresh');
		}
	}
	//halaman ytama
	public function index()
	{
		$klien = $this->M_klien->listing();
		$data = array(	'title' 			=> 'Data Klien',
						'klien' 			=> $klien,
						'isi' 				=> 'internal/klien/list');
		$this->load->view('layouts/wrapper', $data, FALSE);
	}

	//halaman tambah
	public function tambah()
	{
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama', 'required',
			array(	'required'		=> 'Nama klien harus diisi'));

		$valid->set_rules('email','Email', 'required|valid_email',
			array(	'required'		=> 'Email harus diisi',
					'valid_email'	=> 'Format email tidak benar'));

		$valid->set_rules('kontak_utama','Kontak Utama', 'required',
			array(	'required'		=> 'Kontak utama harus diisi'));

		if ($valid->run()) {
			//kalau cover d upload 
			if(!empty(	$_FILES['akte_perusahaan']['name'])){

			$config['upload_path']   = './assets/images/perusahaan';
			$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
			$config['max_size']      = '20000'; // KB  
			$this->upload->initialize($config);
			if(! 	$this->upload->do_upload('akte_perusahaan')) {  
						//end validasi
			$data = array(	'title'  		=> 	'Tambah Data Klien/Perusahaan',
							'error'	 		=> 	$this->upload->display_errors(),
							'isi' 			=> 'internal/klien/tambah');
			$this->load->view('layouts/wrapper', $data, FALSE);
			//jka tak error
		}else{
			$upload_data        		= array('uploads' => $this->upload->data());
			// Image Editor
			$config['image_library']  	= 'gd2';
			$config['source_image']   	= '.assets/images/buktipekerjaan'.$upload_data['uploads']['file_name'];  
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
			$i = $this->input;
			$data = array( 	'nama'				=> $i->post('nama'),
							'kontak_utama'		=> $i->post('kontak_utama'),
							'email'				=> $i->post('email'),
							'situs_web'			=> $i->post('situs_web'),
							'telepon'			=> $i->post('telepon'),
							'situs_web'			=> $i->post('situs_web'),
							'telepon'			=> $i->post('telepon'),
							'alamat'			=> $i->post('alamat'),
							'kode_pos'			=> $i->post('kode_pos'),
							'kabupaten'			=> $i->post('kabupaten'),
							'provinsi'			=> $i->post('provinsi'),
							'akte_perusahaan'	=> $upload_data['uploads']['file_name'],
							'siup'				=> $upload_data['uploads']['file_name']
												
						);
			$this->M_klien->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('index.php/internal/Klien'), 'refresh');
		}
			}else{
					// kondisi dimana masukan data tanpa upload gambar
					$i = $this->input;
					$data = array( 	'nama'			=> $i->post('nama'),
									'kontak_utama'	=> $i->post('kontak_utama'),
									'email'			=> $i->post('email'),
									'situs_web'		=> $i->post('situs_web'),
									'telepon'		=> $i->post('telepon'),
									'situs_web'		=> $i->post('situs_web'),
									'telepon'		=> $i->post('telepon'),
									'alamat'		=> $i->post('alamat'),
									'kode_pos'		=> $i->post('kode_pos'),
									'kabupaten'		=> $i->post('kabupaten'),
									'provinsi'		=> $i->post('provinsi')						
								);
					$this->M_klien->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('index.php/internal/Klien'), 'refresh');
				}
			}
		// //end masuk database
		// $data = array(		'title'  		=> 	'Tambah Buku',
		// 					'web'			=>	'Web Desa',
		// 					'supplier'	 	=>	$supplier,
		// 					'kendaraan' 	=> 	$kendaraan,
		// 					'isi' 	 		=> 	'admin/stok_kendaraan/tambah');
		// 	$this->load->view('admin/layouts/wrapper', $data, FALSE);

		}




		// $valid = $this->form_validation;

		// $valid->set_rules('nama','Nama', 'required',
		// 	array(	'required'		=> 'Nama klien harus diisi'));

		// $valid->set_rules('email','Email', 'required|valid_email',
		// 	array(	'required'		=> 'Email harus diisi',
		// 			'valid_email'	=> 'Format email tidak benar'));

		// $valid->set_rules('kontak_utama','Kontak Utama', 'required',
		// 	array(	'required'		=> 'Kontak utama harus diisi'));

		// if ($valid->run()=== FALSE) { 
		// 	//end validasi
		// 	$data = array(	'title' => 'Tambah Klien',
		// 					'isi' 	=> 'internal/klien/tambah');
		// 	$this->load->view('layouts/wrapper', $data, FALSE);
		// 	//jka tak error
		// }else{
		// 	$i = $this->input;
		// 	$data = array( 	'nama'			=> $i->post('nama'),
		// 					'kontak_utama'	=> $i->post('kontak_utama'),
		// 					'email'			=> $i->post('email'),
		// 					'situs_web'		=> $i->post('situs_web'),
		// 					'telepon'		=> $i->post('telepon'),
		// 					'situs_web'		=> $i->post('situs_web'),
		// 					'telepon'		=> $i->post('telepon'),
		// 					'alamat'		=> $i->post('alamat'),
		// 					'kode_pos'		=> $i->post('kode_pos'),
		// 					'kabupaten'		=> $i->post('kabupaten'),
		// 					'provinsi'		=> $i->post('provinsi')							
		// 				);
		// 	$this->M_klien->tambah($data);
		// 	$this->session->set_flashdata('sukses', 'Data telah ditambah');
		// 	redirect(base_url('index.php/internal/Klien'), 'refresh');
		// }

		// }

			//halaman edit
	public function edit($id_klien)	{
		$klien = $this->M_klien->get_one($id_klien);
	
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama', 'required',
			array(	'required'		=> 'Nama klien harus diisi'));

		$valid->set_rules('email','Email', 'required|valid_email',
			array(	'required'		=> 'Email harus diisi',
					'valid_email'	=> 'Format email tidak benar'));

		$valid->set_rules('kontak_utama','Kontak Utama', 'required',
			array(	'required'		=> 'Kontak utama harus diisi'));
		

		if ($valid->run()=== FALSE) {
			//end validasi
			$data = array(	'title' 		=> 'Edit Klien'.$klien->nama,
							'klien'			=> $klien,
							'isi' 			=> 'internal/klien/edit');
			$this->load->view('layouts/wrapper', $data, FALSE);
			//jka tak error
		}else{
			$i = $this->input;
			$data = array( 	'id_klien'			=> $id_klien,
							'nama'			=> $i->post('nama'),
							'kontak_utama'	=> $i->post('kontak_utama'),
							'email'			=> $i->post('email'),
							'situs_web'		=> $i->post('situs_web'),
							'telepon'		=> $i->post('telepon'),
							'situs_web'		=> $i->post('situs_web'),
							'telepon'		=> $i->post('telepon'),
							'alamat'		=> $i->post('alamat'),
							'kode_pos'		=> $i->post('kode_pos'),
							'kabupaten'		=> $i->post('kabupaten'),
							'provinsi'		=> $i->post('provinsi'));
			$this->M_klien->edit($data);
			$this->session->set_flashdata('sukses', 'Data berhasil dirubah');
			redirect(base_url('index.php/internal/Klien'), 'refresh');
		}

		}

		public function delete($id_klien)
		{
			
			$data = array('id_klien'	=> $id_klien);
			$this->M_klien->delete($data);
			$this->session->set_flashdata('sukses', 'Data telah hapus');
			redirect(base_url('index.php/internal/Klien'), 'refresh');
		}

		public function detail($id_klien)
		{
			$klien = $this->M_klien->get_one($id_klien);
			$klien1 = $this->M_klien->listing();

			$data = array(	'id_klien'		=> $id_klien,
							'title' 	=> $klien->nama,
							'klien' 	=> $klien,
							'klien1'	=> $klien1,
							'isi' 		=> 'internal/klien/detail');
			$this->load->view('layouts/wrapper', $data, FALSE);
		}

}

 ?>