<?php
defined('BASEPATH') or exit('No direct script access allowed');

class H_test_model extends CI_Model
{

  // ------------------------------------------------------------------------
  var $column_search = ['tb_paket.nama_paket', 'tb_mapel.nama_mapel', 'nilai', 'tgl_test'];

  var $order = ['tgl_test' => 'desc'];
  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

  public function _getDataTablesQuery($siswa_profile_id)
  {
    $this->db->select('*');
    $this->db->from('tb_h_test h_test');
    $this->db->join('tb_paket paket', 'paket.id_paket=h_test.paket_id');
    $this->db->join('tb_mapel mapel', 'mapel.id_mapel=h_test.mapel_id');
    $this->db->join('tb_siswa_profile siswa', 'siswa.id_siswa_profile=h_test.siswa_profile_id');
    $this->db->where('siswa.id_siswa_profile', $siswa_profile_id);

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

  public function getDataTables($siswa_profile_id)
  {
    $this->_getDataTablesQuery($siswa_profile_id);

    if (@$_POST['length'] != -1)
      $this->db->limit(@$_POST['length'], @$_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  public function countFiltered($siswa_profile_id)
  {
    $this->_getDataTablesQuery($siswa_profile_id);
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function countAll($siswa_profile_id)
  {
    $this->db->from('tb_h_test');
    $this->db->where('tb_h_test.siswa_profile_id', $siswa_profile_id);
    return $this->db->count_all_results();
  }

  public function get($paket_id = null, $mapel_id = null, $siswa_profile_id = null)
  {
    $this->db->where('paket_id', $paket_id);
    $this->db->where('mapel_id', $mapel_id);
    $this->db->where('siswa_profile_id', $siswa_profile_id);
    $query = $this->db->get('tb_h_test');
    return $query;
  }

  // Datatables Report Test
  public function _getDataTablesQueryReport($paket_id = null, $mapel_id = null, $siswa_profile_id = null)
  {
    $this->db->select('*');
    $this->db->from('tb_h_test h_test');
    $this->db->join('tb_paket paket', 'paket.id_paket=h_test.paket_id');
    $this->db->join('tb_mapel mapel', 'mapel.id_mapel=h_test.mapel_id');
    $this->db->join('tb_siswa_profile siswa', 'siswa.id_siswa_profile=h_test.siswa_profile_id');
    $this->db->where('h_test.siswa_profile_id', $siswa_profile_id);
    $this->db->where('h_test.paket_id', $paket_id);
    $this->db->where('h_test.mapel_id', $mapel_id);
    $this->db->order_by('h_test.tgl_test', 'asc');

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

  public function getDataTablesReport($paket_id, $mapel_id, $siswa_profile_id)
  {
    $this->_getDataTablesQueryReport($paket_id, $mapel_id, $siswa_profile_id);

    if (@$_POST['length'] != -1)
      $this->db->limit(@$_POST['length'], @$_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  public function countFilteredReport($paket_id, $mapel_id, $siswa_profile_id)
  {
    $this->_getDataTablesQueryReport($paket_id, $mapel_id, $siswa_profile_id);
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function countAllReport($paket_id, $mapel_id, $siswa_profile_id)
  {
    $this->db->from('tb_h_test');
    $this->db->where('tb_h_test.siswa_profile_id', $siswa_profile_id);
    $this->db->where('tb_h_test.paket_id', $paket_id);
    $this->db->where('tb_h_test.mapel_id', $mapel_id);
    return $this->db->count_all_results();
  }

  public function getSiswa($paket_id = null, $mapel_id = null)
  {
    $this->db->select('*');
    $this->db->from('tb_h_test h_test');
    $this->db->join('tb_siswa_profile siswa', 'siswa.id_siswa_profile=h_test.siswa_profile_id');
    $this->db->where('h_test.paket_id', $paket_id);
    $this->db->where('h_test.mapel_id', $mapel_id);
    $query = $this->db->group_by('h_test.siswa_profile_id')->get();
    return $query;
  }

  public function getAllData($siswa_profile_id)
  {
    $this->db->select('*');
    $this->db->from('tb_h_test h_test');
    $this->db->join('tb_paket paket', 'paket.id_paket=h_test.paket_id');
    $this->db->join('tb_mapel mapel', 'mapel.id_mapel=h_test.mapel_id');
    $this->db->join('tb_siswa_profile siswa', 'siswa.id_siswa_profile=h_test.siswa_profile_id');
    $this->db->where('siswa.id_siswa_profile', $siswa_profile_id);
    $this->db->order_by('h_test.tgl_test', 'asc');
    $query = $this->db->get();
    return $query;
  }

  public function getNilai($paket_id = null, $mapel_id = null, $siswa_profile_id = null)
  {
    $this->db->where('paket_id', $paket_id);
    $this->db->where('mapel_id', $mapel_id);
    $this->db->where('siswa_profile_id', $siswa_profile_id);
    $query = $this->db->get('tb_h_test')->result();
    return $query;
  }
}
