<?php

class Auth_Model extends CI_Model
{
  public function login($data)
  {
    $user = $this->db->get('user', array('username' => $data['username']))->row_array();

    if ($data['password'] == $user['password']) {
      $this->session->set_userdata('user_id', $user['id']);
      $this->session->set_userdata('user_name', $user['username']);

      return true;
    } else {

      return false;
    }
  }
}
