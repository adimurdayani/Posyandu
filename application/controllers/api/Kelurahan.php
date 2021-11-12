<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Kelurahan extends BD_Controller {

  public function index_get()
  {
    $id = $this->input->get('id');
    
    if ($id === null) {
      $dataibu = $this->db->get('kelurahan')->result_array();
    }else{
      $dataibu = $this->db->get_where('kelurahan', ['id' => $id])->row_array();
    }

    if ($dataibu) {
      $this->response([
          'status' => TRUE,
          'message' => 'sukses',
          'data' => $dataibu
      ], REST_Controller::HTTP_OK);
    }else{
      $this->response([
          'status' => FALSE,
          'message' => 'data tidak ditemukan'
      ], REST_Controller::HTTP_BAD_REQUEST);
    }
  }

}

/* End of file Kelurahan.php */