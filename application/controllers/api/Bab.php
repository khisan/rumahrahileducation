<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bab extends BD_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth();
    $this->load->model('Bab_model', 'bab');
  }

  public function index_get()
  {
    $id = $this->input->get('mapel_id');
    $semester = $this->input->get('semester');
    $query = $this->bab->getRest($id, $semester);
    if ($query == null) {
      $this->set_response([
        'status' => REST_Controller::HTTP_OK,
        'message' => "Get Data Bab Gagal",
        'data' => null,
      ]);
    } else {
      $this->set_response([
        'status' => REST_Controller::HTTP_OK,
        'message' => "Get Data Bab Berhasil",
        'data' => $query,
      ]);
    }
  }
}
