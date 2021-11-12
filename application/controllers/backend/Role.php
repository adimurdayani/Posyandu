<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_role');
    if (!$this->session->userdata('username')) {
      redirect('login');
    }
  }
  

  public function index()
  {
    $data['judul'] = 'Data Role';
    $data['get_role'] = $this->m_role->get_all();
    $data['ses_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama_role', 'nama role', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/head', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/data_role/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {
      # code...
      $data = [
        'nama_role' => $this->input->post('nama_role')
      ];
      $this->db->insert('user_role', $data);
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil tersimpan!
        </div>'
      );
      redirect('backend/role');
    }
    
  }

  public function edit()
  {
    $data['judul'] = 'Data Role';
    $data['get_role'] = $this->m_role->get_all();
    $data['ses_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama_role', 'nama role', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/head', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/data_role/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {
      # code...
      $id = $this->input->post('id');
      
      $data = [
        'nama_role' => $this->input->post('nama_role')
      ];
      $this->db->where('id', $id);
      $this->db->update('user_role', $data);
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil diubah!
        </div>'
      );
      redirect('backend/role');
    }
    
  }

  public function hapus($id)
  {
    $this->db->delete('user_role', ['id' => $id]);
    $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil dihapus!
        </div>'
      );
      redirect('backend/role');
  }

}

/* End of file Role.php */