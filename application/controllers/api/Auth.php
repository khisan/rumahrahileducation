<?php
defined('BASEPATH') or exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Auth extends BD_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Admin_model', 'admin');
    $this->load->model('Tentor_model', 'tentor');
    $this->load->model('tentor_model', 'tentor');
    $this->load->model('Siswa_model', 'siswa');
  }

  public function login()
  {
    check_already_login();
    $this->load->view('login');
  }

  public function process_post()
  {
    $username = $this->post('username'); //Username Posted
    $password = sha1($this->post('password')); //Pasword Posted
    $user = array('username' => $username); //For where query condition
    $kunci = $this->config->item('thekey');
    $invalidLogin = ['status' => 'Invalid Login']; //Respon if login invalid
    $val = $this->admin->login_rest($user)->row(); //Model to get single data row from database base on username
    if($this->admin->login_rest($user)->num_rows() == 0){$this->response($invalidLogin, REST_Controller::HTTP_NOT_FOUND);}
		$match = $val->password;   //Get password for user from database
    if($password == $match){  //Condition if password matched
      $token['id'] = $val->id_admin;  //From here
        $token['username'] = $username;
        $token['name'] = $val->name;
        $date = new DateTime();
        $token['iat'] = $date->getTimestamp();
        $token['exp'] = $date->getTimestamp() + 60*60*5; //To here is to generate token
        $output['token'] = JWT::encode($token,$kunci ); //This is the output token
        $this->set_response($output, REST_Controller::HTTP_OK); //This is the respon if success
    } else {
        $this->set_response($invalidLogin, REST_Controller::HTTP_NOT_FOUND); //This is the respon if failed
    }
  }
}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */