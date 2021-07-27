<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Paket
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

class Paket extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('Jenjang_model', 'jenjang');
    $this->load->model('Kelas_model', 'kelas');
    $this->load->model('Mapel_model', 'mapel');
    $this->load->model('Bab_model', 'bab');
    $this->load->model('Paket_model', 'paket');
  }

  public function index($id = null)
  {
    $data['bab'] = $this->bab->get($id)->row();
    $data['mapel'] = $this->mapel->get($data['bab']->mapel_id)->row();
    $data['kelas'] = $this->kelas->get($data['mapel']->kelas_id)->row();
    $data['jenjang'] = $this->jenjang->get($data['kelas']->jenjang_id)->row();
    $this->template->load('template', 'master/tes-menu/paket', $data);
  }

  public function lainnya($id_jenjang, $id_kelas)
  {
    $data['kelas'] = $this->kelas->get($id_kelas)->row();
    $data['jenjang'] = $this->jenjang->get($id_jenjang)->row();
    $this->template->load('template', 'master/tes-menu/paket_lainnya', $data);
  }

  public function getAjax($id_bab)
  {
    $list = $this->paket->getDataTables($id_bab);
    $kelas = $this->kelas->get($id_bab)->row();
    $jenjang = $this->jenjang->get($kelas->jenjang_id)->row();
    $data = [];
    $no = @$_POST['start'];
    foreach ($list as $paket) {
      $no++;
      $row = [];
      $row[] = $no . '.';
      $row[] = $paket->nama_paket;
      $row[] = $paket->waktu . ' Menit';
      $row[] = $paket->created;
      $row[] = $paket->updated;
      $row[] = '<a  href="' . site_url("soal/index/$paket->id_paket") . '" class="btn btn-primary has-ripple"><i class="feather mr-2 icon-edit"></i>Daftar Soal<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></a>
        <button type="button" value="' . $paket->id_paket . '" class="btn btn-success has-ripple update"><i class="feather mr-2 icon-edit"></i>Update<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
        <button type="button" value="' . $paket->id_paket . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>';
      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->paket->countAll(),
      'recordsFiltered' => $this->paket->countFiltered($id_bab),
      'data' => $data
    ];
    echo json_encode($output);
  }

  public function getAjaxLainnya($id_kelas)
  {
    $list = $this->paket->getDataTablesLainnya($id_kelas);
    // $kelas = $this->kelas->get($id_kelas)->row();
    // $jenjang = $this->jenjang->get($kelas->jenjang_id)->row();
    $data = [];
    $no = @$_POST['start'];
    foreach ($list as $paket) {
      $no++;
      $row = [];
      $row[] = $no . '.';
      $row[] = $paket->nama_paket;
      $row[] = $paket->waktu . ' Menit';
      $row[] = $paket->created;
      $row[] = $paket->updated;
      $row[] = '<a  href="' . site_url("soal/index/$paket->id_paket") . '" class="btn btn-primary has-ripple"><i class="feather mr-2 icon-edit"></i>Daftar Soal<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></a>
        <button type="button" value="' . $paket->id_paket . '" class="btn btn-success has-ripple update"><i class="feather mr-2 icon-edit"></i>Update<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
        <button type="button" value="' . $paket->id_paket . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>';
      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->paket->countAll(),
      'recordsFiltered' => $this->paket->countFilteredLainnya($id_kelas),
      'data' => $data
    ];
    echo json_encode($output);
  }

  public function get()
  {
    $get = $this->input->get(null, TRUE);
    $query = $this->paket->get($get['id']);
    echo json_encode($query->row());
  }

  public function listPaket()
  {
    $id_bab = $this->input->post('id_bab');

    $pakets = $this->paket->get(null, $id_bab, null)->result();

    $lists = "<option value=''>Pilih Paket</option>";

    foreach ($pakets as $data) {
      $lists .= "<option value='" . $data->id_paket . "'>" . $data->nama_paket . "</option>";
    }

    $callback = array('list_paket' => $lists);

    echo json_encode($callback);
  }

  public function listPaketLainnya()
  {
    $id_kelas = $this->input->post('id_kelas');

    $pakets_lainnya = $this->paket->get(null, null, $id_kelas)->result();

    $lists = "<option value=''>Pilih Paket</option>";

    foreach ($pakets_lainnya as $data) {
      $lists .= "<option value='" . $data->id_paket . "'>" . $data->nama_paket . "</option>";
    }

    $callback = array('list_paket_lainnya' => $lists);

    echo json_encode($callback);
  }

  public function getWaktu()
  {
    $id = $this->input->post('id_paket');

    $data = $this->paket->get($id, null, null)->row();

    $data = "<input type='hidden' name='waktu' value='" . $data->waktu . "'/>";

    $callback = array('waktu' => $data);

    echo json_encode($callback);
  }

  public function add()
  {
    $post = $this->input->post(null, TRUE);
    $this->form_validation->set_rules('bab_id', 'Bab ID');
    $this->form_validation->set_rules('mapel_id', 'Mapel ID');
    $this->form_validation->set_rules('nama_paket', 'Paket', 'required');
    $this->form_validation->set_rules('waktu', 'Waktu', 'required');
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    } else {
      if ($this->input->post('bab_id') == false) {
        $data = $this->paket->createLainnya($post);
      } elseif ($this->input->post('mapel_id') == false) {
        $data = $this->paket->create($post);
      }
      echo json_encode($data);
    }
  }

  public function update()
  {
    $post = $this->input->post(null, TRUE);
    $this->form_validation->set_rules('bab_id', 'Bab ID');
    $this->form_validation->set_rules('mapel_id', 'Mapel ID');
    $this->form_validation->set_rules('nama_paket', 'Paket', 'required');
    $this->form_validation->set_rules('waktu', 'Waktu', 'required');
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    } else {
      if ($this->input->post('bab_id') == false) {
        $data = $this->paket->updateLainnya($post);
      } elseif ($this->input->post('mapel_id') == false) {
        $data = $this->paket->update($post);
      }
      echo json_encode($data);
    }
  }

  public function delete()
  {
    $post = $this->input->post(null, TRUE);
    $data = $this->paket->delete($post['id']);
    echo json_encode($data);
  }
}


/* End of file Paket.php */
/* Location: ./application/controllers/Paket.php */