<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Mapel
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

class Mapel extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Jenjang_model', 'jenjang');
    $this->load->model('Kelas_model', 'kelas');
    $this->load->model('Bab_model', 'bab');
    $this->load->model('Mapel_model', 'mapel');
    $this->load->model('Paket_model', 'paket');
  }

  public function sd($id = null)
  {
    $data['kelas'] = $this->kelas->get($id)->row();
    $data['jenjang'] = $this->jenjang->get($data['kelas']->jenjang_id)->row();
    $this->template->load('template', 'master/tes-menu/mapel', $data);
  }

  public function smp($id = null)
  {
    $data['kelas'] = $this->kelas->get($id)->row();
    $data['jenjang'] = $this->jenjang->get($data['kelas']->jenjang_id)->row();
    $this->template->load('template', 'master/tes-menu/mapel', $data);
  }

  public function sma($id = null, $video = null)
  {
    $data['kelas'] = $this->kelas->get($id)->row();
    $data['jenjang'] = $this->jenjang->get($data['kelas']->jenjang_id)->row();
    if (is_null($video)) $this->template->load('template', 'master/tes-menu/mapel', $data);
    else $this->template->load('template', 'master/video-menu/mapel', $data);
  }

  public function lainnya($id = null, $video = null, $id_kelas = null)
  {
    if (!is_null($id)) {
      $data['paket'] = $this->paket->get($id)->row();
      $data['kelas'] = $this->kelas->get($data['paket']->kelas_id)->row();
      $data['jenjang'] = 4;
    } else {
      $data['kelas'] = $this->kelas->get($id_kelas)->row();
      $data['jenjang'] = $this->jenjang->get($data['kelas']->jenjang_id)->row();
      $data['paket'] = $this->paket->get(null, null, $id_kelas)->result();
    }
    if ($video == "null") $this->template->load('template', 'master/tes-menu/mapel_lainnya', $data);
    else $this->template->load('template', 'master/video-menu/mapel_lainnya', $data);
  }

  public function getAjax($id)
  {
    $kelas = $this->kelas->get($id)->row();
    $jenjang = $this->jenjang->get($kelas->jenjang_id)->row();
    $list = $this->mapel->getDataTables($id);
    $data = [];
    $no = @$_POST['start'];
    foreach ($list as $mapel) {
      $no++;
      $row = [];
      $row[] = $no . '.';
      $row[] = $mapel->nama_mapel;
      $row[] = $mapel->created;
      $row[] = $mapel->updated;
      $row[] = '<a  href="' . site_url("bab/$jenjang->nama_jenjang/$mapel->id_mapel") . '" class="btn btn-primary has-ripple"><i class=" mr-2 fas fa-clipboard-list"></i>Daftar Bab<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></a>
      <button type="button" value="' . $mapel->id_mapel . '" class="btn btn-success has-ripple update"><i class="feather mr-2 icon-edit"></i>Update<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
      <button type="button" value="' . $mapel->id_mapel . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>';
      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->mapel->countAll(),
      'recordsFiltered' => $this->mapel->countFiltered($id),
      'data' => $data
    ];
    echo json_encode($output);
  }

  public function getAjaxVideo($id = null)
  {
    $kelas = $this->kelas->get($id)->row();
    $jenjang = $this->jenjang->get($kelas->jenjang_id)->row();
    $list = $this->mapel->getDataTables($id);
    $data = [];
    $no = @$_POST['start'];
    foreach ($list as $mapel) {
      $no++;
      $row = [];
      $row[] = $no . '.';
      $row[] = $mapel->nama_mapel;
      $row[] = $mapel->created;
      $row[] = $mapel->updated;
      $row[] = '<a  href="' . site_url("bab/$jenjang->nama_jenjang/$mapel->id_mapel/video") . '" class="btn btn-primary has-ripple"><i class=" mr-2 fas fa-clipboard-list"></i>Daftar Bab<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></a>
      <button type="button" value="' . $mapel->id_mapel . '" class="btn btn-success has-ripple update"><i class="feather mr-2 icon-edit"></i>Update<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
      <button type="button" value="' . $mapel->id_mapel . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>';
      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->mapel->countAll(),
      'recordsFiltered' => $this->mapel->countFiltered($id),
      'data' => $data
    ];
    echo json_encode($output);
  }

  public function getAjaxLainnya($id_paket)
  {
    $paket = $this->paket->get($id_paket)->row();
    $list = $this->mapel->getDataTablesLainnya($id_paket);
    $data = [];
    $no = @$_POST['start'];
    foreach ($list as $mapel) {
      $no++;
      $row = [];
      $row[] = $no . '.';
      $row[] = $mapel->nama_mapel;
      $row[] = $mapel->created;
      $row[] = $mapel->updated;
      $row[] = '<a  href="' . site_url("soal/index/$paket->id_paket/$mapel->id_mapel") . '" class="btn btn-primary has-ripple"><i class=" mr-2 fas fa-clipboard-list"></i>Daftar Soal<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></a>
      <button type="button" value="' . $mapel->id_mapel . '" class="btn btn-success has-ripple update"><i class="feather mr-2 icon-edit"></i>Update<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
      <button type="button" value="' . $mapel->id_mapel . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>';
      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->mapel->countAll(),
      'recordsFiltered' => $this->mapel->countFiltered($id_paket),
      'data' => $data
    ];
    echo json_encode($output);
  }

  public function getAjaxLainnyaVideo($id_paket)
  {
    $list = $this->mapel->getDataTablesLainnya($id_paket);
    $data = [];
    $no = @$_POST['start'];
    foreach ($list as $mapel) {
      $no++;
      $row = [];
      $row[] = $no . '.';
      $row[] = $mapel->nama_mapel;
      $row[] = $mapel->created;
      $row[] = $mapel->updated;
      $row[] = '
        <a  href="' . site_url("video/index/$mapel->id_mapel") . '" class="btn btn-primary has-ripple"><i class="feather mr-2 icon-edit"></i>Daftar Video<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></a>
        <button type="button" value="' . $mapel->id_mapel . '" class="btn btn-success has-ripple update"><i class="feather mr-2 icon-edit"></i>Update<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
        <button type="button" value="' . $mapel->id_mapel . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>';
      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->mapel->countAll(),
      'recordsFiltered' => $this->mapel->countFiltered($id_paket),
      'data' => $data
    ];
    echo json_encode($output);
  }

  public function get()
  {
    $get = $this->input->get(null, TRUE);
    $query = $this->mapel->get($get['id']);
    echo json_encode($query->row());
  }

  public function listMapel()
  {
    $id_kelas = $this->input->post('id_kelas');

    $mapels = $this->mapel->get(null, $id_kelas, null)->result();

    $lists = "<option value=''>Pilih Mapel</option>";

    foreach ($mapels as $data) {
      $lists .= "<option value='" . $data->id_mapel . "'>" . $data->nama_mapel . "</option>";
    }

    $callback = array('list_mapel' => $lists);

    echo json_encode($callback);
  }

  public function listMapelLainnya()
  {
    if (NULL !== ($this->input->post('id_paket'))) {
      $id_paket = $this->input->post('id_paket');
    } elseif (NULL !== ($this->input->post('id_kelas'))) {
      $id_kelas = $this->input->post('id_kelas');
      $id_paket = $this->paket->get(null, null, $id_kelas)->result();
    }
    $mapels_lainnya = $this->mapel->get(null, null, $id_paket)->result();

    $lists = "<option value=''>Pilih Mapel</option>";

    foreach ($mapels_lainnya as $data) {
      $lists .= "<option value='" . $data->id_mapel . "'>" . $data->nama_mapel . "</option>";
    }

    $callback = array('list_mapel_lainnya' => $lists);

    echo json_encode($callback);
  }

  public function add()
  {
    $post = $this->input->post(null, TRUE);

    $this->form_validation->set_rules('nama_mapel', 'Mapel', 'required');
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    } else {
      if ($this->input->post('kelas_id') == false) {
        $data = $this->mapel->createLainnya($post);
      } elseif ($this->input->post('paket_id') == false) {
        $data = $this->mapel->create($post);
      }
      echo json_encode($data);
    }
  }

  public function update()
  {
    $post = $this->input->post(null, TRUE);

    $this->form_validation->set_rules('nama_mapel', 'Mapel', 'required');
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    } else {
      if ($this->input->post('kelas_id') == false) {
        $data = $this->mapel->updateLainnya($post);
      } elseif ($this->input->post('paket_id') == false) {
        $data = $this->mapel->update($post);
      }
      echo json_encode($data);
    }
  }

  public function delete()
  {
    $post = $this->input->post(null, TRUE);
    $data = $this->mapel->delete($post['id']);
    echo json_encode($data);
  }
}


/* End of file Mapel.php */
/* Location: ./application/controllers/Mapel.php */