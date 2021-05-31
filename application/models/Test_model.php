<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test_model extends CI_Model
{
  public function create($post)
  {
    $params = [
      'siswa_profile_id' => $post['siswa_profile_id'],
      'list_soal' => $post['list_soal'],
      'list_jawaban' => $post['list_jawaban'],
      'tgl_test' => $post['tgl_test'],
    ];
    $this->db->insert('tb_h_test', $params);
    return $this->db->affected_rows();
  }

  public function update($table, $data, $pk, $id = null, $batch = false)
  {
    if ($batch === false) {
      $insert = $this->db->update($table, $data, array($pk => $id));
    } else {
      $insert = $this->db->update_batch($table, $data, $pk);
    }
    return $insert;
  }

  public function get($siswa_profile_id)
  {
    $this->db->where('siswa_profile_id', $siswa_profile_id);
    $query = $this->db->get('tb_h_test');
    return $query;
  }

  public function getJawaban($id_test)
  {
    $this->db->where('id_h_test', $id_test);
    $query = $this->db->get('tb_h_test');
    return $query;
  }
}
