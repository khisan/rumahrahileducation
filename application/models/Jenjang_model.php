<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Jenjang_model
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

class Jenjang_model extends CI_Model
{
  public function get($id = null)
  {
    if ($id != null) {
      $this->db->where('id_jenjang', $id);
    }
    $query = $this->db->get('tb_jenjang');
    return $query;
  }

  public function getRest($id)
  {
    $this->db->select("id_jenjang,nama_jenjang");
    $this->db->from("tb_jenjang");
    if ($id != null) {
      $this->db->where("id_jenjang", $id);
    }
    return $this->db->get()->result();
  }
}

/* End of file Jenjang_model.php */
/* Location: ./application/models/Jenjang_model.php */