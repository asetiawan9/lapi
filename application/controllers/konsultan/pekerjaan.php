<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class pekerjaan extends CI_Controller
{
	//load model
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username') == "" && $this->session->userdata('password') =="") {
			$this->session->set_flashdata('sukses', 'silahkan login terlebih dahulu');
			redirect(base_url('index.php/login'), 'refresh');
		}
		$this->load->model('M_projek');
		$this->load->model('M_klien');
		$this->load->model('M_user');
		$this->load->model('M_pekerjaan');
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
						'isi' 				=> 'konsultant/pekerjaan/list');
		$this->load->view('layouts/wrapper', $data, FALSE);
	}

	//halaman tambah

		public function detail($id_projek)
		{
			$id = ($this->uri->segment(4))?$this->uri->segment(4):0;
			$projek = $this->M_projek->get_one($id_projek);
			$pekerjaan = $this->M_pekerjaan->get_one($id_projek);
			$komentar = $this->M_pekerjaan->komentar($id_projek);

			$data = array(	'id_projek'			=> $id_projek,
							'titlepekerjaan'	=> 'List Pekerjaan',
							'title' 			=> 'Upload Bukti',
							'projek' 			=> $projek,
							'pekerjaan'			=> $pekerjaan,
							'komentar'			=> $komentar,
							'id'				=> $id,
							'isi' 				=> 'konsultant/pekerjaan/detail');
			$this->load->view('layouts/wrapper', $data, FALSE);
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
							'id'				=> $id,
							'pekerjaan' 		=> 	$pekerjaan,
							'isi' 	 			=> 'konsultant/pekerjaan/tambahpekerjaan');
		$this->load->view('layouts/wrapper', $data, FALSE);
		}else{
		$i = $this->input;
		$data = array ( 	'id_projek'		=>	$i->post('id_projek'),
							'list_tugas'	=>	$i->post('list_tugas'),
							'durasi'		=>  $i->post('durasi')

						);
		$this->M_pekerjaan->tambah($data);
		$this->session->set_flashdata('sukses', 'Pekerjaan telah ditambah');
		redirect(base_url('index.php/konsultan/pekerjaan/detail/'.$id), 'refresh');
	}
	}

	public function uploadbukti($id_pekerjaan)
		{
			
		
			$pekerjaan = $this->M_pekerjaan->detail($id_pekerjaan);
			$id_projek = $this->input->post('id_projek');
			$id = ($this->uri->segment(4))?$this->uri->segment(4):0;

			//kalau cover d upload 
			if(!empty($_FILES['bukti']['name'])){
			$config['upload_path']   = './assets/images/buktipekerjaan';
			$config['allowed_types'] = 'gif|jpg|png|svg|jpeg|docx';
			$config['max_size']      = '12000'; // KB  
			$this->upload->initialize($config);
			if(! $this->upload->do_upload('bukti')) { 
						//end validasi
			$data = array(	'error'     => $this->upload->display_errors(),
                            'isi'       => 'konsultant/pekerjaan/detail');
			$this->load->view('layouts/wrapper', $data, FALSE);
			//jka tak error
		}else{

			$upload_data        		= array('uploads' =>$this->upload->data());
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

			//hapus gambar sbelumnya
			if($pekerjaan->bukti != "")
			{
				unlink('assets/images/buktipekerjaan'.$pekerjaan->foto);

			}

			$i = $this->input;
			$data = array( 	'id_projek'			=> $id_projek,
							'id_pekerjaan'		=> $id_pekerjaan,
							'bukti'				=> $upload_data['uploads']['file_name']						
						);
			$this->M_pekerjaan->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('index.php/konsultan/pekerjaan/detail/'.$id_projek), 'refresh');
		}}

		}
	public function delete($id_projek, $id_pekerjaan)
		{

			
			// $id_projek = $this->input->post('id_projek');
			// echo var_dump($id_projek);
			$pekerjaan = $this->M_pekerjaan->detail($id_pekerjaan);
			//$id = ($this->uri->segment(4))?$this->uri->segment(4):0;

			$data = array('id_pekerjaan' => $id_pekerjaan,
							'id_projek' => $id_projek);

			$this->M_pekerjaan->delete($data);
			if($pekerjaan->bukti != "")
				{
					unlink('./assets/images/buktipekerjaan/'.$pekerjaan->bukti);
						
				}
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('index.php/konsultan/pekerjaan/detail/'.$id_projek), 'refresh');
		}

	public function editpekerjaan($id_projek, $id_pekerjaan)
		{
			$pekerjaan 	= $this->M_pekerjaan->detail1($id_projek);
			$id = ($this->uri->segment(4))?$this->uri->segment(4):0;
			
			//validasi
			$valid = $this->form_validation; 
			$valid->set_rules(	'list_tugas','Nama Pekerjaan', 'required',
					array(		'required'		=> ' Nama pekerjaan harus diisi'));

			if ($valid->run()=== FALSE) {
			$data = array(		'title' 	 		=> 'Tambah Pekerjaan',
								'id'				=> $id,
								'pekerjaan' 		=> 	$pekerjaan,
								'isi' 	 			=> 'konsultant/pekerjaan/edit');
			$this->load->view('layouts/wrapper', $data, FALSE);
			}else{
			$i = $this->input;
			$data = array ( 	'id_projek'		=>	$i->post('id_projek'),
								'list_tugas'	=>	$i->post('list_tugas'),
								'durasi'		=>  $i->post('durasi')

							);
			$this->M_pekerjaan->tambah($data);
			$this->session->set_flashdata('sukses', 'Pekerjaan telah ditambah');
			redirect(base_url('index.php/konsultan/pekerjaan/detail/'.$id), 'refresh');
		}
		}

}

 ?>