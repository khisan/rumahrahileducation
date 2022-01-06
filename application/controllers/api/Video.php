<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video extends BD_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth();
    $this->load->library('form_validation');
    $this->load->model('Video_model', 'video');
  }

  public function index_post()
  {
    $id_mapel = $this->post('id_mapel');
    $id_bab = $this->post('id_bab');
    $search_data = $this->post('search_data');
    if ($search_data != "" or NULL) {
      if ($id_mapel == NULL && $id_bab == NULL) {
        return $this->response([
          'status' => REST_Controller::HTTP_NOT_FOUND,
          'message' => "ID bab dan ID mapel harap diisi",
          'data' => null,
        ]);
      } else if ($id_bab == NULL) {
        return $this->response([
          'status' => REST_Controller::HTTP_NOT_FOUND,
          'message' => "ID bab harap diisi",
          'data' => null,
        ]);
      } else if ($id_mapel == NULL) {
        return $this->response([
          'status' => REST_Controller::HTTP_NOT_FOUND,
          'message' => "ID mapel harap diisi",
          'data' => null,
        ]);
      } else {
        $query = $this->video->getListVideoRest($id_mapel, $search_data, $id_bab);
        if ($query == NULL) {
          return $this->response([
            'status' => REST_Controller::HTTP_NOT_FOUND,
            'message' => "Data tidak ditemukan",
            'data' => null,
          ]);
        } else {
          $data = [];
          foreach ($query as $res) {
            $row['id_video'] = $res->id_video;
            $row['mapel_id'] = $res->mapel_id;
            $row['bab_id'] = $res->bab_id;
            $row['nama_video'] = $res->nama_video;
            $row['deskripsi'] = strip_tags(html_entity_decode(str_replace("\n", "", $res->deskripsi)));
            $row['link'] = $res->link;
            $row['id_bab'] = $res->id_bab;
            $row['nama_bab'] = $res->nama_bab;
            $row['semester'] = $res->semester;
            $row['id_mapel'] = $res->id_mapel;
            $row['kelas_id'] = $res->kelas_id;
            $row['paket_id'] = $res->paket_id;
            $row['nama_mapel'] = $res->nama_mapel;
            $data[] = $row;
          }
          return $this->set_response([
            'status' => REST_Controller::HTTP_OK,
            'message' => "Data Berhasil Ditemukan",
            'data' => $data
          ]);
        }
      }
    } else {
      $query = $this->video->getListVideoRest($id_mapel, $search_data, $id_bab);
      if ($query == NULL) {
        return $this->response([
          'status' => REST_Controller::HTTP_NOT_FOUND,
          'message' => "Data tidak ditemukan",
          'data' => null,
        ]);
      } else {
        $data = [];
        foreach ($query as $res) {
          $row['id_video'] = $res->id_video;
          $row['mapel_id'] = $res->mapel_id;
          $row['bab_id'] = $res->bab_id;
          $row['nama_video'] = $res->nama_video;
          $row['deskripsi'] = strip_tags(html_entity_decode(str_replace("\n", "", $res->deskripsi)));
          $row['link'] = $res->link;
          $row['created'] = $res->created;
          $row['updated'] = $res->updated;
          $row['id_bab'] = $res->id_bab;
          $row['nama_bab'] = $res->nama_bab;
          $row['semester'] = $res->semester;
          $row['id_mapel'] = $res->id_mapel;
          $row['kelas_id'] = $res->kelas_id;
          $row['paket_id'] = $res->paket_id;
          $row['nama_mapel'] = $res->nama_mapel;
          $data[] = $row;
        }
        return $this->set_response([
          'status' => REST_Controller::HTTP_OK,
          'message' => "Data Berhasil Ditemukan",
          'data' => $data
        ]);
      }
    }
  }
}
