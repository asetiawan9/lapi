<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_klien extends CI_Model
{
 
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('klien', $data);
	}
	//list klien
	public function listing() 
	{
		$this->db->select('*');
		$this->db->from('klien');
		$this->db->order_by('id_klien', 'DESC');
		$query = $this->db->get();
		return $query->result();
	} 

	//edit
	public function edit($data){
		$this->db->where('id_klien', $data['id_klien']);
		$this->db->update('klien',$data);
	}
	//hapus
	public function delete($data){
		$this->db->where('id_klien', $data['id_klien']);
		$this->db->delete('klien',$data);
	}


	function get_one($id_klien)
    {
        $this->db->select('*');
		$this->db->from('klien');
		$this->db->where('id_klien', $id_klien);
		$this->db->order_by('id_klien', 'DESC');
		$query = $this->db->get();
		return $query->row();
    }


}

 ?>