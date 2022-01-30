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

  public function index_get()
  {
    $id_bab = $this->input->get('id_bab');
    $id_paket = $this->input->get('id_paket');
    $id_kelas = $this->input->get('id_kelas');
    $query = $this->paket->getRest($id_bab, $id_paket, $id_kelas);
    if ($query == null) {
      $this->set_response([
        'status' => REST_Controller::HTTP_OK,
        'message' => "Get Data Paket Gagal",
        'data' => null,
      ]);
    } else {
      $this->set_response([
        'status' => REST_Controller::HTTP_OK,
        'message' => "Get Data Paket Berhasil",
        'data' => $query,
      ]);
    }
  }
}
