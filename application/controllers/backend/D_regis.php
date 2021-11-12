<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_regis extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_data');
    
    if (!$this->session->userdata('username')) {
      redirect('login');
    }
  }

  public function index()
  {
    $data['judul'] = 'Data Register User';
    $data['get_regis'] = $this->m_data->get_all_regis();
    $data['ses_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    
    $this->load->view('backend/layouts/head', $data, FALSE);
    $this->load->view('backend/layouts/topbar', $data, FALSE);
    $this->load->view('backend/layouts/sidebar', $data, FALSE);
    $this->load->view('backend/data_regis/index', $data, FALSE);
    $this->load->view('backend/layouts/footer', $data, FALSE);
  }

  public function edit()
  {
    $data['judul'] = 'Data Register User';
    $data['get_regis'] = $this->m_data->get_all_regis();
    $data['ses_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    
    $this->form_validation->set_rules('aktivasi', 'aktivasi', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/head', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/data_regis/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {
      # code...
      $id = $this->input->post('id');
      
      $data = [
        'aktivasi' => $this->input->post('aktivasi'),
        'created_at' => date("d M Y")
      ];

      $this->db->where('id', $id);
      $this->db->update('tb_register', $data);
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil terupdate!
        </div>'
      );
      $this->sendMessage($id);
      redirect('backend/d_regis');
      
    }   
  }

  public function hapus($id)
  {
    $this->db->delete('tb_register',['id' => $id]);
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil terhapus!
        </div>'
      );
      redirect('backend/d_regis');
  }
  
  public function sendMessage($id_register)
  {
    $gettoken = $this->db->get_where('tb_register', ['id' => $id_register])->row();

    $getAll = '["'.$gettoken->token_id.'"]';

    $curl = curl_init();
    $authKey = "key=AAAADoaZyKw:APA91bFSFWZPy2h7PFxpt3C_4T2cvCVYEQjObdz80-vnOTYtaebjqcBKB-aBwwNzIfJ1eUBjqt0DI9OyhZ7Rb13V9A2sXgS5JysKlpeEywY1UYgV5vRXSHL7ZZB4mW_xOU1GiD3jJBQW";
    $registration_ids =  $getAll;
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => '{
                    "registration_ids": ' . $registration_ids . ',
                    "notification": {
                        "title": "Register sukses",
                        "body": "Anda telah berhasil membuat akun!"
                    }
                  }',
      CURLOPT_HTTPHEADER => array(
        "Authorization: " . $authKey,
        "Content-Type: application/json",
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    redirect('backend/d_regis');

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      // response ketika data berhasil disimpan
    }
  }

}

/* End of file D_regis.php */