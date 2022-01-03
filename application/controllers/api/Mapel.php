<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends BD_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth();
    $this->load->model('Mapel_model', 'mapel');
  }

  public function index_get($id = null)
  {
    $query = $this->mapel->getRest($id);
    if ($query == null) {
      $this->set_response([
        'status' => REST_Controller::HTTP_OK,
        'message' => "Get Data Mapel Gagal",
        'data' => null,
      ]);
    } else {
      $this->set_response([
        'status' => REST_Controller::HTTP_OK,
        'message' => "Get Data Mapel Berhasil",
        'data' => $query,
      ]);
    }
  }
}
