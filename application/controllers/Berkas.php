<?php

class Berkas extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('Berkas_Model', 'berkas');
  }

  public function index()
  {
    $data['dokumen'] = $this->berkas->load_files();
    $this->load->view('main/index', $data);
  }

  public function tambah_berkas()
  {
    $this->load->view('main/add');
  }

  public function hapus_berkas()
  {
    if ($this->berkas->delete_file($this->input->post('id'))) {
      $this->session->set_flashdata('pesan', "<div class='alert alert-success' role='alert'>File berhasil dihapus</div>");
      unlink($this->input->post('path'));
    } else {
      $this->session->set_flashdata('pesan', "<div class='alert alert-danger' role='alert'>File gagal dihapus</div>");
    }

    redirect('berkas');
  }

  public function store()
  {
    $config['upload_path'] = 'dokumen/';
    $config['allowed_types'] = 'xlsx|xls|pdf|txt|doc|docx|csv|ppt';

    $dokumen = array(
      'id' => '',
      'nama_dokumen' => $this->input->post('nama'),
      'path' => 'dokumen/',
      'tanggal_upload' => date('Y-m-d', time())
    );

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('berkas')) {
      $error = array('error' => $this->upload->display_errors());

      $this->load->view('main/add', $error);
    } else {
      $data = array('image_metadata' => $this->upload->data());

      if ($dokumen['nama_dokumen'] == "") $dokumen['nama_dokumen'] = $data['image_metadata']['file_name'];

      $dokumen['path'] = $dokumen['path'] . $data['image_metadata']['file_name'];

      $this->berkas->save_file($dokumen);

      redirect('berkas');
    }
  }
}
