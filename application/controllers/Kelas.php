<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller SdKelas
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Kelas extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kelas_model', 'kelas');
  }

  public function SD()
  {
    $data['jenjang'] = 'SD' or 1;
    $data['kelas'] = $this->kelas->get(null, "SD")->result();
    $this->template->load('template', 'master/tes-menu/kelas', $data);
  }

  public function SMP()
  {
    $data['jenjang'] = 'SMP' or 2;
    $data['kelas'] = $this->kelas->get(null, "SMP")->result();
    $this->template->load('template', 'master/tes-menu/kelas', $data);
  }

  public function SMA()
  {
    $data['jenjang'] = 'SMA' or 3;
    $data['kelas'] = $this->kelas->get(null, "SMA")->result();
    $this->template->load('template', 'master/tes-menu/kelas', $data);
  }

  public function Lainnya()
  {
    $data['jenjang'] = 'Lainnya' or 4;
    $data['kelas'] = $this->kelas->get(null, "Lainnya")->result();
    $this->template->load('template', 'master/tes-menu/kelas', $data);
  }

  public function listKelas()
  {
    $jenjang_id = $this->input->post('jenjang_id');

    $kelas = $this->kelas->get(null, $jenjang_id)->result();

    $lists = "<option value=''>Pilih Kelas</option>";

    foreach ($kelas as $data) {
      $lists .= "<option value='" . $data->id_kelas . "'>" . $data->nama_kelas . "</option>";
    }

    $callback = array('list_kelas' => $lists);

    echo json_encode($callback);
  }

  public function listJurusanSma()
  {
    $jenjang_id = $this->input->post('jenjang_id');

    $jurusan = $this->kelas->getJurusanSma($jenjang_id)->result();

    $lists = "<option value=''>Pilih Jurusan</option>";

    foreach ($jurusan as $data) {
      $lists .= "<option value='" . $data->id_kelas . "'>" . $data->jurusan . "</option>";
    }

    $callback = array('list_jurusan_sma' => $lists);

    echo json_encode($callback);
  }

  public function listJurusanLainnya()
  {
    $kelas_id = $this->input->post('kelas_id');

    $jurusan = $this->kelas->getJurusanLainnya($kelas_id)->result();

    $lists = "<option value=''>Pilih Jurusan</option>";

    foreach ($jurusan as $data) {
      $lists .= "<option value='" . $data->id_kelas . "'>" . $data->jurusan . "</option>";
    }

    $callback = array('list_jurusan_lainnya' => $lists);

    echo json_encode($callback);
  }
}


/* End of file SdKelas.php */
/* Location: ./application/controllers/SdKelas.php */