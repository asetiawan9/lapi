<?php 


	


//gabungin halaman
require_once('head.php');
require_once('header.php');

if($this->session->userdata('akses_level')=="konsultant") {

	require_once('navkonsul.php');
}else{
	require_once('nav.php');
}
require_once('content.php');
require_once('footer.php');
 
 ?>