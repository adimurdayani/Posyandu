<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  
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
    $data['judul'] = 'Dashboard';
    $data['jumlah_catatan'] = $this->db->get('catatan_ibu')->num_rows();
    $data['jumlah_kelurahan'] = $this->db->get('kelurahan')->num_rows();
    $data['jumlah_register'] = $this->db->get('tb_register')->num_rows();
    $data['get_regis'] = $this->m_data->get_all_regis();
    $data['jumlah_ibu'] = $this->db->get('tb_ibu')->num_rows();
    $data['ses_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $this->load->view('backend/layouts/head', $data, FALSE);
    $this->load->view('backend/layouts/topbar', $data, FALSE);
    $this->load->view('backend/layouts/sidebar', $data, FALSE);
    $this->load->view('backend/dashboard', $data, FALSE);
    $this->load->view('backend/layouts/footer', $data, FALSE);
    
  }

}

/* End of file Dashboard.php */