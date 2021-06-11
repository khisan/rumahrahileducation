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
  public function get($id = null, $jenjang_id = null)
  {
    if ($id != null) {
      $this->db->where('id_kelas', $id);
    }
    if ($jenjang_id == "SD" or $jenjang_id == 1) {
      $this->db->where("id_kelas <= 6");
    } elseif ($jenjang_id === "SMP" or $jenjang_id == 2) {
      $this->db->where("id_kelas >= 7");
      $this->db->where("id_kelas <= 9");
    } elseif ($jenjang_id === "SMA" or $jenjang_id == 3) {
      $this->db->where("id_kelas >= 10");
      $this->db->where("id_kelas <= 18");
    } else if ($jenjang_id === "SBM" or $jenjang_id == 4) {
      $this->db->where("id_kelas >= 19");
      $this->db->where("id_kelas <= 23");
    }
    $query = $this->db->get('tb_kelas');
    return $query;
  }

  public function getJurusan($kelas_id = null)
  {
    $this->db->select('jurusan');
    $this->db->from('tb_kelas');
    $this->db->where("id_kelas", $kelas_id);
    $query = $this->db->get();
    return $query;
  }
}

/* End of file Kelas_model.php */
/* Location: ./application/models/Kelas_model.php */