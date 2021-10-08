<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAdmin extends CI_Model {

	public function cekLoginAdmin($where=null)
	{
		$this->db->select('*');
        $this->db->from('tbl_pustakawan');
        $this->db->where($where);
        return $this->db->get();
	}

    public function getWhere($where=null)
	{
		return $this->db->get_where('tbl_pustakawan', $where);
	}
	public function getAll()
	{
		return $this->db->get('tbl_pustakawan');
	}
	public function simpanAdmin($data=null)
	{
		$this->db->insert('tbl_pustakawan', $data);
	}
	public function autoNumber($where=null)
	{
		$this->db->select('id_pustakawan');
		$this->db->from('tbl_pustakawan');
		$this->db->oreder_by('id_pustakawan','desc');
		$this->db->limit(1);
		$query=$this->db->get();
		return $query;
	}
	public function hapusAdmin($where=null)
	{
		$this->db->delete('tbl_pustakawan', $where);
	}
	public function updateAdmin($where=null, $data=null)
	{
		$this->db->update('tbl_pustakawan', $where, $data);
	}
}
