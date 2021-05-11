<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_Test_model extends CI_Model
{
  public function get($siswa_profile_id)
  {
    $this->db->where('siswa_profile_id', $siswa_profile_id);
    $query = $this->db->get('tb_h_test');
    return $query;
  }
}
