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
      $query = $this->admin->login($post);
      if ($query->num_rows() > 0) {
        $row = $query->row();
        $params = [
          'userid' => $row->id_admin
        ];
        $this->session->set_userdata($params);
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