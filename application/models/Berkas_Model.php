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
    return $this->db->delete('dokumen', ['id' => $id]);
  }
}
