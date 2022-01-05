<?php
defined('BASEPATH') or exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Logout extends BD_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth();
    $this->load->model('Siswa_model', 'siswa');
  }

  public function index_post()
  {
    $theCredential = $this->user_data;
    // $id = $theCredential->id;
    // $this->siswa->logout($id);
    $output['token'] = JWT::encode($theCredential, 'jsdnfjnsdjg'); //This is the output token
    $this->set_response([
      'status' => REST_Controller::HTTP_OK,
      'message' => "Logout Berhasil",
    ]);
    // var_dump($id);
  }
}
