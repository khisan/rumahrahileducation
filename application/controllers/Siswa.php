<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Siswa
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

class Siswa extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // check_not_login();
    $this->load->model('Siswa_model', 'siswa');
    $this->load->model('Jenjang_model', 'jenjang');
    $this->load->model('Kelas_model', 'kelas');
  }

  public function index()
  {
    $data['jenjang'] = $this->jenjang->get();
    $data['kelas'] = $this->kelas->get();
    $this->template->load('template', 'user/siswa', $data);
  }

  public function getAjax()
  {
    $list = $this->siswa->getDataTables();
    $data = [];
    $no = @$_POST['start'];
    foreach ($list as $siswa) {
      $no++;
      $row = [];
      $row[] = $no . '.';
      $row[] = $siswa->nama;
      $row[] = $siswa->username;
      $row[] = $siswa->jenjang_name;
      $row[] = $siswa->kelas_name;
      $row[] = $siswa->jurusan;
      $row[] = $siswa->sekolah;
      $row[] = $siswa->alamat;
      $row[] = $siswa->email;
      $row[] = $siswa->image != null ? '<img src="' . site_url('uploads/siswa/') . $siswa->image . '"  class="rounded mx-auto d-block" width="200px">' : '<img src="' . site_url('assets/able/assets/images/') . 'default.png" class="rounded mx-auto d-block" width="200px">';
      // $row[] = $siswa->created;
      // $row[] = $siswa->updated;
      $row[] = '
          <a href="' . site_url('pengajar/get/') . $siswa->id_siswa_profile . '" class="btn btn-primary has-ripple"><i class="feather mr-2 icon-list"></i>Lihat Guru Kelas<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></a>
          <button type="button" value="' . $siswa->id_siswa_profile . '" class="btn btn-success has-ripple update"><i class="feather mr-2 icon-edit"></i>Update<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
          <button type="button" value="' . $siswa->id_siswa_profile . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
      ';

      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->siswa->countAll(),
      'recordsFiltered' => $this->siswa->countFiltered(),
      'data' => $data
    ];
    echo json_encode($output);
  }

  public function add()
  {
    $post = $this->input->post(null, TRUE);

    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('jenjang_id', 'Jenjang', 'required');
    $this->form_validation->set_rules('kelas_id', 'Kelas', 'required');
    $this->form_validation->set_rules('sekolah', 'Sekolah', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tb_siswa_profile.email]', [
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
      $jj = '';
      if ($post['jenjang_id'] == 1) {
        $jj = 'SD';
        $post['id_siswa_profile'] = "$jj$post[kelas_id]" . substr(md5(rand()), 0, 5);
      } elseif ($post['jenjang_id'] == 2) {
        $jj = 'SMP';
        $post['id_siswa_profile'] = "$jj$post[kelas_id]" . substr(md5(rand()), 0, 5);
      } else {
        $jj = 'SMA';
        $post['id_siswa_profile'] = "$jj$post[kelas_id]$post[jurusan]" . substr(md5(rand()), 0, 5);
      }
      $config['upload_path']    = './uploads/siswa/';
      $config['allowed_types']  = 'gif|png|jpg|jpeg';
      $config['max_size']       = 2048;
      $config['file_name']       = "SISWA-$jj-$post[kelas_id]-" . date('ymd') . '-' . substr(md5(rand()), 0, 10);

      $this->load->library('upload', $config);

      if ($_FILES['image']['name'] != null) {
        if ($this->upload->do_upload('image')) {
          if ($post['jurusan'] == '') {
            $post['jurusan'] = null;
          }
          $post['image'] = $this->upload->data('file_name');
          $data = $this->siswa->create($post);
          echo json_encode($data);
        } else {
          $error = $this->upload->display_errors();
          echo json_encode($error);
        }
      } else {
        if ($post['jurusan'] == '') {
          $post['jurusan'] = null;
        }
        $post['image'] = null;
        $data = $this->siswa->create($post);
        echo json_encode($data);
      }
    }
  }
  public function get()
  {
    $get = $this->input->get(null, TRUE);
    if ($get == null) {
      $query = $this->siswa->get();
      echo json_encode($query->result_array());
    } else {
      $query = $this->siswa->get($get['id']);
      echo json_encode($query->row());
    }
  }

  public function update()
  {
    $post = $this->input->post(null, TRUE);

    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('jenjang_id', 'Jenjang', 'required');
    $this->form_validation->set_rules('kelas_id', 'Kelas', 'required');
    $this->form_validation->set_rules('sekolah', 'Sekolah', 'required');
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
      $jj = '';
      if ($post['jenjang_id'] == 1) {
        $jj = 'SD';
      } elseif ($post['jenjang_id'] == 2) {
        $jj = 'SMP';
      } else {
        $jj = 'SMA';
      }
      $config['upload_path']    = './uploads/siswa/';
      $config['allowed_types']  = 'gif|png|jpg|jpeg';
      $config['max_size']       = 2048;
      $config['file_name']       = "SISWA-$jj-$post[kelas_id]-" . date('ymd') . '-' . substr(md5(rand()), 0, 10);

      $this->load->library('upload', $config);

      if (@$_FILES['image']['name'] != null) {
        if ($this->upload->do_upload('image')) {
          if ($post['jurusan'] == '') {
            $post['jurusan'] = null;
          }
          $siswa = $this->siswa->get($post['id_siswa'])->row();

          if ($siswa->image != null) {
            $target_file = './uploads/siswa/' . $siswa->image;
            unlink($target_file);
          }


          $post['image'] = $this->upload->data('file_name');
          $data = $this->siswa->update($post);
          echo json_encode($data);
        } else {
          $error = $this->upload->display_errors();
          echo json_encode($error);
        }
      } else {
        if ($post['jurusan'] == '') {
          $post['jurusan'] = null;
        }
        $post['image'] = null;
        $data = $this->siswa->update($post);
        echo json_encode($data);
      }
    }
  }

  public function delete()
  {
    $post = $this->input->post(null, TRUE);
    $siswa = $this->siswa->get($post['id'])->row();

    if ($siswa->image != null) {
      $target_file = './uploads/siswa/' . $siswa->image;
      unlink($target_file);
    }

    $data = $this->siswa->delete($post['id']);
    echo $data;
  }
}


/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */