<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Private_model extends CI_Model
{

  public function create($post)
  {
    $params['id_private'] = htmlspecialchars($post['id_private']);
    $params['nama'] = htmlspecialchars($post['nama']);
    $params['jenjang_id'] = htmlspecialchars($post['jenjang_id']);
    $params['kelas_id'] = $post['kelas_id'];
    $params['jurusan'] = htmlspecialchars($post['jurusan_id']);
    $params['sekolah'] = htmlspecialchars($post['sekolah']);
    $params['alamat'] = htmlspecialchars($post['alamat']);
    $params['email'] = htmlspecialchars($post['email']);

    $this->db->insert('tb_private', $params);
    return $this->db->affected_rows();
  }
}
