<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_role extends CI_Model {

  public function get_all()
  {
    return $this->db->get('user_role')->result_array();
  }

  public function get_kelurahan()
  {
    return $this->db->get('kelurahan')->result_array();
  }


}

/* End of file M_role.php */