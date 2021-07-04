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

  public function index($siswa_profile_id)
  {
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

  // public function nilai()
  // {
  //   $paket_id = $this->input->post('paket_id');
  //   $mapel_id = $this->input->post('mapel_id');
  //   $siswa_profile_id = $this->input->post('siswa_profile_id');
  //   var_dump($siswa_profile_id, $paket_id, $mapel_id);
  //   $data['nama'] = $this->siswa->getSiswa($siswa_profile_id);
  //   // echo $data['nama'];
  //   $data['nilai'] = $this->h_test->getNilai($paket_id, $mapel_id, $siswa_profile_id);
  //   $this->template->load('template', 'user/nilai', $data);
  // }
}
