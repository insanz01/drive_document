<?php

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model('Auth_Model', 'auth');
  }

  public function index()
  {
    if ($this->session->has_userdata('user_id')) {
      redirect('berkas');
    }

    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if ($this->form_validation->run() ==  FALSE) {
      $this->load->view('auth/login');
    } else {
      $data = array(
        'username' => $this->input->post('username', 1),
        'password' => $this->input->post('password', 1)
      );

      if ($this->auth->login($data)) {
        redirect('berkas');
      } else {
        $this->session->set_flashdata('pesan', "<div class='alert alert-success' role='alert'>Login gagal!</div>");

        redirect('auth');
      }
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('username');

    redirect('auth');
  }
}
