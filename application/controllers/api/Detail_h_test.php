<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_h_test extends BD_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->auth();
    $this->load->model('Detail_h_test_model', 'detail_h_test');
    $this->load->model('Test_model', 'test');
    $this->load->model('Siswa_model', 'siswa');
  }

  public function index_get()
  {
    $id_h_test = $this->input->get('id_h_test');
    $list = $this->detail_h_test->getDataTables($id_h_test);
    $list_jawaban = $this->test->getJawaban($id_h_test)->row()->list_jawaban;
    function multiexplode($delimiters, $string)
    {
      $ready = str_replace($delimiters, $delimiters[0], $string);
      $launch = explode($delimiters[0], $ready);
      return  $launch;
    }
    $exp_jawaban = multiexplode(array(',', ':'), $list_jawaban);
    $data = [];
    $i = 1;
    $no = 1;
    foreach ($list as $detail_h_test) {
      $cek = $exp_jawaban[$i] == $detail_h_test->jawaban_benar ? "Benar" : "Salah";
      $row['no'] = $no++;
      $row['jawab'] = $exp_jawaban[$i];
      $row['cek'] = $cek;
      $data[] = $row;
      $i += 2;
    }
    if ($data == null) {
      $this->set_response([
        'status' => REST_Controller::HTTP_OK,
        'message' => "Get Data Detail Report Gagal",
        'data' => null,
      ]);
    } else {
      $this->set_response([
        'status' => REST_Controller::HTTP_OK,
        'message' => "Get Data Detail Report Berhasil",
        'data' => $data,
      ]);
    }
  }
}
