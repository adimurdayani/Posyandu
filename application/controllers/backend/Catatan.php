<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catatan extends CI_Controller {

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
    $data['judul'] = 'Data Catatan Ibu Hamil';
    $data['get_catatan'] = $this->m_data->get_all_catatan();
    $data['get_noregis'] = $this->db->get('tb_ibu')->result_array();
    $data['ses_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $id_regis = $this->input->post('register_id');
    
    $this->form_validation->set_rules('register_id', 'nomor registrasi', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/head', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/catatan/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {
      # code...
      $data = [
        'register_id' => $this->input->post('register_id'),        
        'keluhan' => $this->input->post('keluhan'),
        'tekanan_darah' =>$this->input->post('tekanan_darah'),
        'berat_badan' =>$this->input->post('berat_badan'),
        'umur_kehamilan' =>$this->input->post('umur_kehamilan'),
        'tinggi_fundus' =>$this->input->post('tinggi_fundus'),
        'letak_janin'=>$this->input->post('letak_janin'),
        'denyut'=>$this->input->post('denyut'),
        'kaki_bengkak'=>$this->input->post('kaki_bengkak'),
        'hasil_pemeriksaan'=>$this->input->post('hasil_pemeriksaan'),
        'tindakan'=>$this->input->post('tindakan'),
        'nasihat'=> $this->input->post('nasihat'),
        'keterangan'=>$this->input->post('keterangan'),
        'tgl'=>date("d Y M H:i:s")
      ];
      $this->db->insert('catatan_ibu', $data);
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil tersimpan!
        </div>'
      );      
      $this->sendMessage($id_regis);
      redirect('backend/catatan');
    }
    
  }

  public function edit()
  {
    $data['judul'] = 'Data Catatan Ibu Hamil';
    $data['get_catatan'] = $this->m_data->get_all_catatan();
    $data['get_register'] = $this->db->get('tb_register')->result_array();
    $data['ses_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $id_regis = $this->input->post('register_id');
    
    $this->form_validation->set_rules('register_id', 'nomor registrasi', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/head', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/catatan/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {
      # code...
      $id = $this->input->post('id');
      
      $data = [
        'register_id' => $this->input->post('register_id'),        
        'keluhan' => $this->input->post('keluhan'),
        'tekanan_darah' =>$this->input->post('tekanan_darah'),
        'berat_badan' =>$this->input->post('berat_badan'),
        'umur_kehamilan' =>$this->input->post('umur_kehamilan'),
        'tinggi_fundus' =>$this->input->post('tinggi_fundus'),
        'letak_janin'=>$this->input->post('letak_janin'),
        'denyut'=>$this->input->post('denyut'),
        'kaki_bengkak'=>$this->input->post('kaki_bengkak'),
        'hasil_pemeriksaan'=>$this->input->post('hasil_pemeriksaan'),
        'tindakan'=>$this->input->post('tindakan'),
        'nasihat'=> $this->input->post('nasihat'),
        'keterangan'=>$this->input->post('keterangan'),
        'tgl'=>date("d Y M H:i:s")
      ];
      $this->db->where('id', $id);
      
      $this->db->update('catatan_ibu', $data);
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil terupdate!
        </div>'
      );
      $this->sendMessage($id_regis);
      redirect('backend/catatan');
      
    }
  }

  public function hapus($id)
  {
    $this->db->delete('catatan_ibu', ['id' => $id]);
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil terhapus!
        </div>'
      );
      redirect('backend/catatan');
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
                        "title": "Catatan Baru",
                        "body": "Update Catatan kesehatan ibu hamil, silahkan lihat catatan anda!"
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
    redirect('backend/catatan');

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      // response ketika data berhasil disimpan
    }
  }

}

/* End of file Catatan.php */