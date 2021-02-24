<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller SdKelas
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

class Kelas extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kelas_model', 'kelas');
  }

  public function SD()
  {
    $data['jenjang'] = 'SD';
    $data['kelas'] = $this->kelas->get(null, "sd")->result();
    $this->template->load('template', 'tes/kelas', $data);
  }

  public function SMP()
  {
    $data['jenjang'] = 'SMP';
    $data['kelas'] = $this->kelas->get(null, "smp")->result();
    $this->template->load('template', 'tes/kelas', $data);
  }

  public function SMA()
  {
    $data['jenjang'] = 'SMA';
    $data['kelas'] = $this->kelas->get(null, "sma")->result();
    $this->template->load('template', 'tes/kelas', $data);
  }
}


/* End of file SdKelas.php */
/* Location: ./application/controllers/SdKelas.php */