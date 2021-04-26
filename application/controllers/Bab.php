<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Bab
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

class Bab extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Jenjang_model', 'jenjang');
    $this->load->model('kelas_model', 'kelas');
    $this->load->model('Mapel_model', 'mapel');
    $this->load->model('Bab_model', 'bab');
  }

  public function sd($id = null)
  {
    $data['mapel'] = $this->mapel->get($id)->row();
    $data['kelas'] = $this->kelas->get($data['mapel']->kelas_id)->row();
    $data['jenjang'] = $this->jenjang->get($data['kelas']->jenjang_id)->row();

    $this->template->load('template', 'master/tes-menu/bab', $data);
  }

  public function smp($id = null)
  {
    $data['mapel'] = $this->mapel->get($id)->row();
    $data['kelas'] = $this->kelas->get($data['mapel']->kelas_id)->row();
    $data['jenjang'] = $this->jenjang->get($data['kelas']->jenjang_id)->row();
    $this->template->load('template', 'master/tes-menu/bab', $data);
  }

  public function sma($id = null)
  {
    $data['mapel'] = $this->mapel->get($id)->row();
    $data['kelas'] = $this->kelas->get($data['mapel']->kelas_id)->row();
    $data['jenjang'] = $this->jenjang->get($data['kelas']->jenjang_id)->row();
    $this->template->load('template', 'master/tes-menu/bab', $data);
  }

  public function getAjax($id = null)
  {
    $list = $this->bab->getDataTables($id);
    $data = [];
    $no = @$_POST['start'];
    foreach ($list as $bab) {
      $no++;
      $row = [];
      $row[] = $no . '.';
      $row[] = $bab->nama_bab;
      $row[] = $bab->semester == 1 ? 'Semester 1' : 'Semester 2';
      $row[] = $bab->created;
      $row[] = $bab->updated;
      $row[] = '
          <a  href="' . site_url("paket/index/") . $bab->id_bab . '" class="btn btn-primary has-ripple"><i class="feather mr-2 icon-edit"></i>Daftar Paket Soal<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></a>
          <button type="button" value="' . $bab->id_bab . '" class="btn btn-success has-ripple update"><i class="feather mr-2 icon-edit"></i>Update<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
          <button type="button" value="' . $bab->id_bab . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
      ';

      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->bab->countAll(),
      'recordsFiltered' => $this->bab->countFiltered($id),
      'data' => $data
    ];
    echo json_encode($output);
  }

  public function get()
  {
    $get = $this->input->get(null, TRUE);
    $query = $this->bab->get($get['id']);
    echo json_encode($query->row());
  }

  public function listBab()
  {
    $id_mapel = $this->input->post('id_mapel');
    $semester = $this->input->post('semester');

    $babs = $this->bab->get(null, $id_mapel, $semester)->result();

    $lists = "<option value=''>Pilih Bab</option>";

    foreach ($babs as $data) {
      $lists .= "<option value='" . $data->id_bab . "'>" . $data->nama_bab . "</option>";
    }

    $callback = array('list_bab' => $lists);

    echo json_encode($callback);
  }

  public function add()
  {
    $post = $this->input->post(null, TRUE);

    $this->form_validation->set_rules('mapel_id', 'mapel', 'required');
    $this->form_validation->set_rules('nama_bab', 'bab', 'required');
    $this->form_validation->set_rules('semester', 'Semester', 'required');
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    } else {
      $data = $this->bab->create($post);
      echo json_encode($data);
    }
  }

  public function update()
  {
    $post = $this->input->post(null, TRUE);

    $this->form_validation->set_rules('mapel_id', 'mapel', 'required');
    $this->form_validation->set_rules('nama_bab', 'bab', 'required');
    $this->form_validation->set_rules('semester', 'Semester', 'required');
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    } else {
      $data = $this->bab->update($post);
      echo json_encode($data);
    }
  }

  public function delete()
  {
    $post = $this->input->post(null, TRUE);
    $data = $this->bab->delete($post['id']);
    echo json_encode($data);
  }
}


/* End of file Bab.php */
/* Location: ./application/controllers/Bab.php */