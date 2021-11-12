<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

  public function index()
  {
    $data['judul'] = 'Profile';
    $data['ses_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]');
    $this->form_validation->set_rules('pass_konf', 'password konfirmasi', 'trim|required|min_length[5]|matches[password]');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/head', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/profile/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {
      # code...
      $id = $this->input->post('id');
      $data = [
        'nama' => htmlspecialchars($this->input->post('nama', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'username' => htmlspecialchars($this->input->post('username',  true)),
        'password' => sha1($this->input->post('password'))
      ];

      $this->db->where('id', $id);
      $this->db->update('user', $data);

      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil terupdate!
        </div>'
      );
      redirect('login');
      
    }
    
    
  }

}

/* End of file Profile.php */