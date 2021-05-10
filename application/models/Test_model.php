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

  // public function update($post)
  // {
  //   $params['username'] = htmlspecialchars($post['username']);
  //   $params['name'] = htmlspecialchars($post['name']);
  //   if (!empty($post['password1'])) {
  //     $params['password'] = sha1($post['password1']);
  //   }
  //   $params['updated'] = date('Y-m-d H:i:s');

  //   $this->db->where('id_admin', $post['id_admin']);
  //   $this->db->update('tb_admin', $params);
  //   return $this->db->affected_rows();
  // }

  // public function delete($id)
  // {
  //   $this->db->where('id_admin', $id);
  //   $this->db->delete('tb_admin');
  //   return $this->db->affected_rows();
  // }
}
