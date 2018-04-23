<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('user', $data);
	}
	//list user
	public function listing() 
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id_user', 'DESC');
		$query = $this->db->get();
		return $query->result();
	} 

	//edit
	public function edit($data){
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user',$data);
	}
	//hapus
	public function delete($data){
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('user',$data);
	}


	function get_one($id_user)
    {
        $this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		$this->db->order_by('id_user', 'DESC');
		$query = $this->db->get();
		return $query->row();
    }

    public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array(	'username'	=> $username,
								'password'	=> sha1($password)));
		$this->db->order_by('id_user', 'DESC');
		$query = $this->db->get(); 
		return $query->row();
	}


}

 ?>