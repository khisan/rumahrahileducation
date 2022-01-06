<?php
defined('BASEPATH') or exit('No direct script access allowed');

class H_test extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('H_test_model', 'h_test');
    $this->load->model('Siswa_model', 'siswa');
  }

  public function index()
  {
    $siswa_profile_id = $this->session->userdata('userid');
    $data['siswa'] = $this->h_test->getAllData($siswa_profile_id)->row();
    $this->template->load('template', 'user/hasil_test', $data);
  }

  public function getAjax($siswa_profile_id)
  {
    $list = $this->h_test->getDataTables($siswa_profile_id);
    $data = [];
    $no = @$_POST['start'];
    foreach ($list as $h_test) {
      $no++;
      $row = [];
      $row[] = $no . '.';
      $row[] = $h_test->nama_paket;
      $row[] = $h_test->nama_mapel;
      $row[] = $h_test->nama;
      $row[] = $h_test->nilai;
      $row[] = $h_test->tgl_test;
      $row[] = '
          <a href= "' . base_url("Detail_h_test/index/$h_test->id_h_test") . '" class="btn btn-success has-ripple detail"><i class="feather mr-2 icon-edit"></i>Detail Test <span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></a>
      ';
      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->h_test->countAll($siswa_profile_id),
      'recordsFiltered' => $this->h_test->countFiltered($siswa_profile_id),
      'data' => $data
    ];
    echo json_encode($output);
  }
}
