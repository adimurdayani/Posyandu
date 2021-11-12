<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

  public function get_all()
  {
    $query = "SELECT `user`.*, `user_role`.`nama_role`
              FROM `user`
              JOIN `user_role` ON `user`.`user_id` = `user_role`.`id`
              WHERE `user`.`id` != 1
            ";
    return $this->db->query($query)->result_array();
  }

  public function get_role()
  {
    return $this->db->get('user_role')->result_array();
  }

  public function get_username($username)
  {
    return $this->db->get_where('tb_register', $username);
  }

}

/* End of file M_user.php */