<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal extends BD_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth();
    $this->load->model('Soal_model', 'soal');
  }

  // public function index_post()
  // {
  //   $theCredential = $this->user_data;
  //   $this->response($theCredential, 200);
  // }


  public function index_get($id = null, $id_paket = null, $id_mapel = null)
  {
    $query = $this->soal->getRest($id, $id_paket, $id_mapel);
    $this->set_response($query, REST_Controller::HTTP_OK);
  }
}
