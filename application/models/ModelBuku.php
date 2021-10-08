<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBuku extends CI_Model
{
    public function getWhere($where=null)
    {
        return $this->db->get_where('tbl_buku', $where);
    }
    public function simpanBuku($data=null)
    {
        $this->db->insert('tbl_buku', $data);
    }
    public function autoNumber($where=null)
    {
        $this->db->select('kode_buku');
        $this->db->from('tbl_buku');
        $this->db->where($where);
        $this->db->order_by('kode_buku', 'desc');
        $this->db->limit(1);
        $query=$this->db->get();
        return $query;
    }
    public function joinKategori()
    {
        $this->db->select('*');
        $this->db->from('tbl_buku');
        $this->db->join('tbl_kategori_buku', 'tbl_kategori_buku.id_kategori_buku = tbl_buku.id_kategori_buku');
        $query=$this->db->get();
        return $query;
    }
    public function hapusBuku($where=null)
    {
        $this->db->delete('tbl_buku', $where);
    }
    public function updateBuku($data=null, $where=null)
    {
        $this->db->update('tbl_buku', $data, $where);
    }
}