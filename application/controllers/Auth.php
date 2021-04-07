<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Auth
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

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model', 'admin');
    $this->load->model('Guru_model', 'guru');
    $this->load->model('Siswa_model', 'siswa');
  }

  public function login()
  {
    check_already_login();
    $this->load->view('login');
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($post['login'])) {
      $cek_admin = $this->admin->login($post);
      // $cek_guru = $this->guru->login($post);
      $cek_siswa = $this->siswa->login($post);
      if ($cek_admin->num_rows() > 0) {
        $row = $cek_admin->row();
        $session_admin = [
          'userid'  => $row->id_admin,
          'nama'    => $row->name
        ];
        $this->session->set_userdata($session_admin);
        echo '<script>
                alert("selamat, Login Berhasil");
                window.location = `' . site_url('Dashboard') . '`;
              </script>';
        // } elseif ($cek_guru->num_rows() > 0) {
        //   $row = $cek_guru->row();
        //   $session_guru = [
        //     'userid'  => $row->id_guru_profile,
        //     'nama'    => $row->nama,
        //     'gambar'  => $row->image
        //   ];
        //   $this->session->set_userdata($session_guru);
        //   echo '<script>
        //           alert("selamat, Login Berhasil");
        //           window.location = `' . site_url('Dashboard') . '`;
        //         </script>';
      } elseif ($cek_siswa->num_rows() > 0) {
        $row = $cek_siswa->row();
        $session_siswa = [
          'userid'      => $row->id_siswa_profile,
          'nama'        => $row->nama,
          'gambar'      => $row->image,
          'jenjang_id'  => $row->jenjang_id,
          'kelas'       => $row->kelas_id
        ];
        $this->session->set_userdata($session_siswa);
        echo '<script>
                alert("selamat, Login Berhasil");
                window.location = `' . site_url('Dashboard') . '`;
              </script>';
      } else {
        echo '<script>
                alert("Maaf, Login Gagal, username atau password salah");
                window.location = `' . site_url('Auth/login') . '`;
              </script>';
      }
    }
  }
  public function logout()
  {
    $params = [
      'userid',
      'level',
    ];
    $this->session->unset_userdata($params);
    redirect('auth/login');
  }
}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */