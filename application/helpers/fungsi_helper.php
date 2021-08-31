<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Helpers Fungsi_helper
 *
 * This Helpers for ...
 * 
 * @package   CodeIgniter
 * @category  Helpers
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 *
 */

// ------------------------------------------------------------------------

function check_already_login()
{
  $ci = &get_instance();
  $user_sessoin = $ci->session->userdata('userid');
  if ($user_sessoin) {
    redirect('dashboard');
  }
}
function check_not_login()
{
  $ci = &get_instance();
  $user_sessoin = $ci->session->userdata('userid');
  if (!$user_sessoin) {
    redirect('auth/login');
  }
}

// Cek apakah yang login adalah admin atau bukan
function isAdmin()
{
  $ci = &get_instance();
  if(isset($ci->session->jenjang) && !empty($ci->session->jenjang)) return false;
  return true;
}

// ------------------------------------------------------------------------

/* End of file Fungsi_helper.php */
/* Location: ./application/helpers/Fungsi_helper.php */