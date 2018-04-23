<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_projek extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('projek', $data);
	}
	//list projek
	public function listing()
	{
		$this->db->select(	'projek.*,
							klien.nama,
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
	public function detail($id_projek)
	{
		$this->db->select('*');
		$this->db->from('projek');
		$this->db->where('id_projek', $id_projek);
		$this->db->order_by('id_projek', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//edit
	public function edit($data){
		$this->db->where('id_projek', $data['id_projek']);
		$this->db->update('projek',$data);
	}
	//hapus
	public function delete($data){
		$this->db->where('id_projek', $data['id_projek']);
		$this->db->delete('projek',$data);
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

}

 ?>