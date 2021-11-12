<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Dataibu extends BD_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_user');
    $this->load->model('m_data');
    
  }

  public function index_get()
  {
    $id = $this->input->get('regis_id');
    
    if ($id === null) {
      $dataibu = $this->db->get('tb_ibu')->result_array();
    }else{
      $dataibu = $this->db->get_where('tb_ibu', ['regis_id' => $id])->row_array();
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

  public function index_post()
  {
    
    $getregis = $this->m_data->no_regis();
    $nourut = substr($getregis, 3, 4);
    $noregis = $nourut + 1;
    
    $this->form_validation->set_rules('regis_id', 'no register', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {

      $this->response([
          'status' => FALSE,
          'message' => validation_errors()
      ], REST_Controller::HTTP_BAD_REQUEST);
      
    } else {
      # code...

      $data = [
        'no_regis'=> "NR-".sprintf("%04s", $noregis)."|KIB",
        'nama_ibu'             =>  $this->input->post('nama_ibu'),
        'tgl_lahir'            =>$this->input->post('tgl_lahir'),
        't_lahir'         =>   $this->input->post('t_lahir'),
        'agama'           =>$this->input->post('agama'),
        'pendidikan'      => $this->input->post('pendidikan'),
        'gol_darah'            =>$this->input->post('gol_darah'),
        'pekerjaan'         =>$this->input->post('pekerjaan'),
        'nama_suami'      =>$this->input->post('nama_suami'),
        'tgl_lahir_suami'     =>$this->input->post('tgl_lahir_suami'),
        't_lahir_suami'     =>$this->input->post('t_lahir_suami'),
        'agama_suami'         =>$this->input->post('agama_suami'),
        'pendidikan_suami'     =>$this->input->post('pendidikan_suami'),
        'pekerjaan_suami'   =>$this->input->post('pekerjaan_suami'),
        'alamat'          =>$this->input->post('alamat'),
        'regis_id'          => $this->input->post('regis_id')
      ];

      $this->db->insert('tb_ibu', $data);

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

  public function edit_post()
  {
    
    $getregis = $this->m_data->no_regis();
    $nourut = substr($getregis, 3, 4);
    $noregis = $nourut + 1;
    
    $this->form_validation->set_rules('regis_id', 'no register', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {

      $this->response([
          'status' => FALSE,
          'message' => validation_errors()
      ], REST_Controller::HTTP_BAD_REQUEST);
      
    } else {
      # code...
      $id = $this->input->post('id');
      

      $data = [
        'no_regis'=> "NR-".sprintf("%04s", $noregis)."|KIB",
        'nama_ibu'             =>  $this->input->post('nama_ibu'),
        'tgl_lahir'            =>$this->input->post('tgl_lahir'),
        't_lahir'         =>   $this->input->post('t_lahir'),
        'agama'           =>$this->input->post('agama'),
        'pendidikan'      => $this->input->post('pendidikan'),
        'gol_darah'            =>$this->input->post('gol_darah'),
        'pekerjaan'         =>$this->input->post('pekerjaan'),
        'nama_suami'      =>$this->input->post('nama_suami'),
        'tgl_lahir_suami'     =>$this->input->post('tgl_lahir_suami'),
        't_lahir_suami'     =>$this->input->post('t_lahir_suami'),
        'agama_suami'         =>$this->input->post('agama_suami'),
        'pendidikan_suami'     =>$this->input->post('pendidikan_suami'),
        'pekerjaan_suami'   =>$this->input->post('pekerjaan_suami'),
        'alamat'          =>$this->input->post('alamat'),
        'regis_id'          => $this->input->post('regis_id')
      ];

      $this->db->where('id', $id);
      
      $this->db->update('tb_ibu', $data);

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