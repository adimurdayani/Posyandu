<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class User extends BD_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_user');
    
  }

  public function profil_post()
  {
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {

      $this->response([
          'status' => FALSE,
          'message' => validation_errors()
      ], REST_Controller::HTTP_BAD_REQUEST);

    } else {
      $id = $this->input->post('id');
      
      $data = [
        'nama' => htmlspecialchars($this->post('nama', true)),
        'username' => htmlspecialchars($this->post('username', true)),
        'email' => htmlspecialchars($this->post('email', true)),
        'created_at' => date("d M Y H:i:s")
      ];

      $this->db->where('id', $id);
      
      $this->db->update('tb_register', $data);

      if ($data) {
        $this->response([
            'status' => TRUE,
            'message' => 'data tersimpan',
            'data' => $data
        ], REST_Controller::HTTP_OK);
      }else{
        $this->response([
            'status' => FALSE,
            'message' => 'data gagal tersimpan'
        ], REST_Controller::HTTP_BAD_REQUEST);
      }
    }
  }

  public function password_post()
  {
    $this->form_validation->set_rules('password', 'password', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {

      $this->response([
          'status' => FALSE,
          'message' => validation_errors()
      ], REST_Controller::HTTP_BAD_REQUEST);

    } else {
      $id = $this->input->post('id');
      
      $data = [
        'password' => sha1($this->post('password')),
        'created_at' => date("d M Y H:i:s")
      ];

      $this->db->where('id', $id);
      
      $this->db->update('tb_register', $data);

      if ($data) {
        $this->response([
            'status' => TRUE,
            'message' => 'data tersimpan',
            'data' => $data
        ], REST_Controller::HTTP_OK);
      }else{
        $this->response([
            'status' => FALSE,
            'message' => 'data gagal tersimpan'
        ], REST_Controller::HTTP_BAD_REQUEST);
      }
    }
  }

}

/* End of file User.php */