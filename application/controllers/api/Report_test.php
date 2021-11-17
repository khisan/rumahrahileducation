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
    $query = $this->h_test->getReportRest($paket_id, $mapel_id);
    $this->set_response($query, REST_Controller::HTTP_OK);
  }
}
