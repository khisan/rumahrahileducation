<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentor extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('Tentor_model', 'tentor');
  }

  public function index()
  {
    $this->template->load('template', 'master/user/tentor');
  }

  public function getAjax()
  {
    $list = $this->tentor->getDataTables();
    $data = [];
    $no = @$_POST['start'];
    foreach ($list as $tentor) {
      $no++;
      $row = [];
      $row[] = $no . '.';
      $row[] = $tentor->username;
      $row[] = $tentor->name;
      $row[] = $tentor->password;
      $row[] = '
          <button type="button" value="' . $tentor->id_tentor . '" class="btn btn-success has-ripple update"><i class="feather mr-2 icon-edit"></i>Update<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
          <button type="button" value="' . $tentor->id_tentor . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
      ';

      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->tentor->countAll(),
      'recordsFiltered' => $this->tentor->countFiltered(),
      'data' => $data
    ];
    echo json_encode($output);
  }

  public function add()
  {
    $post = $this->input->post(null, TRUE);
    $post['id_tentor'] = "tentor-" . substr(md5(rand()), 0, 5);

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    } else {
      $data = $this->tentor->create($post);
      echo json_encode($data);
    }
  }
  public function get()
  {
    $get = $this->input->get(null, TRUE);
    if ($get == null) {
      $query = $this->tentor->get();
      echo json_encode($query->result_array());
    } else {
      $query = $this->tentor->get($get['id']);
      echo json_encode($query->row());
    }
  }

  public function update()
  {
    $post = $this->input->post(null, TRUE);

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('name', 'Name', 'required');
    if ($this->input->post('password1')) {
      $this->form_validation->set_rules('password1', 'Password', 'required|min_length[8]', [
        'min_length' => '%s minimal 8 karakter'
      ]);
    }
    if ($this->input->post('password2')) {
      $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password1]', [
        'matches' => '%s tidak sesuai dengan Password'
      ]);
    }
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    } else {
      $data = $this->tentor->update($post);
      echo json_encode($data);
    }
  }

  public function delete()
  {
    $post = $this->input->post(null, TRUE);
    $data = $this->tentor->delete($post['id']);
    echo json_encode($data);
  }
}
