<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

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
    $data['judul'] = 'Jadwal Imunisasi';
    $data['get_jadwal'] = $this->m_data->get_all_jadwal();
    $data['get_kelurahan'] = $this->db->get('kelurahan')->result_array();
    $data['ses_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('kelurahan_id', 'kelurahan', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/head', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/jadwal/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {
      # code...
      $data = [
        'kelurahan_id' => $this->input->post('kelurahan_id'),
        'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
        'keterangan' => $this->input->post('keterangan'),
        'waktu_kegiatan' => $this->input->post('waktu_kegiatan')
        
      ];
      $this->db->insert('jadwal', $data);
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil tersimpan!
        </div>'
      );
      redirect('backend/jadwal');
      
    }
  }

  public function edit()
  {
    $data['judul'] = 'Jadwal Imunisasi';
    $data['get_jadwal'] = $this->m_data->get_all_jadwal();
    $data['get_kelurahan'] = $this->db->get('kelurahan')->result_array();
    $data['ses_user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('kelurahan_id', 'kelurahan', 'trim|required');
    
    if ($this->form_validation->run() == FALSE) {
      # code...
      $this->load->view('backend/layouts/head', $data, FALSE);
      $this->load->view('backend/layouts/topbar', $data, FALSE);
      $this->load->view('backend/layouts/sidebar', $data, FALSE);
      $this->load->view('backend/jadwal/index', $data, FALSE);
      $this->load->view('backend/layouts/footer', $data, FALSE);
    } else {
      # code...
      $id = $this->input->post('id');
      
      $data = [
        'kelurahan_id' => $this->input->post('kelurahan_id'),
        'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
        'keterangan' => $this->input->post('keterangan'),
        'waktu_kegiatan' => $this->input->post('waktu_kegiatan')
        
      ];
      $this->db->where('id', $id);
      
      $this->db->update('jadwal', $data);
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil terupdate!
        </div>'
      );
      redirect('backend/jadwal');
      
    }
  }

  public function hapus($id)
  {
    $this->db->delete('jadwal', ['id' => $id]);
      $this->session->set_flashdata(
        'message', 
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          Data berhasil terhapus!
        </div>'
      );
      redirect('backend/jadwal');
  }

}

/* End of file Jadwal.php */