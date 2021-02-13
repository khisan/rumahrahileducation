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
    check_not_login();
    $this->load->model('Mapel_model', 'mapel');
    $this->load->model('Guru_model', 'guru');
    $this->load->model('Kelas_model', 'kelas');
  }

  public function get($id = null)
  {
    $data['guru'] = $this->guru->get($id)->row();
    $data['kelas'] = $this->kelas->get()->result();
    $this->template->load('template', 'user/guru_mapel', $data);
  }

  public function getAjax($id = null)
  {
    $list = $this->mapel->getDataTables($id);
    $data = [];
    $no = @$_POST['start'];
    foreach ($list as $mapel) {
      $no++;
      $row = [];
      $row[] = $no . '.';
      $row[] = $mapel->id_mapel_guru;
      $row[] = $mapel->mapel;
      $row[] = $mapel->kelas;
      $row[] = $mapel->sekolah;
      $row[] = $mapel->created;
      $row[] = $mapel->updated;
      $row[] = '
          <button type="button" value="' . $mapel->id_mapel_guru . '" class="btn btn-success has-ripple update"><i class="feather mr-2 icon-edit"></i>Update<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
          <button type="button" value="' . $mapel->id_mapel_guru . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
      ';

      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->mapel->countAll(),
      'recordsFiltered' => $this->mapel->countFiltered(),
      'data' => $data
    ];
    echo json_encode($output);
  }
  public function add()
  {
    $post = $this->input->post(null, TRUE);

    $this->form_validation->set_rules('mapel', 'Mapel', 'required');
    $this->form_validation->set_rules('kelas_id', 'Kelas', 'required');
    $this->form_validation->set_rules('sekolah', 'Sekolah', 'required');
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    } else {
      $post['id_mapel_guru'] = substr(md5(rand()), 0, 7);
      $data = $this->mapel->create($post);
      echo json_encode($data);
    }
  }
}


/* End of file Mapel.php */
/* Location: ./application/controllers/Mapel.php */