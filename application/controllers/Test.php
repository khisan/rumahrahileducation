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
    $this->load->model('Test_model', 'test');
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
    $post   = $this->input->post();
    $mapel_id = $this->input->post('mapel');
    $paket_id = $this->input->post('paket');
    $siswa_profile_id = $this->session->userdata('userid');
    $waktu = $this->session->userdata('waktu');
    $soal = $this->soal->get($id = null, $paket_id, $mapel_id)->result();
    $list_id_soal = "";
    $list_jw_soal   = "";
    foreach ($soal as $soal) {
      $list_id_soal .= $soal->id_soal . ",";
      $list_jw_soal .= $soal->id_soal . ":" . ",";
    }
    $list_id_soal = substr($list_id_soal, 0, -1);
    date_default_timezone_set("Asia/Jakarta");
    $tgl_test =  date("Y-m-d h:i:sa");

    $post['paket_id'] = $paket_id;
    $post['list_soal'] = $list_id_soal;
    $post['list_jawaban'] = $list_jw_soal;
    $post['siswa_profile_id'] = $siswa_profile_id;
    $post['tgl_test'] = $tgl_test;
    $post['jml_benar'] = 0;
    $post['nilai'] = 0;
    $data = $this->test->create($post);
    json_encode($data);

    $siswa_profile_id = $this->session->userdata('userid');
    $siswa_id   = $this->test->get($siswa_profile_id)->row();
    $mapel_id = $this->input->post('mapel');
    $paket_id = $this->input->post('paket');
    $waktu = $this->input->post('waktu');
    $data = $this->soal->get($id = null, $paket_id, $mapel_id)->result();
    $html = '';
    $no = 1;
    $url = base_url("uploads/soal/");
    $arr_opsi = array("a", "b", "c", "d", "e");
    foreach ($data as $test) {
      $html .= '<input type="hidden" name="id_soal_' . $no . '" value="' . $test->id_soal . '">';
      $html .= '<div class="step" id="widget_' . $no . '">';
      $html .= '<p style="font-size: 20px;">' . $test->soal . '</p>';
      $html .= '<div class="funkyradio">';
      for ($i = 0; $i < 5; $i++) {
        $opsi = "option_" . $arr_opsi[$i];
        $pilihan_opsi = !empty($test->$opsi) ? $test->$opsi : "";
        $html .= '<div class="funkyradio-success" onclick="return simpan_sementara();"><input type="radio" id="opsi_' . $arr_opsi[$i] . '_' . $test->id_soal . '" name="opsi_' . $no . '" value="' . $arr_opsi[$i] . '"/><label for="opsi_' . $arr_opsi[$i] . '_' . $test->id_soal . '"><div class="huruf_opsi">' . $arr_opsi[$i] . '</div><p>' . $pilihan_opsi . '</p></label></div>';
      }
      $html .= '</div></div>';
      $no++;
    }
    $data = array(
      'html' => $html,
      'no'   => $no,
      'siswa_profile_id' => $siswa_profile_id,
      'id_test' => $siswa_id->id_h_test,
      // 'soal_id' => $soal->id_soal,
      'waktu' => $waktu
    );
    $this->load->view('user/mulai_test', $data);
  }

  public function simpan_satu()
  {
    $post   = $this->input->post();
    $mapel_id = $this->input->post('mapel');
    $paket_id = $this->input->post('paket');
    $id_test = $this->input->post('id_test');
    $jml_soal = $this->input->post('jml_soal');
    $soal = $this->soal->get(null, $paket_id, $mapel_id)->result();
    $list_id_soal = "";
    foreach ($soal as $soal) {
      $list_id_soal .= $soal->id_soal . ",";
    }
    $list_id_soal = substr($list_id_soal, 0, -1);
    $list_jawaban   = "";
    for ($i = 1; $i < $jml_soal; $i++) {
      $jawab   = "opsi_" . $i;
      $id_soal   = "id_soal_" . $i;
      $jawaban   = empty($post[$jawab]) ? "" : $post[$jawab];
      $list_jawaban  .= "" . $post[$id_soal] . ":" . $jawaban . ",";
    }
    $list_jawaban  = substr($list_jawaban, 0, -1);
    $simpan = [
      'list_jawaban' => $list_jawaban
    ];
    $data = $this->test->update('tb_h_test', $simpan, 'id_h_test', $id_test);
    echo json_encode($data);
  }

  public function simpan_akhir()
  {
    $id_test = $this->input->post('id_test');
    // $soal_id = $this->input->post('soal_id');
    $siswa_profile_id = $this->input->post('siswa_profile_id');
    // var_dump($soal_id);

    $list_jawaban = $this->test->getJawaban($id_test)->row()->list_jawaban;

    // Pecah Jawaban
    $pc_jawaban = explode(",", $list_jawaban);

    $jumlah_benar   = 0;
    $jumlah_salah   = 0;
    $jumlah_soal  = sizeof($pc_jawaban);

    foreach ($pc_jawaban as $jwb) {
      $pc_dt     = explode(":", $jwb);
      $id_soal   = $pc_dt[0];
      $jawaban   = $pc_dt[1];

      $cek_jwb   = $this->soal->get($id_soal, null, null)->row();

      $jawaban == $cek_jwb->jawaban_benar ? $jumlah_benar++ : $jumlah_salah++;
    }
    var_dump($cek_jwb->jawaban_benar);


    $nilai = ($jumlah_benar / $jumlah_soal)  * 100;

    // for ($i = 1; $i < $pc_jawaban; $i++) {
    //   $jawab   = "opsi_" . $i;
    //   $id_soal   = "id_soal_" . $i;
    //   // $jawaban   = empty($post[$jawab]) ? "" : $post[$jawab];
    //   // $list_jawaban  .= "" . $post[$id_soal] . ":" . $jawaban . ",";
    // }
    // $list_jawaban  = substr($list_jawaban, 0, -1);

    $update = [
      // 'soal_id' => $soal_id,
      'siswa_profile_id' => $siswa_profile_id,
      'jml_benar'    => $jumlah_benar,
      'nilai'      => number_format(floor($nilai), 0),
      'list_jawaban_benar' => $jawaban
    ];

    $data = $this->test->update('tb_h_test', $update, 'id_h_test', $id_test);
    echo json_encode($data);
  }
}
