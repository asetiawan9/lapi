<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pekerjaan extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('pekerjaan', $data);
	}
	//list pekerjaan
	public function listing()
	{
		$this->db->select(	'pekerjaan.*,
							projek.nama_projek,'
							);
		$this->db->from('pekerjaan');
		$this->db->join('projek','projek.id_projek = pekerjaan.id_projek','LEFT');
		$this->db->order_by('id_pekerjaan', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
	//detail memanggil pekerjaan per id
	public function detail($id_pekerjaan)
	{
		$this->db->select('*');
		$this->db->from('pekerjaan');
		$this->db->where('id_pekerjaan', $id_pekerjaan);
		$this->db->order_by('id_pekerjaan', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function detail1($id_projek)
	{
		$this->db->select('*');
		$this->db->from('pekerjaan');
		$this->db->where('id_projek', $id_projek);
		$this->db->order_by('id_projek', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//edit
	public function edit($data){
		$this->db->where('id_pekerjaan', $data['id_pekerjaan']);
		$this->db->update('pekerjaan',$data);
	}
	//hapus
	public function delete($data){


		$this->db->where('id_pekerjaan', $data['id_pekerjaan']);
		$this->db->delete('pekerjaan',$data);
	}

	function get_one($id_projek)
    {
        $this->db->select('*');
		$this->db->from('pekerjaan');
		$this->db->where('id_projek', $id_projek);
		$this->db->order_by('id_projek', 'DESC');
		$query = $this->db->get();
		return $query->result();
    }

    public function getKomen()
	{
		$this->db->select(	'komentar.*,
							pekerjaan.list_tugas,'
							);
		$this->db->from('komentar');
		$this->db->join('pekerjaan','pekerjaan.id_pekerjaan = komentar.id_pekerjaan','LEFT');
		$this->db->order_by('id_komentar', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function komentar($id_projek)
	{
		$this->db->select(	'*' );
		$this->db->from('pekerjaan');
		$this->db->where('id_projek', $id_projek);
		$this->db->order_by('id_projek', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

}

 ?>