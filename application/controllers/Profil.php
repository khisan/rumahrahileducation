<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profil extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('Siswa_model', 'siswa');
  }

  public function index()
  {
    $id = $this->session->userdata('userid');
    $data['data'] = $this->siswa->getSiswa($id);
    $this->template->load('template', 'user/profil.php', $data);
  }

  public function update()
  {
    $post = $this->input->post(null, TRUE);
    $jj = '';
    if ($post['jenjang_id'] == 1) {
      $jj = 'SD';
    } elseif ($post['jenjang_id'] == 2) {
      $jj = 'SMP';
    } elseif ($post['jenjang_id'] == 3) {
      $jj = 'SMA';
    } else {
      $jj = 'Lainnya';
    }
    $config['upload_path']    = './uploads/siswa/';
    $config['allowed_types']  = 'gif|png|jpg|jpeg';
    $config['file_name']       = "SISWA-$jj-$post[kelas_id]-" . date('ymd') . '-' . substr(md5(rand()), 0, 10);

    $this->load->library('upload', $config);

    if (!empty($_FILES['foto']['name'])) {
      if ($this->upload->do_upload('foto')) {
        $siswa = $this->siswa->get($post['id_siswa'])->row();
        if ($siswa->image != null && $siswa->image != 'student.png') {
          $target_file = './uploads/siswa/' . $siswa->image;
          unlink($target_file);
        }
        $post['foto'] = $this->upload->data('file_name');
      }
      $this->siswa->update_profil($post);
      redirect('profil');
    } else {
      $post['foto'] = null;
      $this->siswa->update_profil($post);
      redirect('profil');
    }
  }
}
