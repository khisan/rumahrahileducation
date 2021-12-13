<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends BD_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth();
    $this->load->library('form_validation');
    $this->load->model('Jenjang_model', 'jenjang');
    $this->load->model('Kelas_model', 'kelas');
    $this->load->model('Mapel_model', 'mapel');
    $this->load->model('Bab_model', 'bab');
    $this->load->model('Paket_model', 'paket');
    $this->load->model('Soal_model', 'soal');
    $this->load->model('Test_model', 'test');
  }

  // public function index_get($siswa_profile_id = null)
  // {
  //   $query = $this->test->getRest($siswa_profile_id);
  //   $this->set_response($query, REST_Controller::HTTP_OK);
  // }

  // public function getJawaban_get($id_test)
  // {
  //   $query = $this->test->getJawabanRest($id_test);
  //   $this->set_response($query, REST_Controller::HTTP_OK);
  // }

  public function mulaiTest_post()
  {
    $post['paket_id'] = $this->input->post('paket_id');
    $post['mapel_id'] = $this->input->post('mapel_id');
    $post['siswa_profile_id'] = $this->input->post('siswa_profile_id');
    $post['list_soal'] = $this->input->post('list_soal');
    $post['list_jawaban'] = $this->input->post('list_jawaban');
    $post['jml_benar'] = $this->input->post('jml_benar');
    $post['nilai'] = $this->input->post('nilai');
    $post['tgl_test'] = $this->input->post('tgl_test');
    // Setting form validation
    $this->form_validation->set_data($post);
    $this->form_validation->set_rules('paket_id', 'ID Paket', 'required');
    $this->form_validation->set_rules('mapel_id', 'ID Mapel', 'required');
    $this->form_validation->set_rules('siswa_profile_id', 'ID Siswa Profile', 'required');
    $this->form_validation->set_rules('list_soal', 'List Soal', 'required');
    $this->form_validation->set_rules('list_jawaban', 'List Jawaban', 'required');
    $this->form_validation->set_rules('jml_benar', 'Jumlah Benar', 'required');
    $this->form_validation->set_rules('nilai', 'Nilai', 'required');
    $this->form_validation->set_rules('tgl_test', 'Tanggal Test', 'required');
    if ($this->form_validation->run() == FALSE) {
      return $this->response([
        'status' => REST_Controller::HTTP_NOT_FOUND,
        'message' => $this->form_validation->error_array(),
        'data' => null,
      ]);
    } else {
      $this->test->createRest($post);
      return $this->set_response([
        'status' => REST_Controller::HTTP_OK,
        'message' => "Data Berhasil Ditambahkan",
      ]);
    }
  }

  // public function simpanSatu_post()
  // {
  //   $post['id_h_test'] = $this->input->post('id_h_test');
  //   $post['list_jawaban'] = $this->input->post('list_jawaban');
  //   $this->test->updateRest($post, $post['id_h_test']);
  //   return $this->set_response([
  //     'status' => true,
  //     'message' => 'Data Updated'
  //   ]);
  // }

  // public function simpanAkhir_post()
  // {
  //   $post['id_h_test'] = $this->input->post('id_h_test');
  //   $post['jml_benar'] = $this->input->post('jml_benar');
  //   $post['nilai'] = $this->input->post('nilai');
  //   $this->test->updateRest($post, $post['id_h_test']);
  //   return $this->set_response([
  //     'status' => true,
  //     'message' => 'Data Updated'
  //   ]);
  // }
}
