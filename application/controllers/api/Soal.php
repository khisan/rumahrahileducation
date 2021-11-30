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

  public function index_get($id = null, $id_paket = null, $id_mapel = null)
  {
    $query = $this->soal->getRest($id, $id_paket, $id_mapel);
    $data = [];
    foreach ($query as $res) {
      $row['id_soal'] = $res->id_soal;
      $row['paket_id'] = $res->paket_id;
      $row['mapel_id'] = $res->mapel_id;
      $row['soal'] = strip_tags(html_entity_decode(str_replace("\n", "", $res->soal)));
      $row['option_a'] = strip_tags(html_entity_decode(str_replace("\n", "", $res->option_a)));
      $row['option_b'] = strip_tags(html_entity_decode(str_replace("\n", "", $res->option_b)));
      $row['option_c'] = strip_tags(html_entity_decode(str_replace("\n", "", $res->option_c)));
      $row['option_d'] = strip_tags(html_entity_decode(str_replace("\n", "", $res->option_d)));
      $row['option_e'] = strip_tags(html_entity_decode(str_replace("\n", "", $res->option_e)));
      $row['jawaban_benar'] = $res->jawaban_benar;
      $data[] = $row;
    }
    $this->set_response([
      'status' => REST_Controller::HTTP_OK,
      'message' => "Get Data Soal Berhasil",
      'data' => $data,
    ]);
  }
}
