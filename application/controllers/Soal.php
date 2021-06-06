<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Soal
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

class Soal extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('Soal_model', 'soal');
    $this->load->model('Paket_model', 'paket');
    $this->load->model('Mapel_model', 'mapel');
  }

  public function index($id = NULL, $id_mapel = NULL)
  {
    $data['paket'] = $this->paket->get($id)->row();
    $data['mapel'] = $this->mapel->get($id_mapel)->row();
    $data['soal'] = $this->soal->get($id_mapel)->row();
    $this->template->load('template', 'master/tes-menu/soal', $data);
  }

  public function getAjax($id, $id_mapel)
  {
    $list = $this->soal->getDataTables($id, $id_mapel);
    $data = [];
    $no = @$_POST['start'];
    foreach ($list as $soal) {
      $no++;
      $row = [];
      $row[] = $no . '.';
      $row[] = html_entity_decode($soal->soal);
      $row[] = html_entity_decode($soal->option_a);
      $row[] = html_entity_decode($soal->option_b);
      $row[] = html_entity_decode($soal->option_c);
      $row[] = html_entity_decode($soal->option_d);
      $row[] = html_entity_decode($soal->option_e);
      $row[] = html_entity_decode($soal->jawaban_benar);
      $row[] = '
          <button type="button" value="' . $soal->id_soal . '" class="btn btn-success has-ripple update"><i class="feather mr-2 icon-edit"></i>Update<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
          <button type="button" value="' . $soal->id_soal . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
      ';

      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->soal->countAll(),
      'recordsFiltered' => $this->soal->countFiltered($id),
      'data' => $data
    ];
    echo json_encode($output);
  }

  public function get()
  {
    $get = $this->input->get(null, TRUE);
    if ($get == null) {
      $query = $this->soal->get();
      echo json_encode($query->result_array());
    } else {
      $query = $this->soal->get($get['id']);
      echo json_encode($query->row());
    }
  }

  public function add()
  {
    $post = $this->input->post();

    $this->form_validation->set_rules('soal', 'soal', 'required');
    $this->form_validation->set_rules('paket_id', 'paket_id', 'required');
    $this->form_validation->set_rules('mapel_id', 'mapel_id', 'required');
    $this->form_validation->set_rules('option_a', 'option_a', 'required');
    $this->form_validation->set_rules('option_b', 'option_b', 'required');
    $this->form_validation->set_rules('option_c', 'option_c', 'required');
    $this->form_validation->set_rules('option_d', 'option_d', 'required');
    $this->form_validation->set_rules('option_e', 'option_e', 'required');
    $this->form_validation->set_rules('jawaban_benar', 'jawaban_benar', 'required');
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    } else {
      $data = $this->soal->create($post);
      echo json_encode($data);
    }
  }

  public function update()
  {
    $post = $this->input->post(null, TRUE);

    $this->form_validation->set_rules('soal', 'soal', 'required');
    $this->form_validation->set_rules('option_a', 'option_a', 'required');
    $this->form_validation->set_rules('option_b', 'option_b', 'required');
    $this->form_validation->set_rules('option_c', 'option_c', 'required');
    $this->form_validation->set_rules('option_d', 'option_d', 'required');
    $this->form_validation->set_rules('option_e', 'option_e', 'required');
    $this->form_validation->set_rules('jawaban_benar', 'jawaban_benar', 'required');
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    }else {
      $data = $this->soal->update($post);
      echo json_encode($data);
    }
  }

  public function delete()
  {
    $post = $this->input->post(null, TRUE);
    $data = $this->soal->delete($post['id']);
    echo json_encode($data);
  }
}


/* End of file Soal.php */
/* Location: ./application/controllers/Soal.php */