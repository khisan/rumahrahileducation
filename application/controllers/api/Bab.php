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

  // public function index_post()
  // {
  //   $theCredential = $this->user_data;
  //   $this->response($theCredential, 200);
  // }

  public function index_get($id = null, $id_mapel = null, $semester = null)
  {
    $query = $this->bab->getRest($id, $id_mapel, $semester);
    $this->set_response($query, REST_Controller::HTTP_OK);
  }
}
