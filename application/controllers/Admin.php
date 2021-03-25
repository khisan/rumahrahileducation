<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Admin
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

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
  }

  public function index()
  {
    $this->template->load('template', 'user/admin');
  }

  public function getAjax()
  {
    $list = $this->admin->getDataTables();
    $data = [];
    $no = @$_POST['start'];
    foreach ($list as $admin) {
      $no++;
      $row = [];
      $row[] = $no . '.';
      $row[] = $admin->username;
      $row[] = $admin->name;
      $row[] = $admin->password;
      $row[] = $admin->created;
      $row[] = $admin->updated;
      $row[] = '
          <button type="button" value="' . $admin->id_admin . '" class="btn btn-success has-ripple update"><i class="feather mr-2 icon-edit"></i>Update<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
          <button type="button" value="' . $admin->id_admin . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
      ';

      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->admin->countAll(),
      'recordsFiltered' => $this->admin->countFiltered(),
      'data' => $data
    ];
    echo json_encode($output);
  }

  public function add()
  {
    $post = $this->input->post(null, TRUE);

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('password1', 'Password', 'required|min_length[8]', [
      'min_length' => '%s minimal 8 karakter'
    ]);
    $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password1]', [
      'matches' => '%s tidak sesuai dengan Password'
    ]);
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    } else {
      $data = $this->admin->create($post);
      echo json_encode($data);
    }
  }
  public function get()
  {
    $get = $this->input->get(null, TRUE);
    if ($get == null) {
      $query = $this->admin->get();
      echo json_encode($query->result_array());
    } else {
      $query = $this->admin->get($get['id']);
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
      $data = $this->admin->update($post);
      echo json_encode($data);
    }
  }

  public function delete()
  {
    $post = $this->input->post(null, TRUE);
    $data = $this->admin->delete($post['id']);
    echo json_encode($data);
  }
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */