<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_h_test_model extends CI_Model
{
  var $order = ['tgl_test' => 'desc'];

  public function _getDataTablesQuery($id_h_test)
  {
    $this->db->select('*');
    $this->db->from('tb_h_test h_test');
    $this->db->join('tb_soal soal', 'soal.paket_id=h_test.paket_id and soal.mapel_id=h_test.mapel_id');
    $this->db->where('h_test.id_h_test', $id_h_test);

    $i = 0;

    if (isset($_POST['order'])) {
      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } elseif (isset($this->order)) {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  public function getDataTables($id_h_test)
  {
    $this->_getDataTablesQuery($id_h_test);

    if (@$_POST['length'] != -1)
      $this->db->limit(@$_POST['length'], @$_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  public function countFiltered($id_h_test)
  {
    $this->_getDataTablesQuery($id_h_test);
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function countAll($id_h_test)
  {
    $this->db->from('tb_h_test');
    $this->db->where('tb_h_test.id_h_test', $id_h_test);
    return $this->db->count_all_results();
  }

  public function get($id_h_test)
  {
    $this->db->select('*');
    $this->db->from('tb_h_test h_test');
    $this->db->join('tb_paket paket', 'paket.id_paket=h_test.paket_id');
    $this->db->join('tb_mapel mapel', 'mapel.id_mapel=h_test.mapel_id');
    $this->db->join('tb_siswa_profile siswa', 'siswa.id_siswa_profile=h_test.siswa_profile_id');
    $this->db->where('h_test.id_h_test', $id_h_test);
    return $this->db->get();
  }

  public function getRest($id_h_test)
  {
    $this->db->select('*');
    $this->db->from('tb_h_test h_test');
    $this->db->join('tb_paket paket', 'paket.id_paket=h_test.paket_id');
    $this->db->join('tb_mapel mapel', 'mapel.id_mapel=h_test.mapel_id');
    $this->db->join('tb_siswa_profile siswa', 'siswa.id_siswa_profile=h_test.siswa_profile_id');
    $this->db->where('h_test.id_h_test', $id_h_test);
    return $this->db->get();
  }
}
