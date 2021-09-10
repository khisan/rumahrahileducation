<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Privatemanagement extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('Private_model', 'private');
    $this->load->model('Jenjang_model', 'jenjang');
    $this->load->model('Kelas_model', 'kelas');
  }

  public function index()
  {
    $data['jenjang'] = $this->jenjang->get();
    $data['kelas'] = $this->kelas->get();
    $data['jurusan'] = $this->kelas->getJurusan();
    $this->template->load('template', 'master/user/private', $data);
  }

  public function getAjax()
  {
    $list = $this->private->getDataTables();
    $data = [];
    $no = @$_POST['start'];
    foreach ($list as $private) {
      $no++;
      $row = [];
      $row[] = $no . '.';
      $row[] = $private->nama;
      $row[] = $private->jenjang_name;
      $row[] = $private->kelas_name;
      $row[] = $private->jurusan;
      $row[] = $private->sekolah;
      $row[] = $private->alamat;
      $row[] = $private->email;
      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->private->countAll(),
      'recordsFiltered' => $this->private->countFiltered(),
      'data' => $data
    ];
    echo json_encode($output);
  }

  public function get()
  {
    $get = $this->input->get(null, TRUE);
    if ($get == null) {
      $query = $this->private->get();
      echo json_encode($query->result_array());
    } else {
      $query = $this->private->get($get['id']);
      echo json_encode($query->row());
    }
  }
}
