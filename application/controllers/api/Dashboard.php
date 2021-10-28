<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends BD_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth();
  }

  public function index_post()
  {
    $theCredential = $this->user_data;
    $this->response($theCredential, 200); // OK (200) being the HTTP response code
  }
}