<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model{

  public function getBuku()
  {  //cara lain
    //$q = "select * from buku"; // hanya membuat query saja tidak berpengaruh apa2
    //$query = $this->db->query($q)->result_array();

    $query = $this->db->get('buku')->result_array(); //
    return $query;
  }
  public function tambah_data($data)
  {
    $this->db->insert('buku', $data);
  }
  public function edit_data($data, $where)
  {
    $this->db->where($where);
    return $this->db->update('buku',$data);
  }
  public function getBukuId($id) //$id menampung dari controller Buku
  {
    $query = $this->db->get_where('buku', array('id_buku' => $id))->row_array();
    return $query;
  }
  //public function hapus_data($id)
  //{
  //  $this->db->delete('buku',array('id_buku'=> $id));
  //}
  public function hapus_data($where)
  {
    $this->db->where($where);
    $this->db->delete('buku');
  }
  public function search($keyword)
  { //cara 1
    // $query = $this->db->query('SELECT * FROM buku WHERE judul LIKE "%'.$keyword.'%"'.
    //                                                 'OR penulis LIKE "%'.$keyword.'%"'.
    //                                                 'OR tahun_terbit LIKE "%'.$keyword.'%"')->result_array();

    // $this->db_get('buku');
    $this->db->like('judul', $keyword);
    $this->db->or_like('penulis', $keyword);
    $this->db->or_like('tahun_terbit', $keyword);

    $query = $this->db->get('buku')->result_array();
    return $query;
  }
  public function getBukuById($where)
  {
    $this->db->join('genre','buku.id_genre = genre.id_genre', 'left');

    $query = $this->db->get_where('buku', $where)->row_array();
    return $query;
  }
  public function getGenre()
  {
    $query = $this->db->get('genre')->result_array();
    return $query;
  }
}

 ?>
