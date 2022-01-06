<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Pengajar_model
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

class Pengajar_model extends CI_Model
{

  // ------------------------------------------------------------------------

  var $column_order = [null, 'id_code_guru', 'tb_guru_profile.nama', 'tb_mapel.nama_mapel'];
  var $column_search = ['tb_guru_profile.nama', 'tb_mapel.nama_mapel'];

  var $order = ['nama' => 'asc'];
  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

  public function _getDataTablesQuery($id = null)
  {
    $this->db->select("tb_code_guru.id_code_guru, tb_code_guru.siswa_profile_id ,tb_code_guru.mapel_guru_id, tb_guru_profile.nama, tb_mapel_guru.mapel_id, tb_mapel.nama_mapel, tb_code_guru.created, tb_code_guru.updated");
    $this->db->from("tb_mapel_guru");
    $this->db->join("tb_guru_profile", "tb_guru_profile.id_guru_profile = tb_mapel_guru.guru_profile_id");
    $this->db->join("tb_kelas", "tb_kelas.id_kelas = tb_mapel_guru.kelas_id");
    $this->db->join("tb_mapel", "tb_mapel.id_mapel = tb_mapel_guru.mapel_id");
    $this->db->join("tb_code_guru", "tb_code_guru.mapel_guru_id = tb_mapel_guru.id_mapel_guru");
    $this->db->join("tb_siswa_profile", "tb_siswa_profile.id_siswa_profile = tb_code_guru.siswa_profile_id");
    $this->db->where('siswa_profile_id', $id);

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

  public function getDataTables($id = null)
  {
    $this->_getDataTablesQuery($id);

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
    $this->db->from('tb_mapel_guru');
    return $this->db->count_all_results();
  }

  public function create($post)
  {
    $params = [];

    $params['siswa_profile_id'] = htmlspecialchars($post['siswa_profile_id']);
    $params['mapel_guru_id'] = htmlspecialchars($post['mapel_guru_id']);
    $this->db->insert('tb_code_guru', $params);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->where('id_code_guru', $id);
    $this->db->delete('tb_code_guru');
    return $this->db->affected_rows();
  }

  // ------------------------------------------------------------------------

}

/* End of file Pengajar_model.php */
/* Location: ./application/models/Pengajar_model.php */