<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Pengajar
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

class Pengajar extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('Pengajar_model', 'pengajar');
    $this->load->model('Siswa_model', 'siswa');
  }

  public function get($id = null)
  {
    $data['siswa'] = $this->siswa->get($id)->row();
    $this->template->load('template', 'user/pengajar_siswa', $data);
  }
  public function getAjax($id = null)
  {
    $list = $this->pengajar->getDataTables($id);
    $data = [];
    $no = @$_POST['start'];
    foreach ($list as $pengajar) {
      $no++;
      $row = [];
      $row[] = $no . '.';
      $row[] = $pengajar->mapel_guru_id;
      $row[] = $pengajar->nama;
      $row[] = $pengajar->mapel;
      $row[] = $pengajar->created;
      $row[] = $pengajar->updated;
      $row[] = '
          <button type="button" value="' . $pengajar->id_code_guru . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
      ';

      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->pengajar->countAll(),
      'recordsFiltered' => $this->pengajar->countFiltered(),
      'data' => $data
    ];
    echo json_encode($output);
  }
  public function add()
  {
    $post = $this->input->post(null, TRUE);


    $this->form_validation->set_rules('mapel_guru_id', 'Id Guru', 'required');
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    } else {
      $data = $this->pengajar->create($post);
      echo json_encode($data);
    }
  }
  public function delete()
  {
    $post = $this->input->post(null, TRUE);
    $query = $this->pengajar->delete($post['id']);
    echo json_encode($query);
  }
}


/* End of file Pengajar.php */
/* Location: ./application/controllers/Pengajar.php */