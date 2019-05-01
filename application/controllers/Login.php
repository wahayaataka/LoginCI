<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function index()
  {
    $this->load->model('Login_user');
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');

    if ($this->form_validation->run() == FALSE) {
      $data['title'] = 'Login';
      $this->load->view('login/index_view', $data);
    }
    else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $where = array('username' => $username,
                      'password' => $password);

      $cek = $this->Login_user->cek_login($where);
      if ($cek > 0) {
        $data_session = array('status' => 'logged in');

        $this->session->set_userdata($data_session); //diload berulang kali tetapi tetap ada/berfungsi
        redirect('Dashboard/index');
      }
      else {
        $this->session->set_flashdata('pesan', 'Silakan cek kembali.'); //pindah halaman lgsg hilang
        redirect('Login/index');
      }
    }
  }
  public function logout()
  {
    $this->session->sess_destroy();
    redirect('Login/index');
  }
}
 ?>
