<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_test extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('Jenjang_model', 'jenjang');
    $this->load->model('Kelas_model', 'kelas');
    $this->load->model('Mapel_model', 'mapel');
    $this->load->model('Bab_model', 'bab');
    $this->load->model('Paket_model', 'paket');
    $this->load->model('Siswa_model', 'siswa');
    $this->load->model('Test_model', 'test');
    $this->load->model('H_test_model', 'h_test');
  }

  public function index()
  {
    $data['jenjang'] = $this->jenjang->get()->result_array();
    $data['kelas'] = $this->kelas->get()->result();
    $data['mapel'] = $this->mapel->get()->result();
    $data['bab'] = $this->bab->get()->result();
    $data['paket'] = $this->paket->get()->result();
    $this->template->load('template', 'master/report/cari_report_test', $data);
  }

  public function hasilReportTest()
  {
    $data['paket_id'] = $this->input->post('paket');
    if ($this->input->post('mapel') != null) {
      $data['mapel_id'] = $this->input->post('mapel');
    } else {
      $data['mapel_id'] = $this->input->post('mapel_lainnya');
    }
    $data['siswa_profile_id'] = $this->input->post('siswa');
    $this->template->load('template', 'master/report/report_test', $data);
  }

  public function getAjax($paket_id, $mapel_id, $siswa_profile_id)
  {
    $list = $this->h_test->getDataTablesReport($paket_id, $mapel_id, $siswa_profile_id);
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
      'recordsTotal' => $this->h_test->countAllreport($paket_id, $mapel_id, $siswa_profile_id),
      'recordsFiltered' => $this->h_test->countFilteredreport($paket_id, $mapel_id, $siswa_profile_id),
      'data' => $data
    ];
    echo json_encode($output);
  }
}
