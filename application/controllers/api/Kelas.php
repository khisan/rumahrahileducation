<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends BD_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth();
    $this->load->model('Kelas_model', 'kelas');
  }

  public function index_get()
  {
    $id_kelas = $this->input->get('id_kelas');
    $id_jenjang = $this->input->get('id_jenjang');
    $query = $this->kelas->getRest($id_kelas, $id_jenjang);
    if ($query == null) {
      $this->set_response([
        'status' => REST_Controller::HTTP_OK,
        'message' => "Get Data Kelas Gagal",
        'data' => null,
      ]);
    } else {
      $this->set_response([
        'status' => REST_Controller::HTTP_OK,
        'message' => "Get Data Kelas Berhasil",
        'data' => $query,
      ]);
    }
  }
}
