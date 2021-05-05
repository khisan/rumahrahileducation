<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
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
    $this->load->model('Soal_model', 'soal');
  }

  public function index($jenjang, $kelas)
  {
    $data['id_jenjang'] = $jenjang;
    $data['id_kelas'] = $kelas;
    $data['jenjang'] = $this->jenjang->get($jenjang)->row();
    $data['kelas'] = $this->kelas->get($kelas)->row();
    $data['mapel'] = $this->mapel->get()->result();
    $data['bab'] = $this->bab->get()->result();
    $data['paket'] = $this->paket->get()->result();
    $this->template->load('template', 'user/test', $data);
  }

  public function mulaiTest()
  {
    $mapel_id = $this->input->post('mapel');
    $paket_id = $this->input->post('paket');
    // $soal = array();
    $data = $this->soal->get($id = null, $paket_id, $mapel_id)->result();
    // $soal[] = $data;
    $html = '';
    $no = 1;
    $url = base_url("uploads/soal/");
    $arr_opsi = array("a", "b", "c", "d", "e");
    foreach ($data as $test) {
      $html .= '<div class="step" id="widget_' . $no . '">';
      $html .= '<img src=' . $url . $test->soal_gambar . ' alt="..." class="img-thumbnail">';
      $html .= '<p style="font-size: 20px;">' . $test->soal_text . '</p>';
      $html .= '<div class="funkyradio">';
      for ($i = 0; $i < 5; $i++) {
        $opsi = "option_" . $arr_opsi[$i];
        $pilihan_opsi = !empty($test->$opsi) ? $test->$opsi : "";
        $html .= '<div class="funkyradio-success"><input type="radio" name="radio" id="radio1"/>';
        $html .= '<label for=""><div class="huruf_opsi">' . $arr_opsi[$i] . '</div>';
        $html .= '<p>' . $pilihan_opsi . '</p></label></div>';
      }
      $html .= '</div></div>';
      $no++;
    }
    $data = array(
      'html' => $html,
      'no'   => $no
    );
    $this->template->load('template', 'user/mulai_test', $data);
  }
}
