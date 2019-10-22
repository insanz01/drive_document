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

  public function tampilkanAkta()
  {
    return $this->db->get('akta')->result_array();
  }

  public function totalArsip()
  {
    // daftar akta -> daftar surat -> akta ppat -> buku tamu
    $result = [];

    $result[] = array('total' => $this->db->count_all_results('akta'));

    $result[] = array('total' => 0);

    $result[] = array('total' => 0);

    $result[] = array('total' => $this->db->count_all_results('bukutamu'));

    return $result;
  }

  public function tampilkanTamu()
  {
    return $this->db->get('bukutamu')->result_array();
  }

  public function tambahBukuTamu($data)
  {
    return $this->db->insert('bukutamu', $data);
  }
}
