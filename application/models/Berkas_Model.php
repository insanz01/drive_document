<?php

class Berkas_Model extends CI_Model
{
  public function save_file($data)
  {
    return $this->db->insert('dokumen', $data);
  }

  public function load_files()
  {
    return $this->db->get('dokumen')->result_array();
  }

  public function delete_file($id)
  {
    return $this->db->delete('dokumen', array('id' => $id));
  }

  public function simpanDaftarAkta($data)
  {
    return $this->db->insert('akta', $data);
  }

  public function simpanPerubahanDaftarAkta($data)
  {
    $this->db->set('nomor', $data['nomor']);
    $this->db->set('jenis', $data['jenis']);
    $this->db->set('tanggal', $data['tanggal']);
    $this->db->set('sifat', $data['sifat']);
    $this->db->set('nama', $data['nama']);
    $this->db->set('alamat', $data['alamat']);
    $this->db->set('nama_satu', $data['nama_satu']);
    $this->db->set('nama_dua', $data['nama_dua']);
    $this->db->set('nama_tiga', $data['nama_tiga']);
    $this->db->where('id', $data['id']);
    $this->db->update('akta');

    return $this->db->affected_rows();
  }

  public function tampilkanAkta($bulan = '', $jenis = '')
  {
    if ($bulan == '' && $jenis == '') {
      return $this->db->get('akta')->result_array();
    } else {
      $this->db->select('*');
      $this->db->from('akta');
      $this->db->where('month(tanggal)', $bulan);
      $this->db->where('jenis', $jenis);
      return $this->db->get()->result_array();
    }
  }

  public function tampilkanSatuAkta($id)
  {
    return $this->db->get('akta', array('id' => $id))->row_array();
  }

  public function hapusAkta($data)
  {
    return $this->db->delete('akta', array('id' => $data));
  }

  public function totalArsip()
  {
    // APHT -> SKMHT -> JUAL BELI
    $result = array();

    # APHT
    $this->db->select('count(*) as total');
    $this->db->from('akta');
    $this->db->where('jenis', 'APHT');
    $apht = $this->db->get()->row();

    # SKMHT
    $this->db->select('count(*) as total');
    $this->db->from('akta');
    $this->db->where('jenis', 'SKMHT');
    $skmht = $this->db->get()->row();

    # JUAL BELI
    $this->db->select('count(*) as total');
    $this->db->from('akta');
    $this->db->where('jenis', 'JUAL BELI');
    $jb = $this->db->get()->row();

    $result[] = array('total' => $apht->total);

    $result[] = array('total' => $skmht->total);

    $result[] = array('total' => $jb->total);

    // $result[] = array('total' => $this->db->count_all_results('bukutamu'));

    return $result;
  }

  public function tampilkanTamu($filter = '')
  {
    if ($filter == '') {
      return $this->db->get('bukutamu')->result_array();
    } else {
      $this->db->select('*');
      $this->db->from('bukutamu');
      $this->db->where('month(tanggal)', $filter);
      return $this->db->get()->result_array();
    }
  }

  public function tampilkanSatuTamu($id)
  {
    return $this->db->get('bukutamu', array('id' => $id))->row_array();
  }

  public function tambahBukuTamu($data)
  {
    return $this->db->insert('bukutamu', $data);
  }

  public function simpanPerubahanBukuTamu($data)
  {
    $this->db->set('nama', $data['nama']);
    $this->db->set('alamat', $data['alamat']);
    $this->db->set('tanggal', $data['tanggal']);
    $this->db->set('nomor', $data['nomor']);
    $this->db->set('keterangan', $data['keterangan']);
    $this->db->where('id', $data['id']);
    $this->db->update('bukutamu');

    return $this->db->affected_rows();
  }

  public function hapusBukuTamu($data)
  {
    return $this->db->delete('bukutamu', array('id' => $data));
  }

  public function tampilkanDaftarSurat()
  {
    return $this->db->get('surat')->result_array();
  }

  public function tampilkanSatuDaftarSurat($id)
  {
    return $this->db->get('surat', array('id' => $id))->row_array();
  }

  public function tambahDaftarSurat($data)
  {
    return $this->db->insert('surat', $data);
  }

  public function simpanPerubahanDaftarSurat($data)
  {
    $this->db->set('nomor', $data['nomor']);
    $this->db->set('nama', $data['nama']);
    $this->db->set('alamat', $data['alamat']);
    $this->db->set('tanggal', $data['tanggal']);
    $this->db->set('perihal', $data['perihal']);
    $this->db->set('keterangan', $data['keterangan']);
    $this->db->where('id', $data['id']);
    $this->db->update('surat');

    return $this->db->affected_rows();
  }

  public function tampilkanAPPT($filter = '')
  {
    if ($filter == '') {
      return $this->db->get('appt')->result_array();
    } else {
      $this->db->select('*');
      $this->db->from('appt');
      $this->db->where('month(tanggal_akta)', $filter);
      return $this->db->get()->result_array();
    }
  }

  public function tampilkanSatuAPPT($id)
  {
    return $this->db->get('appt', array('id' => $id))->row_array();
  }

  public function hapusAPPT($id)
  {
    return $this->db->delete('appt', array('id' => $id));
  }

  public function tmabahAPPT($data)
  {
    return $this->db->insert('appt', $data);
  }

  public function simpanPerubahanAPPT($data)
  {
    $this->db->set('nomor_akta', $data['nomor_akta']);
    $this->db->set('tanggal_akta', $data['tanggal_akta']);
    $this->db->set('perbuatan_hukum', $data['perbuatan_hukum']);
    $this->db->set('pihak_memberikan', $data['pihak_memberikan']);
    $this->db->set('pihak_menerima', $data['pihak_menerima']);
    $this->db->set('jenis_nomor_hak', $data['jenis_nomor_hak']);
    $this->db->set('letak_tanah', $data['letak_tanah']);
    $this->db->set('luas_tanah', $data['luas_tanah']);
    $this->db->set('luas_bangunan', $data['luas_bangunan']);
    $this->db->where('id', $data['id']);
    $this->db->update('appt');

    return $this->db->affected_rows();
  }
}
