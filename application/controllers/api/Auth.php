<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Auth extends BD_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_user');
  }
  

  public function register_post()
  {

    $this->form_validation->set_rules('username', 'username', 'trim|required');
    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[user.email]');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      if(validation_errors() == true){
        #response error
        $this->response([
          'status' => false,
          'message' => 'Ada data yang sudah digunakan'
        ], REST_Controller::HTTP_BAD_REQUEST);
      }

    } else {
      # inisialisasi data yang akan di tambah
      $data = [
        'user_id' => 2,
        'aktivasi' => 0,
        'nama' => htmlspecialchars($this->post('nama', true)),
        'username' => htmlspecialchars($this->post('username', true)),
        'email' => htmlspecialchars($this->post('email', true)),
        'password' => sha1($this->post('password')),
        'created_at' => date("d M Y H:i:s"),
        'token_id' => $this->post('token_id')
        
      ];

      $save_data = $this->db->insert('tb_register', $data);

      if ($save_data == 0) {
        # response ketika data gagal di simpan
        $this->response([
          'status' => false,
          'message' => 'Data gagal di simpan'
        ], REST_Controller::HTTP_NOT_FOUND);

      }else{

        $this->response([
          'status' => true,
          'message' => 'Data berhasil di simpan!',
          'data' => $data
        ], REST_Controller::HTTP_OK);

      }
    }
    
  }

  public function login_post()
  {
    $username = $this->post('username');
    $password = sha1($this->post('password'));
    $user_array = array('username' => $username);

    $kunci = $this->config->item('thekey');

    $val = $this->m_user->get_username($user_array)->row();

    if ($this->m_user->get_username($user_array)->num_rows() == 0) {
      # response error

      $this->response([
        'status' => false,
        'message' => 'Username tidak ditemukan'
      ], REST_Controller::HTTP_NOT_FOUND);

    }

    $match = $val->password;
  
    if ($password == $match) {
      # config
      $token['id'] = $val->id; //di lihat dari id users
      $token['username'] = $username;

      $date = new DateTime();
      $token['iat'] = $date->getTimestamp();
      $token['exp'] = $date->getTimestamp() + 60*60*5; //fungsi untuk generate token

      $output = JWT::encode($token, $kunci); //hasil dari generate token akan di tampilan di respon 200

      #response jika login berhasil
      $this->response([
        'status' => true,
        'token' => $output,
        'message' => 'Login sukses',
        'data' => $val
      ], REST_Controller::HTTP_OK);

    }else {
      # response jika gagal login

      $this->response([
        'status' => false,
        'message' => 'Login gagal'
      ], REST_Controller::HTTP_BAD_REQUEST);

    }
  }

  public function logout_get()
  {
    # proses logout aplikasi android

    $this->session->sess_destroy();
      
    $this->response([
      "status" => true,
      "message"=> "logout sukses"
    ], REST_Controller::HTTP_OK);
  }

}

/* End of file Controllername.php */