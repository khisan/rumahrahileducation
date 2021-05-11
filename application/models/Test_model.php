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

  public function update($post)
  {
    $params['list_jawaban'] = $post['list_jawaban'];

    $this->db->where('id_h_test', $post['id_test']);
    $this->db->update('tb_h_test', $params);
    return $this->db->affected_rows();
  }
}
