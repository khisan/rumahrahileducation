<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test_model extends CI_Model
{
  public function create($post)
  {
    $params = [
      'id_h_test' => $post['id_h_test'],
      'paket_id' => $post['paket_id'],
      'mapel_id' => $post['mapel_id'],
      'siswa_profile_id' => $post['siswa_profile_id'],
      'list_soal' => $post['list_soal'],
      'list_jawaban' => $post['list_jawaban'],
      'tgl_test' => $post['tgl_test'],
    ];
    $this->db->insert('tb_h_test', $params);
    return $this->db->affected_rows();
  }

  public function createRest($post)
  {
    $this->db->insert('tb_h_test', $post);
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

  public function updateRest($post, $id_h_test)
  {
    $this->db->set($post);
    $this->db->where('id_h_test', $id_h_test);
    return $this->db->update('tb_h_test');
  }

  public function get($siswa_profile_id)
  {
    $this->db->where('siswa_profile_id', $siswa_profile_id);
    $query = $this->db->get('tb_h_test');
    return $query;
  }

  public function getRest($siswa_profile_id)
  {
    if ($siswa_profile_id !== null) {
      $this->db->where("siswa_profile_id", $siswa_profile_id);
    } else {
      $this->db->get("tb_h_test")->result();
    }
    return $this->db->get("tb_h_test")->result();
  }

  public function getJawaban($id_test)
  {
    $this->db->where('id_h_test', $id_test);
    $query = $this->db->get('tb_h_test');
    return $query;
  }

  public function getJawabanRest($id_test)
  {
    $this->db->where('id_h_test', $id_test);
    return $this->db->get('tb_h_test')->result();
  }
}
