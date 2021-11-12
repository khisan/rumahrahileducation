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

  public function index_get($id = null, $id_kelas = null, $id_paket = null)
  {
    $query = $this->mapel->getRest($id, $id_kelas, $id_paket);
    $this->set_response($query, REST_Controller::HTTP_OK);
  }
}
