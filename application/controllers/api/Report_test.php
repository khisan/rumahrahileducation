<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_test extends BD_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth();
    $this->load->model('H_test_model', 'h_test');
  }

  public function index_post()
  {
    $paket_id = $this->post('paket_id');
    $mapel_id = $this->post('mapel_id');
    // Setting form validation
    $this->form_validation->set_rules('paket_id', 'ID Paket', 'required');
    $this->form_validation->set_rules('mapel_id', 'ID Mapel', 'required');
    if ($this->form_validation->run() == FALSE) {
      return $this->response([
        'status' => REST_Controller::HTTP_NOT_FOUND,
        'message' => $this->form_validation->error_array(),
        'data' => null,
      ]);
    } else {
      $data = $this->h_test->getReportRest($paket_id, $mapel_id);
      return $this->set_response([
        'status' => REST_Controller::HTTP_OK,
        'message' => "Data Berhasil Ditemukan",
        'data' => $data
      ]);
    }
  }
}
