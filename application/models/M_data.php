<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {


  public function get_all_regis()
  {
    $query = "SELECT `tb_register`.*, `user_role`.`nama_role`
              FROM `tb_register`
              JOIN `user_role` ON `tb_register`.`user_id` = `user_role`.`id`
              ORDER BY `tb_register`.`id` DESC
            ";
    return $this->db->query($query)->result_array();
  }

  public function get_all_ibu()
  {
    $query = "SELECT `tb_ibu`.*
              FROM `tb_ibu`
              JOIN `tb_register` ON `tb_ibu`.`regis_id` = `tb_register`.`id`
              ORDER BY `tb_ibu`.`id` DESC
            ";
    return $this->db->query($query)->result_array();
  }

  public function get_all_ibu_id($id)
  {
    $query = "SELECT `tb_ibu`.*
              FROM `tb_ibu`
              JOIN `tb_register` ON `tb_ibu`.`regis_id` = `tb_register`.`id`
              WHERE `tb_ibu`.`id` = $id
            ";
    return $this->db->query($query)->row_array();
  }

  public function get_all_catatan()
  { 
    $query = "SELECT `catatan_ibu`.*, `tb_ibu`.`no_regis`
              FROM `catatan_ibu`
              JOIN `tb_ibu` ON `catatan_ibu`.`register_id` = `tb_ibu`.`id`
              ORDER BY `catatan_ibu`.`id` DESC
            ";
    return $this->db->query($query)->result_array();
  }

  public function no_regis()
  {
    $query = $this->db->query("SELECT MAX(no_regis) as noregis FROM tb_ibu");
    $hasil = $query->row();
    return $hasil->noregis;
  }

  public function get_limit_jadwal()
  {
    $this->db->select('*');
    $this->db->from('jadwal');
    $this->db->join('kelurahan', 'jadwal.kelurahan_id = kelurahan.id', 'left');
    $this->db->limit(5);
    $this->db->order_by('jadwal.id', 'desc');
    return  $this->db->get()->result_array();    
  }

  public function get_id_jadwal($id)
  {
    $query = "SELECT `jadwal`.*, `kelurahan`.`kelurahan`
              FROM `jadwal`
              JOIN `kelurahan` ON `jadwal`.`kelurahan_id` = `kelurahan`.`id`
              WHERE `jadwal`.`id` = $id
              ORDER BY `jadwal`.`id` DESC
            ";
    return $this->db->query($query)->row_array();
  }

  public function get_all_jadwal()
  {
    $query = "SELECT `jadwal`.*, `kelurahan`.`kelurahan`
              FROM `jadwal`
              JOIN `kelurahan` ON `jadwal`.`kelurahan_id` = `kelurahan`.`id`
              ORDER BY `jadwal`.`id` DESC
            ";
    return $this->db->query($query)->result_array();
  }

}

/* End of file M_data.php */