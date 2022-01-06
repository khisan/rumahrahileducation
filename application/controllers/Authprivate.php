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
    $nama = $this->input->post('nama');
    $jenjang_id = $this->input->post('jenjang_id');
    $kelas_id = $this->input->post('kelas_id');
    $jurusan_id = $this->input->post('jurusan_id');
    $sekolah = $this->input->post('sekolah');
    $alamat = $this->input->post('alamat');
    $email = $this->input->post('email');
    $data = [
      'nama' => $nama,
      'jenjang_id' => $jenjang_id,
      'kelas_id' => $kelas_id,
      'jurusan' => $jurusan_id,
      'sekolah' => $sekolah,
      'alamat' => $alamat,
      'email' => $email,
    ];
    $insert = $this->private->register($data);
    if ($insert) {
      echo '<script>alert("Sukses! Anda berhasil melakukan pendaftaran");window.location.href="' . base_url('landingpage') . '";</script>';
    }
  }
}
