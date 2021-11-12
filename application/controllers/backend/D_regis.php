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
        'aktivasi' => 1,
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

}

/* End of file D_regis.php */