<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Mapel_model
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

class MapelGuru_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  var $column_order = [null, 'id_mapel_guru', 'tb_mapel.nama_mapel', 'tb_kelas.nama_kelas', 'sekolah', 'keterangan', 'created'];
  var $column_search = ['tb_mapel.nama_mapel', 'tb_kelas.nama_kelas', 'sekolah', 'keterangan'];

  var $order = ['id_mapel_guru' => 'asc'];
  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

  public function _getDataTablesQuery($id = null)
  {
    $this->db->select("tb_mapel_guru.*, tb_mapel.nama_mapel, tb_guru_profile.nama as nama, tb_kelas.nama_kelas");
    $this->db->from("tb_mapel_guru");
    $this->db->join("tb_guru_profile", "tb_guru_profile.id_guru_profile = tb_mapel_guru.guru_profile_id");
    $this->db->join("tb_mapel", "tb_mapel.id_mapel = tb_mapel_guru.mapel_id");
    $this->db->join("tb_kelas", "tb_kelas.id_kelas = tb_mapel_guru.kelas_id");
    $this->db->where('guru_profile_id', $id);

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

  public function get($id = null)
  {
    $this->db->from('tb_mapel_guru');
    if ($id != null) {
      $this->db->where('id_mapel_guru', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function create($post)
  {
    $params = [];
    $params['id_mapel_guru'] = htmlspecialchars($post['id_mapel_guru']);
    $params['guru_profile_id'] = htmlspecialchars($post['guru_profile_id']);
    $params['mapel_id'] = htmlspecialchars($post['mapel_id']);
    $params['kelas_id'] = htmlspecialchars($post['kelas_id']);
    $params['sekolah'] = htmlspecialchars($post['sekolah']);
    $params['keterangan'] = htmlspecialchars($post['keterangan']);
    $this->db->insert('tb_mapel_guru', $params);
    return $this->db->affected_rows();
  }

  public function update($post)
  {
    $params = [];
    $params['mapel_id'] = htmlspecialchars($post['mapel_id']);
    $params['kelas_id'] = htmlspecialchars($post['kelas_id']);
    $params['sekolah'] = htmlspecialchars($post['sekolah']);
    $params['keterangan'] = htmlspecialchars($post['keterangan']);
    $params['updated'] = date('Y-m-d H:i:s');

    $this->db->where('id_mapel_guru', $post['id_mapel_guru']);
    $this->db->update('tb_mapel_guru', $params);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->where('id_mapel_guru', $id);
    $this->db->delete('tb_mapel_guru');
    return $this->db->affected_rows();
  }

  // ------------------------------------------------------------------------

}

/* End of file Mapel_model.php */
/* Location: ./application/models/Mapel_model.php */