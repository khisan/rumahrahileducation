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
    $this->template->load('template', 'tes/paket', $data);
  }

  public function getAjax($id = null)
  {
    $list = $this->paket->getDataTables($id);
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
      $row[] = '
          <a  href="' . site_url("soal/index/") . $paket->id_paket . '" class="btn btn-primary has-ripple"><i class="feather mr-2 icon-edit"></i>Daftar Soal<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></a>
          <button type="button" value="' . $paket->id_paket . '" class="btn btn-success has-ripple update"><i class="feather mr-2 icon-edit"></i>Update<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
          <button type="button" value="' . $paket->id_paket . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
      ';

      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->paket->countAll(),
      'recordsFiltered' => $this->paket->countFiltered($id),
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

  public function add()
  {
    $post = $this->input->post(null, TRUE);

    $this->form_validation->set_rules('bab_id', 'Bab', 'required');
    $this->form_validation->set_rules('nama_paket', 'Paket', 'required');
    $this->form_validation->set_rules('waktu', 'Waktu', 'required');
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    } else {
      $data = $this->paket->create($post);
      echo json_encode($data);
    }
  }

  public function update()
  {
    $post = $this->input->post(null, TRUE);

    $this->form_validation->set_rules('latihan_id', 'Latihan', 'required');
    $this->form_validation->set_rules('nama_paket', 'Paket', 'required');
    $this->form_validation->set_rules('waktu', 'Waktu', 'required');
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    } else {
      $data = $this->paket->update($post);
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