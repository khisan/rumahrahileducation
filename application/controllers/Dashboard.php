<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->auth();
  }

  public function index()
  {
    $this->template->load('template', 'dashboard');
  }

  public function backend_page_post(){
    $theCredential = $this->user_data;
    $this->response($theCredential, 200); // OK (200) being the HTTP response code
  }
}


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */