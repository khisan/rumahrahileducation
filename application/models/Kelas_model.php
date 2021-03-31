<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Kelas_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Kelas_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function get($id = null, $jenjang = null)
  {
    if ($id != null) {
      $this->db->where('id_kelas', $id);
    }
    if ($jenjang == "sd") {
      $this->db->where("id_kelas <= 6");
    } elseif ($jenjang == "smp") {
      $this->db->where("id_kelas >= 7");
      $this->db->where("id_kelas <= 9");
    } elseif ($jenjang == "sma") {
      $this->db->where("id_kelas >= 10");
    } else if ($jenjang == "lainnya") {
      $this->db->where("id_kelas >= 19");
    }
    $query = $this->db->get('tb_kelas');
    return $query;
  }
  // ------------------------------------------------------------------------

}

/* End of file Kelas_model.php */
/* Location: ./application/models/Kelas_model.php */