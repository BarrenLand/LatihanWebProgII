<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelEditPass extends CI_Model {


	public function getAll()
	{
		return $this->db->get('tbl_pustakawan');
	}

	public function getWhere($where = null)
	{
		return $this->db->get_where('tbl_pustakawan', $where);
	}

	public function simpanPass($data = null)
	{
		$this->db->insert('tbl_pustakawan',$data);
	}	

	public function getPassword($where = null)
	{
		$this->db->select('passw_pustakawan');
		$this->db->from('tbl_pustakawan');
		$this->db->where($where);
		return $this->db->get();
	}
    
	public function updatePassword($data = null, $where = null)
	{
		$this->db->set('passw_pustakawan', $data);
		$this->db->where($where);
		return $this->db->update('tbl_pustakawan');
	}
   
}
