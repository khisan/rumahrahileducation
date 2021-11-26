<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends BD_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth();
    $this->load->model('Paket_model', 'paket');
  }

  public function index_get($id = null, $id_bab = null, $id_kelas = null)
  {
    $query = $this->paket->getRest($id, $id_bab, $id_kelas);
    $this->set_response([
      'status' => REST_Controller::HTTP_OK,
      'message' => "Get Data Paket Berhasil",
      'data' => $query,
    ]);
  }
}
