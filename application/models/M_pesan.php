<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesan extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('pesan', $data);
	}
	//list projek
	public function listing()
	{
		$this->db->select(	'projek.*,
							user.nama_user'
							);
		$this->db->from('projek');
		$this->db->join('user','user.id_user = projek.id_user','LEFT');
		$this->db->join('klien','klien.id_klien = projek.id_klien','LEFT');
		$this->db->order_by('id_projek', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
	//detail memanggil projek per id
	public function detail($id_pesan)
	{
		$this->db->select(	'pesan.*,
							user.nama_user'
							);
		$this->db->from('pesan');
		$this->db->join('user','user.id_user = pesan.id_user','LEFT');
		$this->db->where('pesan.id_pesan', $id_pesan);
		$this->db->order_by('id_pesan', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	
	//hapus
	public function delete($id_pesan){
		$this->db->where('id_pesan', $id_pesan);
		$this->db->delete('pesan');
	}

		function get_one($id_projek)
    {
        $this->db->select(	'projek.*,
							user.nama_user'
							);
		$this->db->from('projek');
		$this->db->join('user','user.id_user = projek.id_user','LEFT');
		$this->db->where('id_projek', $id_projek);
		$this->db->order_by('id_projek', 'DESC');
		$query = $this->db->get();
		return $query->row();
    }

    function pekerjaan($id_projek)
    {
        $this->db->select('*');
		$this->db->from('pekerjaan');
		$this->db->where('id_projek', $id_projek);
		$this->db->order_by('id_projek', 'DESC');
		$query = $this->db->get();
		return $query->result();
    }
    
		function getPesan($id_user)
    {
        $this->db->select(	'pesan.*,
							user.nama_user'
							);
		$this->db->from('pesan');
		$this->db->join('user','user.id_user = pesan.id_user','LEFT');
		$this->db->where('pesan.id_user', $id_user);
		$this->db->order_by('id_user', 'DESC');
		$query = $this->db->get();
		return $query->result();
    }

    public function getHiji($id_user)
	{
		$this->db->select('*');
		$this->db->from('pesan');
		$this->db->where('id_user', $id_user);
		$this->db->order_by('id_user', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	

	function sent($id_user)
    {
        $this->db->select(	'pesan.*,
							user.nama_user'
							);
		$this->db->from('pesan');
		$this->db->join('user','user.id_user = pesan.id_user','LEFT');
		$this->db->where('pesan.id_pengirim', $id_user);
		$this->db->order_by('id_user', 'DESC');
		$query = $this->db->get();
		return $query->result();
    }

    public function belumDibaca()
    {

    	$id_konsultan = $this->session->userdata('id_user');

		static $query;

		$statement = "
		SELECT pesan.sub, pesan.id_pesan, pesan.isi_pesan, pesan.tanggal, (SELECT user.nama_user FROM user WHERE pesan.id_pengirim = user.id_user LIMIT 1) as pengirim 
		FROM pesan WHERE pesan.id_user = $id_konsultan
		AND pesan.dibaca = 'N'
		AND id_pengirim IS NOT NULL
		AND id_user = $id_konsultan
		ORDER BY pesan.tanggal DESC
		";

		$this->db->select('*');
    	$this->db->where('dibaca', 'N');
		// $query = $this->db->get('pesan');
		$query = $this->db->query($statement);
 
		if($query->num_rows() > 0) return $query;
		else return FALSE;


    	// $this->db->select('*');
    	// $this->db->get('pesan');
    	// $query = $this->db->result();


    	// if ($query->num_rows() > 0) {
    	// 	return $query->result();
    	// } else {
    	// 	return FALSE;
    	// // }

    	// return $query;

    }

}

 ?>