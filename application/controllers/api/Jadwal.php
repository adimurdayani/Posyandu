<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Jadwal extends BD_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_data');
    
  }

  public function index_get()
  {
    $id = $this->input->get('id');
    
    if ($id === null) {
      $datajadwal = $this->m_data->get_limit_jadwal();
    }else{
      $datajadwal = $this->m_data->get_id_jadwal($id);
    }

    if ($datajadwal) {
      $this->response([
          'status' => TRUE,
          'message' => 'sukses',
          'data' => $datajadwal
      ], REST_Controller::HTTP_OK);
    }else{
      $this->response([
          'status' => FALSE,
          'message' => 'data tidak ditemukan'
      ], REST_Controller::HTTP_BAD_REQUEST);
    }
  }

}

/* End of file Controllername.php */