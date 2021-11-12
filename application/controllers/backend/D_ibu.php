<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class D_ibu extends CI_Controller {

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
    $getregis = $this->m_data->no_regis();
    $nourut = substr($getregis, 3, 4);
    $noregis = $nourut + 1;
    $data = array('no_regis' => $noregis);

    $data['judul'] = 'Data Keluarga';
    $data['get_ibu'] = $this->m_data->get_all_ibu();
    $data['get_register'] = $this->db->get('tb_register')->result_array();
    $data['ses_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('nama_ibu', 'nama istri', 'trim|required');
    $this->form_validation->set_rules('nama_suami', 'nama suami', 'trim|required');

    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/head', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/data_ibu_hamil/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {
      # code...
      $data = [
        'no_regis'=>$this->input->post('no_regis'),
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
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil tersimpan!
        </div>'
      );
      redirect('backend/d_ibu');
    }
    
  }

  public function detail($id)
  {
    $data['judul'] = 'Detail Data Keluarga';
    $data['get_ibu_id'] = $this->m_data->get_all_ibu_id($id);
    $data['ses_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    
    $this->load->view('backend/layouts/head', $data, FALSE);
    $this->load->view('backend/layouts/topbar', $data, FALSE);
    $this->load->view('backend/layouts/sidebar', $data, FALSE);
    $this->load->view('backend/data_ibu_hamil/detail', $data, FALSE);
    $this->load->view('backend/layouts/footer', $data, FALSE);
  }

  public function hapus($id)
  {
    $this->db->delete('tb_ibu', ['id' => $id]);
    $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil terhapus!
        </div>'
      );
      redirect('backend/d_ibu');
  }

}

/* End of file D_ibu_hamil.php */