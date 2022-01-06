<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Private_model extends CI_Model
{

  public function register($data)
  {
    $this->db->insert('tb_private', $data);
    return $this->db->affected_rows();
  }

  var $column_order = [null, 'nama', 'jenjang_name', 'kelas_name', 'jurusan', 'sekolah', 'alamat', 'email'];
  var $column_search = ['nama', 'tb_jenjang.nama_jenjang', 'tb_kelas.nama_kelas', 'sekolah', 'alamat', 'email'];

  var $order = ['id_private' => 'asc'];

  public function _getDataTablesQuery()
  {
    $this->db->select("tb_private.*, tb_jenjang.nama_jenjang as jenjang_name, tb_kelas.nama_kelas as kelas_name");
    $this->db->from("tb_private");
    $this->db->join("tb_jenjang", "tb_jenjang.id_jenjang = tb_private.jenjang_id");
    $this->db->join("tb_kelas", "tb_kelas.id_kelas = tb_private.kelas_id");

    $i = 0;

    foreach ($this->column_search as $item) {
      if (@$_POST['search']['value']) {
        if ($i == 0) {
          $this->db->group_start();
          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }
        if (count($this->column_search) - 1 == $i) {
          $this->db->group_end();
        }
      }
      $i++;
    }
    if (isset($_POST['order'])) {
      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } elseif (isset($this->order)) {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  public function getDataTables()
  {
    $this->_getDataTablesQuery();

    if (@$_POST['length'] != -1)
      $this->db->limit(@$_POST['length'], @$_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  public function countFiltered()
  {
    $this->_getDataTablesQuery();
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function countAll()
  {
    $this->db->from('tb_private');
    return $this->db->count_all_results();
  }

  public function get($id = null)
  {
    $this->db->from('tb_private');
    if ($id != null) {
      $this->db->where('id_private', $id);
    }
    $query = $this->db->get();
    return $query;
  }
}
