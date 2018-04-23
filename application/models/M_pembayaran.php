<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//tambah
	public function tambah($data)
	{
		$this->db->insert('pembayaran', $data);
	}
	//list pembayaran
	public function listing()
	{
		$this->db->select(	'pembayaran.*,
							klien.nama,
							klien.telepon,
							klien.alamat,
							klien.kode_pos, 
							klien.kabupaten,
							klien.provinsi,
							projek.nama_projek'
							);
		$this->db->from('pembayaran');
		$this->db->join('klien','klien.id_klien = pembayaran.id_klien','LEFT');
		$this->db->join('projek','projek.id_projek = pembayaran.id_projek','LEFT');
		$this->db->order_by('id_pembayaran', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
	//detail memanggil pembayaran per id
	public function detail($id_pembayaran)
	{
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->where('id_pembayaran', $id_pembayaran);
		$this->db->order_by('id_pembayaran', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//edit
	public function edit($data){
		$this->db->where('id_pembayaran', $data['id_pembayaran']);
		$this->db->update('pembayaran',$data);
	}
	//hapus
	public function delete($data){


		$this->db->where('id_pembayaran', $data['id_pembayaran']);
		$this->db->delete('pembayaran',$data);
	}

	function get_one($id_pembayaran)
    {
        $this->db->select(	'pembayaran.*,
							klien.nama,
							klien.telepon,
							klien.alamat,
							klien.kode_pos,
							klien.kabupaten,
							klien.provinsi,
							projek.nama_projek'
							);
		$this->db->from('pembayaran');
		$this->db->join('klien','klien.id_klien = pembayaran.id_klien','LEFT');
		$this->db->join('projek','projek.id_projek = pembayaran.id_projek','LEFT');
		$this->db->where('id_pembayaran', $id_pembayaran);
		$this->db->order_by('id_pembayaran', 'DESC');
		$query = $this->db->get();
		return $query->row();
    }

    public function listing1()
	{
		$this->db->select(	'*'
							);
		$this->db->from('pembayaran');
		$query = $this->db->get();
		return $query->row();
	}

}

 ?>