<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Libraries Fungsi
 *
 * This Libraries for ...
 * 
 * @package		CodeIgniter
 * @category	Libraries
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Fungsi
{

  // ------------------------------------------------------------------------

  protected $ci;

  // ------------------------------------------------------------------------

  public function __construct()
  {
    $this->ci = &get_instance();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

  public function user_login()
  {
    $this->ci->load->model('Admin_model', 'user');
    $userId = $this->ci->session->userdata('userid');
    $user_data = $this->ci->user->get($userId)->row();
    return $user_data;
  }
  // ------------------------------------------------------------------------
}

/* End of file Fungsi.php */
/* Location: ./application/libraries/Fungsi.php */