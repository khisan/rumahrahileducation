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

  public function sma($id = null)
  {
    $data['kelas'] = $this->kelas->get($id)->row();
    $data['jenjang'] = $this->jenjang->get($data['kelas']->jenjang_id)->row();
    $this->template->load('template', 'master/tes-menu/mapel', $data);
  }

  public function lainnya($id = null, $id_paket = null)
  {
    $data['paket'] = $this->paket->get($id_paket)->row();
    $data['kelas'] = $this->kelas->get($id)->row();
    $data['jenjang'] = $this->jenjang->get($data['kelas']->jenjang_id)->row();
    $this->template->load('template', 'master/tes-menu/mapel', $data);
  }

  public function getAjax($id = null, $id_paket = null)
  {
    $id_user = $this->session->userdata('userid');
    $paket = $this->paket->get($id_paket)->row();
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
      $row[] = '
        ' . (($jenjang->id_jenjang == '4' && is_numeric($id_user) == true) ?
        '<a  href="' . site_url("soal/index/$paket->id_paket/$mapel->id_mapel") . '" class="btn btn-primary has-ripple"><i class=" mr-2 fas fa-clipboard-list"></i>Daftar Soal<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></a>
        <button type="button" value="' . $mapel->id_mapel . '" class="btn btn-success has-ripple update"><i class="feather mr-2 icon-edit"></i>Update<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
        <button type="button" value="' . $mapel->id_mapel . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>'
        : (($jenjang->id_jenjang != '4' && is_numeric($id_user) == true) ?
          '<a  href="' . site_url("bab/$jenjang->nama_jenjang/") . $mapel->id_mapel . '" class="btn btn-primary has-ripple"><i class=" mr-2 fas fa-clipboard-list"></i>Daftar Bab<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></a>
        <button type="button" value="' . $mapel->id_mapel . '" class="btn btn-success has-ripple update"><i class="feather mr-2 icon-edit"></i>Update<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
        <button type="button" value="' . $mapel->id_mapel . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>'
          : ((is_numeric($id_user) == false) ?
            '<a  href="' . site_url("soal/index/$paket->id_paket/$mapel->id_mapel") . '" class="btn btn-primary has-ripple"><i class=" mr-2 fas fa-clipboard-list"></i>Daftar Soal<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></a>'
            :
            '<a  href="' . site_url("soal/index/$paket->id_paket/$mapel->id_mapel") . '" class="btn btn-primary has-ripple"><i class=" mr-2 fas fa-clipboard-list"></i>Daftar Soal<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></a>
            <button type="button" value="' . $mapel->id_mapel . '" class="btn btn-success has-ripple update"><i class="feather mr-2 icon-edit"></i>Update<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
            <button type="button" value="' . $mapel->id_mapel . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>')));
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

  public function get()
  {
    $get = $this->input->get($id = null, $id_kelas = null);
    if ($id == null && $id_kelas = null) {
      $query = $this->mapel->get();
      echo json_encode($query->result_array());
    } elseif ($id_kelas = null) {
      $query = $this->mapel->get($get['id']);
      echo json_encode($query->row());
    }
  }

  public function add()
  {
    $post = $this->input->post(null, TRUE);

    $this->form_validation->set_rules('kelas_id', 'Kelas', 'required');
    $this->form_validation->set_rules('nama_mapel', 'Mapel', 'required');
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    } else {
      $data = $this->mapel->create($post);
      echo json_encode($data);
    }
  }

  public function update()
  {
    $post = $this->input->post(null, TRUE);

    $this->form_validation->set_rules('kelas_id', 'Kelas', 'required');
    $this->form_validation->set_rules('nama_mapel', 'Mapel', 'required');
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    } else {
      $data = $this->mapel->update($post);
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