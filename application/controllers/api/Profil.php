<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profil extends BD_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth();
    $this->load->model('Siswa_model', 'siswa');
  }

  public function index_get()
  {
    $id = $this->input->get('id');
    $res = $this->siswa->getRest($id);
    $data['id_siswa_profile'] = $res->id_siswa_profile;
    $data['nama'] = $res->nama;
    $data['username'] = $res->username;
    $data['jenjang_id'] = $res->jenjang_id;
    $data['kelas_id'] = $res->kelas_id;
    $data['jurusan'] = $res->jurusan;
    $data['alamat'] = $res->alamat;
    $data['email'] = $res->email;
    $data['image'] = base_url() . '' . $res->image;
    if ($res == null) {
      $this->set_response([
        'status' => REST_Controller::HTTP_OK,
        'message' => "Get Data Siswa Gagal",
        'data' => null,
      ]);
    } else {
      $this->set_response([
        'status' => REST_Controller::HTTP_OK,
        'message' => "Get Data Siswa Berhasil",
        'data' => $data,
      ]);
    }
  }

  public function index_put()
  {
    try {
      $data = [
        'id_siswa' => $this->input->post('id_siswa'),
        'jenjang_id' => $this->input->post('jenjang_id'),
        'kelas_id' => $this->input->post('kelas_id')
      ];
      $post['nama'] = $this->input->post('nama');
      $post['sekolah'] = $this->input->post('sekolah');
      $post['image'] = $this->input->post('foto');
      $post['updated'] = date('Y-m-d H:i:s');
      // Setting form validation
      $this->form_validation->set_data($data);
      $this->form_validation->set_rules('id_siswa', 'ID Siswa', 'required');
      $this->form_validation->set_rules('jenjang_id', 'ID Jenjang', 'required');
      $this->form_validation->set_rules('kelas_id', 'ID Kelas', 'required');
      if ($this->form_validation->run() == FALSE) {
        return $this->response([
          'status' => REST_Controller::HTTP_NOT_FOUND,
          'message' => $this->form_validation->error_array(),
          'data' => null,
        ]);
      } else {
        $jj = '';
        if ($jenjang_id == 1) {
          $jj = 'SD';
        } elseif ($jenjang_id == 2) {
          $jj = 'SMP';
        } elseif ($jenjang_id == 3) {
          $jj = 'SMA';
        } else {
          $jj = 'Lainnya';
        }
        $config['upload_path']    = './uploads/siswa/';
        $config['allowed_types']  = 'gif|png|jpg|jpeg';
        $config['file_name']       = "SISWA-$jj-$kelas_id-" . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);

        if (!empty($_FILES['foto']['name'])) {
          if ($this->upload->do_upload('foto')) {
            $siswa = $this->siswa->getRest($id_siswa)->row();
            if ($siswa->image != null && $siswa->image != 'student.png') {
              $target_file = './uploads/siswa/' . $siswa->image;
              unlink($target_file);
            }
            $post['image'] = $this->upload->data('file_name');
          }
          $this->siswa->updateProfilRest($post, $id_siswa);
          return $this->set_response([
            'status' => REST_Controller::HTTP_OK,
            'message' => "Data Berhasil Diubah",
          ]);
        } else {
          $post['image'] = null;
          $this->siswa->updateProfilRest($post, $id_siswa);
          return $this->set_response([
            'status' => REST_Controller::HTTP_OK,
            'message' => "Data Berhasil Diubah",
          ]);
        }
      }
    } catch (\Throwable $e) {
      $this->response([
        'status' => REST_Controller::HTTP_NOT_FOUND,
        'message' => $e->getMessage(),
      ]);
    }
  }
}
