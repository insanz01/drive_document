<?php

class Berkas extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('Berkas_Model', 'berkas');

    // if (!$this->session->has_userdata('user_id')) {
    //   redirect('auth');
    // }
  }

  public function index()
  {
    $data['dokumen'] = $this->berkas->load_files();

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('template/topbar');
    $this->load->view('main/index', $data);
    $this->load->view('template/footer');
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

  public function daftar_akta()
  {
    $data['akta'] = $this->berkas->tampilkanAkta();

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('template/topbar');
    $this->load->view('main/daftar_akta', $data);
    $this->load->view('template/footer');
  }

  public function ubah_daftar_akta($id)
  {
    $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim');
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
    $this->form_validation->set_rules('sifat', 'Sifat', 'required');
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('nama_satu', 'Nama_Satu', 'required|trim');
    $this->form_validation->set_rules('nama_satu', 'Nama_Dua', 'required|trim');
    $this->form_validation->set_rules('nama_satu', 'Nama_Tiga', 'required|trim');

    if ($this->form_validation->run() == FALSE) {

      $data['isi'] = $this->berkas->tampilkanSatuAkta($id);
      $data['id'] = $id;

      $this->load->view('template/header');
      $this->load->view('template/sidebar');
      $this->load->view('template/topbar');
      $this->load->view('main/ubah/daftar_akta', $data);
      $this->load->view('template/footer');
    } else {
      $data = array(
        'id' => $id,
        'nomor' => $this->input->post('nomor'),
        'tanggal' => $this->input->post('tanggal'),
        'sifat' => $this->input->post('sifat'),
        'nama' => $this->input->post('nama'),
        'alamat' => $this->input->post('alamat'),
        'nama_satu' => $this->input->post('nama_satu'),
        'nama_dua' => $this->input->post('nama_dua'),
        'nama_tiga' => $this->input->post('nama_tiga')
      );

      if ($this->berkas->simpanPerubahanDaftarAkta($data)) {
        redirect('berkas');
      } else {
        redirect('berkas/ubah_daftar_akta');
      }
    }
  }

  public function hapus_akta($id)
  {
    if ($this->berkas->hapusAkta($id)) {
      $this->session->set_flashdata('<div class="alert alert-success" role="alert">Barang berhasil dihapus</div>');
    } else {
      $this->session->set_flashdata('<div class="alert alert-danger" role="alert">Barang gagal dihapus</div>');
    }

    redirect('berkas/daftar_akta');
  }

  public function tambah_daftar_akta()
  {
    $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim');
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
    $this->form_validation->set_rules('sifat', 'Sifat', 'required');
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('nama_satu', 'Nama_Satu', 'required|trim');
    $this->form_validation->set_rules('nama_satu', 'Nama_Dua', 'required|trim');
    $this->form_validation->set_rules('nama_satu', 'Nama_Tiga', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('template/header');
      $this->load->view('template/sidebar');
      $this->load->view('template/topbar');
      $this->load->view('main/tambah/daftar_akta');
      $this->load->view('template/footer');
    } else {
      $data = array(
        'nomor' => $this->input->post('nomor'),
        'tanggal' => $this->input->post('tanggal'),
        'sifat' => $this->input->post('sifat'),
        'nama' => $this->input->post('nama'),
        'alamat' => $this->input->post('alamat'),
        'nama_satu' => $this->input->post('nama_satu'),
        'nama_dua' => $this->input->post('nama_dua'),
        'nama_tiga' => $this->input->post('nama_tiga')
      );

      if ($this->berkas->simpanDaftarAkta($data)) {
        redirect('berkas');
      } else {
        redirect('berkas/tambah_daftar_akta');
      }
    }
  }

  public function buku_tamu()
  {
    $data['tamu'] = $this->berkas->tampilkanTamu();

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('template/topbar');
    $this->load->view('main/buku_tamu', $data);
    $this->load->view('template/footer');
  }

  public function hapus_buku_tamu($id)
  {
    if ($this->berkas->hapusBukuTamu($id)) {
      $this->session->set_flashdata('<div class="alert alert-success" role="alert">Barang berhasil dihapus</div>');
    } else {
      $this->session->set_flashdata('<div class="alert alert-danger" role="alert">Barang gagal dihapus</div>');
    }

    redirect('berkas/buku_tamu');
  }

  public function buku_agenda()
  {
    $data['agenda'] = $this->berkas->totalArsip();

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('template/topbar');
    $this->load->view('main/buku_agenda', $data);
    $this->load->view('template/footer');
  }

  public function tambah_buku_tamu()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    $this->form_validation->set_rules('nomor', 'Nomor', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('template/header');
      $this->load->view('template/sidebar');
      $this->load->view('template/topbar');
      $this->load->view('main/tambah/buku_tamu');
      $this->load->view('template/footer');
    } else {
      $data = array(
        'nama' => $this->input->post('nama', 1),
        'alamat' => $this->input->post('alamat', 1),
        'tanggal' => $this->input->post('tanggal', 1),
        'nomor' => $this->input->post('nomor', 1),
        'keterangan' => $this->input->post('keterangan', 1)
      );

      if ($this->berkas->tambahBukuTamu($data)) {
        redirect('berkas/buku_tamu');
      } else {
        redirect('berkas/tambah_buku_tamu');
      }
    }
  }

  public function ubah_buku_tamu($id)
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    $this->form_validation->set_rules('nomor', 'Nomor', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

    if ($this->form_validation->run() == FALSE) {
      $data['id'] = $id;
      $data['isi'] = $this->berkas->tampilkanSatuTamu($id);

      $this->load->view('template/header');
      $this->load->view('template/sidebar');
      $this->load->view('template/topbar');
      $this->load->view('main/ubah/buku_tamu', $data);
      $this->load->view('template/footer');
    } else {
      $data = array(
        'id' => $id,
        'nama' => $this->input->post('nama', 1),
        'alamat' => $this->input->post('alamat', 1),
        'tanggal' => $this->input->post('tanggal', 1),
        'nomor' => $this->input->post('nomor', 1),
        'keterangan' => $this->input->post('keterangan', 1)
      );

      if ($this->berkas->simpanPerubahanBukuTamu($data)) {
        redirect('berkas/buku_tamu');
      } else {
        redirect('berkas/ubah_buku_tamu');
      }
    }
  }

  public function daftar_surat()
  {
    $data['surat'] = $this->berkas->tampilkanDaftarSurat();

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('template/topbar');
    $this->load->view('main/daftar_surat', $data);
    $this->load->view('template/footer');
  }

  public function hapus_daftar_surat($id)
  {
    if ($this->berkas->hapusDaftarSurat($id)) {
      $this->session->set_flashdata('<div class="alert alert-success" role="alert">Barang berhasil dihapus</div>');
    } else {
      $this->session->set_flashdata('<div class="alert alert-danger" role="alert">Barang gagal dihapus</div>');
    }

    redirect('berkas/daftar_surat');
  }

  public function tambah_daftar_surat()
  {
    $this->form_validation->set_rules('nomor', 'Nomor', 'required');
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    $this->form_validation->set_rules('perihal', 'Perihal', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('template/header');
      $this->load->view('template/sidebar');
      $this->load->view('template/topbar');
      $this->load->view('main/tambah/daftar_surat');
      $this->load->view('template/footer');
    } else {
      $data = array(
        'nomor' => $this->input->post('nomor', 1),
        'nama' => $this->input->post('nama', 1),
        'alamat' => $this->input->post('alamat', 1),
        'tanggal' => $this->input->post('tanggal', 1),
        'perihal' => $this->input->post('perihal', 1),
        'keterangan' => $this->input->post('keterangan', 1)
      );

      if ($this->berkas->tambahDaftarSurat($data)) {
        redirect('berkas/daftar_surat');
      } else {
        redirect('berkas/tambah_daftar_surat');
      }
    }
  }

  public function ubah_daftar_surat($id)
  {
    $this->form_validation->set_rules('nomor', 'Nomor', 'required');
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    $this->form_validation->set_rules('perihal', 'Perihal', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

    if ($this->form_validation->run() == FALSE) {
      $data['isi'] = $this->berkas->tampilkanSatuDaftarSurat($id);
      $data['id'] = $id;

      $this->load->view('template/header');
      $this->load->view('template/sidebar');
      $this->load->view('template/topbar');
      $this->load->view('main/ubah/daftar_surat', $data);
      $this->load->view('template/footer');
    } else {
      $data = array(
        'id' => $id,
        'nomor' => $this->input->post('nomor', 1),
        'nama' => $this->input->post('nama', 1),
        'alamat' => $this->input->post('alamat', 1),
        'tanggal' => $this->input->post('tanggal', 1),
        'perihal' => $this->input->post('perihal', 1),
        'keterangan' => $this->input->post('keterangan', 1)
      );

      if ($this->berkas->simpanPerubahanDaftarSurat($data)) {
        redirect('berkas/daftar_surat');
      } else {
        redirect('berkas/ubah_daftar_surat');
      }
    }
  }

  public function appt()
  {
    $data['appt'] = $this->berkas->tampilkanAPPT();

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('template/topbar');
    $this->load->view('main/appt', $data);
    $this->load->view('template/footer');
  }

  public function hapus_appt($id)
  {
    if ($this->berkas->hapusAPPT($id)) {
      $this->session->set_flashdata('<div class="alert alert-success" role="alert">Barang berhasil dihapus</div>');
    } else {
      $this->session->set_flashdata('<div class="alert alert-danger" role="alert">Barang gagal dihapus</div>');
    }

    redirect('berkas/appt');
  }

  public function tambah_appt()
  {
    $this->form_validation->set_rules('nomor_akta', 'NomorAkta', 'required');
    $this->form_validation->set_rules('tanggal_akta', 'TanggalAkta', 'required');
    $this->form_validation->set_rules('perbuatan_hukum', 'PerbuatanHukum', 'required');
    $this->form_validation->set_rules('pihak_memberikan', 'PihakMemberikan', 'required');
    $this->form_validation->set_rules('pihak_menerima', 'PihakMenerima', 'required');
    $this->form_validation->set_rules('jenis_nomor_hak', 'JenisNomorHAK', 'required');
    $this->form_validation->set_rules('letak_tanah', 'LetakTanah', 'required');
    $this->form_validation->set_rules('luas_tanah', 'LuasTanah', 'required');
    $this->form_validation->set_rules('luas_bangunan', 'LuasBangunan', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('template/header');
      $this->load->view('template/sidebar');
      $this->load->view('template/topbar');
      $this->load->view('main/tambah/appt');
      $this->load->view('template/footer');
    } else {
      $data = array(
        'nomor_akta' => $this->input->post('nomor_akta', 1),
        'tanggal_akta' => $this->input->post('tanggal_akta', 1),
        'perbuatan_hukum' => $this->input->post('perbuatan_hukum', 1),
        'pihak_memberikan' => $this->input->post('pihak_memberikan', 1),
        'pihak_menerima' => $this->input->post('pihak_menerima', 1),
        'jenis_nomor_hak' => $this->input->post('jenis_nomor_hak', 1),
        'letak_tanah' => $this->input->post('letak_tanah', 1),
        'luas_tanah' => $this->input->post('luas_tanah', 1),
        'luas_bangunan' => $this->input->post('luas_bangunan', 1)
      );

      if ($this->berkas->tambahAPPT($data)) {
        redirect('berkas/appt');
      } else {
        redirect('berkas/tambah_appt');
      }
    }
  }

  public function ubah_appt($id)
  {
    $this->form_validation->set_rules('nomor_akta', 'NomorAkta', 'required');
    $this->form_validation->set_rules('tanggal_akta', 'TanggalAkta', 'required');
    $this->form_validation->set_rules('perbuatan_hukum', 'PerbuatanHukum', 'required');
    $this->form_validation->set_rules('pihak_memberikan', 'PihakMemberikan', 'required');
    $this->form_validation->set_rules('pihak_menerima', 'PihakMenerima', 'required');
    $this->form_validation->set_rules('jenis_nomor_hak', 'JenisNomorHAK', 'required');
    $this->form_validation->set_rules('letak_tanah', 'LetakTanah', 'required');
    $this->form_validation->set_rules('luas_tanah', 'LuasTanah', 'required');
    $this->form_validation->set_rules('luas_bangunan', 'LuasBangunan', 'required');

    if ($this->form_validation->run() == FALSE) {
      $data['id'] = $id;
      $data['isi'] = $this->berkas->tampilkanSatuAPPT($id);

      $this->load->view('template/header');
      $this->load->view('template/sidebar');
      $this->load->view('template/topbar');
      $this->load->view('main/ubah/appt', $data);
      $this->load->view('template/footer');
    } else {
      $data = array(
        'id' => $id,
        'nomor_akta' => $this->input->post('nomor_akta', 1),
        'tanggal_akta' => $this->input->post('tanggal_akta', 1),
        'perbuatan_hukum' => $this->input->post('perbuatan_hukum', 1),
        'pihak_memberikan' => $this->input->post('pihak_memberikan', 1),
        'pihak_menerima' => $this->input->post('pihak_menerima', 1),
        'jenis_nomor_hak' => $this->input->post('jenis_nomor_hak', 1),
        'letak_tanah' => $this->input->post('letak_tanah', 1),
        'luas_tanah' => $this->input->post('luas_tanah', 1),
        'luas_bangunan' => $this->input->post('luas_bangunan', 1)
      );

      if ($this->berkas->simpanPerubahanAPPT($data)) {
        redirect('berkas/appt');
      } else {
        redirect('berkas/ubah_appt');
      }
    }
  }
}
