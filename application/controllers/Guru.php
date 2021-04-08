<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Guru
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

class Guru extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('Guru_model', 'guru');
  }

  public function index()
  {
    $this->template->load('template', '/master/user/guru');
  }

  public function getAjax()
  {
    $list = $this->guru->getDataTables();
    $data = [];
    $no = @$_POST['start'];
    foreach ($list as $guru) {
      $no++;
      $row = [];
      $row[] = $no . '.';
      $row[] = $guru->nama;
      $row[] = $guru->username;
      $row[] = $guru->alamat;
      $row[] = $guru->email;
      $row[] = $guru->password;
      $row[] = $guru->image != null ? '<img src="' . site_url('uploads/guru/') . $guru->image . '"  class="rounded mx-auto d-block" width="200px">' : '<img src="' . site_url('assets/able/assets/images/') . 'default.png" class="rounded mx-auto d-block" width="200px">';
      // $row[] = $guru->created;
      // $row[] = $guru->updated;
      $row[] = '
          <a href="' . site_url('guru/get/') . $guru->id_guru_profile . '" class="btn btn-primary has-ripple"><i class="feather mr-2 icon-list"></i>Lihat Mapel<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></a>
          <button type="button" value="' . $guru->id_guru_profile . '" class="btn btn-success has-ripple update"><i class="feather mr-2 icon-edit"></i>Update<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
          <button type="button" value="' . $guru->id_guru_profile . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
      ';

      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->guru->countAll(),
      'recordsFiltered' => $this->guru->countFiltered(),
      'data' => $data
    ];
    echo json_encode($output);
  }

  public function add()
  {
    $post = $this->input->post(null, TRUE);

    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tb_guru_profile.email]', [
      'valid_email' => '%s bukan email',
      'is_unique' => '%s sudah di pakai'
    ]);
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
      $post['id_guru_profile'] = "guru-" . date('ymd') . '-' . substr(md5(rand()), 0, 5);
      $config['upload_path']    = './uploads/guru/';
      $config['allowed_types']  = 'gif|png|jpg|jpeg';
      $config['max_size']       = 2048;
      $config['file_name']       = "guru-" . date('ymd') . '-' . substr(md5(rand()), 0, 10);

      $this->load->library('upload', $config);

      if (@$_FILES['image']['name'] != null) {
        if ($this->upload->do_upload('image')) {
          $post['image'] = $this->upload->data('file_name');
          $data = $this->guru->create($post);
          echo json_encode($data);
        } else {
          $error = $this->upload->display_errors();
          echo json_encode($error);
        }
      } else {
        $post['image'] = null;
        $data = $this->guru->create($post);
        echo json_encode($data);
      }
    }
  }
  public function get()
  {
    $get = $this->input->get(null, TRUE);
    if ($get == null) {
      $query = $this->guru->get();
      echo json_encode($query->result_array());
    } else {
      $query = $this->guru->get($get['id']);
      echo json_encode($query->row());
    }
  }

  public function update()
  {
    $post = $this->input->post(null, TRUE);

    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email', [
      'valid_email' => '%s bukan email',
      'is_unique' => '%s sudah di pakai'
    ]);
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
      $post['id_guru_profile'] = "guru-" . date('ymd') . '-' . substr(md5(rand()), 0, 5);
      $config['upload_path']    = './uploads/guru/';
      $config['allowed_types']  = 'gif|png|jpg|jpeg';
      $config['max_size']       = 2048;
      $config['file_name']       = "guru-" . date('ymd') . '-' . substr(md5(rand()), 0, 10);

      $this->load->library('upload', $config);

      if (@$_FILES['image']['name'] != null) {
        if ($this->upload->do_upload('image')) {
          $guru = $this->guru->get($post['id_guru'])->row();

          if ($guru->image != null) {
            $target_file = './uploads/guru/' . $guru->image;
            unlink($target_file);
          }


          $post['image'] = $this->upload->data('file_name');
          $data = $this->guru->update($post);
          echo json_encode($data);
        } else {
          $error = $this->upload->display_errors();
          echo json_encode($error);
        }
      } else {
        $post['image'] = null;
        $data = $this->guru->update($post);
        echo json_encode($data);
      }
    }
  }

  public function delete()
  {
    $post = $this->input->post(null, TRUE);
    $guru = $this->guru->get($post['id'])->row();

    if ($guru->image != null) {
      $target_file = './uploads/guru/' . $guru->image;
      unlink($target_file);
    }

    $data = $this->guru->delete($post['id']);
    echo json_encode($data);
  }
}


/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */