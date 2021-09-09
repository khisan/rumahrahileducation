<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authprivate extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Private_model', 'private');
    $this->load->model('Siswa_model', 'siswa');
    $this->load->model('Jenjang_model', 'jenjang');
    $this->load->model('Kelas_model', 'kelas');
  }

  public function index()
  {
    $data['jenjang'] = $this->jenjang->get();
    $data['kelas'] = $this->kelas->get();
    $data['jurusan'] = $this->kelas->getJurusan();
    $this->load->view('user/register_private', $data);
  }

  public function process()
  {
    $username = $this->input->post('username');
    $name = $this->input->post('name');
    $password = $this->input->post('password');
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $data = [
      'username' => $username,
      'name' => $name,
      'password' => $pass
    ];
    $insert = $this->auth_model->register("users", $data);
    if ($insert) {
      echo '<script>alert("Sukses! Anda berhasil melakukan register. Silahkan login untuk mengakses data.");window.location.href="' . base_url('index.php/auth/login') . '";</script>';
    }
  }
}
