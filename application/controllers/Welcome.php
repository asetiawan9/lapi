<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
}
