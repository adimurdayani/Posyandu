<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_user');
    if (!$this->session->userdata('username')) {
      redirect('login');
    }
  }
  

  public function index()
  {
    $data['judul'] = 'Data User';
    $data['get_user'] = $this->m_user->get_all();
    $data['get_role'] = $this->m_user->get_role();
    $data['ses_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[user.username]');
    $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[user.email]|valid_email');
    $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
    $this->form_validation->set_rules('conf_pass', 'konfirmasi password', 'trim|required|min_length[6]|matches[password]');
    
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/head', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/data_user/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);

    } else {
      # code...
      $data = [
        'user_id' => htmlspecialchars($this->input->post('user_id', true)),
        'nama' => htmlspecialchars($this->input->post('nama',true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'username' => htmlspecialchars($this->input->post('username',true)),
        'password' => sha1($this->input->post('password')),
        'user_active' => 0,
        
      ];
      $this->db->insert('user', $data);
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil tersimpan!
        </div>'
      );
      redirect('backend/user');
    }

  }

  public function edit()
  {
    $data['judul'] = 'Data User';
    $data['get_user'] = $this->m_user->get_all();
    $data['get_role'] = $this->m_user->get_role();
    $data['ses_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    $this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[user.username]');
    $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[user.email]|valid_email');
    $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
    $this->form_validation->set_rules('conf_pass', 'konfirmasi password', 'trim|required|min_length[6]|matches[password]');
    
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/head', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/data_user/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);

    } else {
      # code...
      $id = $this->input->post('id');
      
      $data = [
        'user_id' => htmlspecialchars($this->input->post('user_id', true)),
        'nama' => htmlspecialchars($this->input->post('nama',true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'username' => htmlspecialchars($this->input->post('username',true)),
        'password' => sha1($this->input->post('password')),
        'user_active' => htmlspecialchars($this->input->post('user_active',true))
      ];
      
      $this->db->where('id', $id);
      $this->db->update('user', $data);
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil diubah!
        </div>'
      );
      redirect('login');
    }

  }

  public function hapus($id)
  {
    $this->db->delete('user', ['id' => $id]);
    $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil dihapus!
        </div>'
      );
      redirect('backend/user');
  }

}

/* End of file User.php */