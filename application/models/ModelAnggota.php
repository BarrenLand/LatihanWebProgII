<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAnggota extends CI_Model {


	public function getAll()
	{
		return $this->db->get('tbl_anggota');
	}

	public function simpanAnggota($data = null)
	{
		$this->db->insert('tbl_anggota',$data);
	}	

	public function autoNumber($where = null)
	{
		$this->db->select("no_anggota");
		$this->db->from("tbl_anggota");
		$this->db->where($where);
		$this->db->order_by("no_anggota","desc");
		$this->db->limit(1);
		$query = $this->db->get();
		return $query;

	}	

	public function hapusAnggota($where = null)
	{
		$this->db->delete('tbl_anggota',$where);
	}
	
	public function getWhere($where = null)
	{
		return $this->db->get_where('tbl_anggota',$where);
	}

	public function updateAnggota($data = null, $where = null)
	{
		return $this->db->update('tbl_anggota',$data ,$where);
	}
   
}
