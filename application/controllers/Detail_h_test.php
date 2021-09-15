<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_h_test extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('Detail_h_test_model', 'detail_h_test');
    $this->load->model('Test_model', 'test');
    $this->load->model('Siswa_model', 'siswa');
  }

  public function index($id_h_test)
  {
    $data['h_test'] = $this->detail_h_test->get($id_h_test)->row();
    $this->template->load('template', 'user/detail_hasil_test', $data);
  }

  public function getAjax($id_h_test)
  {
    $list = $this->detail_h_test->getDataTables($id_h_test);
    $list_jawaban = $this->test->getJawaban($id_h_test)->row()->list_jawaban;
    $preg_jawaban = trim(preg_replace("/[^A-Za-z]/", "", $list_jawaban));
    $pc_jawaban = explode(",", $preg_jawaban);
    $data = [];
    $no = @$_POST['start'];
    $i = 0;
    foreach ($list as $detail_h_test) {
      $cek = $preg_jawaban[$i] == $detail_h_test->jawaban_benar ? "Benar" : "Salah";
      $no++;
      $row = [];
      $row[] = $no . '.';
      $row[] = $preg_jawaban[$i];
      $row[] = $detail_h_test->jawaban_benar;
      $row[] = $cek;
      $data[] = $row;
      $i++;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->detail_h_test->countAll($id_h_test),
      'recordsFiltered' => $this->detail_h_test->countFiltered($id_h_test),
      'data' => $data
    ];
    echo json_encode($output);
  }
}
