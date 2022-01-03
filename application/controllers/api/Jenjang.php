<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenjang extends BD_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth();
    $this->load->model('Jenjang_model', 'jenjang');
  }

  public function index_get($id = null)
  {
    $query = $this->jenjang->getRest($id);
    if ($query == null) {
      $this->set_response([
        'status' => REST_Controller::HTTP_OK,
        'message' => "Get Data Jenjang Gagal",
        'data' => null,
      ]);
    } else {
      $this->set_response([
        'status' => REST_Controller::HTTP_OK,
        'message' => "Get Data Jenjang Berhasil",
        'data' => $query,
      ]);
    }
  }
}
