<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
	}
	
	public function index()
	{

		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('username', 'Username','required',
			array( 'required' 	=> 'Username harus diisi'));

		$valid->set_rules('password', 'Password','required',
			array( 'required' 	=> 'Password harus diisi'));
		
		if($valid->run()=== FALSE){
		//end validasi

		$data = array( 'tittle' => 'Login Administrator');
		$this->load->view('internal/login', $data, FALSE);
		//cek username dan password compare dengan database
		}else{
			$i 			= $this->input; 
			$username 	= $i->post('username');
			$password 	= $i->post('password');
			// check di dataase
			$checklogin	= 	$this->M_user->login($username, $password); 
			$level = $this->M_user->listing();
			//kalo ada record, maka create sesion dan redirect ke halaman dasboard
			if(count($checklogin)==1){
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('akses_level', $checklogin->akses_level);
				$this->session->set_userdata('id_user', $checklogin->id_user);
				$this->session->set_userdata('nama_user', $checklogin->nama_user);

				if ($checklogin->akses_level == 'konsultant') {
					redirect(base_url('index.php/konsultan/dashboard'),'refresh');
				}else{
				redirect(base_url('index.php/internal/dashboard'),'refresh');
				}
			}
			else{
				//kalau username dan password tidak cocok
				$this->session->set_flashdata('sukses', 'Username atau password tidak cocok');
				redirect(base_url('index.php/Login'), 'refresh');
					
			}
			//end checking
		}
	}
	public function logout(){
			$this->session->unset_userdata('username');
				$this->session->unset_userdata('akses_level');
				$this->session->unset_userdata('id_user');
				$this->session->unset_userdata('nama_user');
				$this->session->set_flashdata('sukses', 'Anda berhasil Logout');
				redirect(base_url('index.php/login'),'refresh');
	}

}