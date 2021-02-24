<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Bab_model
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

class Bab_model extends CI_Model
{

  // ------------------------------------------------------------------------

  var $column_order = [null, 'nama_bab', 'semester', 'created'];
  var $column_search = ['nama_bab'];

  var $order = ['id_bab' => 'asc'];
  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

  public function _getDataTablesQuery($id = null)
  {
    $this->db->select("tb_bab.*, tb_mapel.nama_mapel");
    $this->db->from("tb_bab");
    $this->db->join("tb_mapel", "tb_mapel.id_mapel = tb_bab.mapel_id");
    $this->db->where('mapel_id', $id);

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
    $this->db->from('tb_bab');
    return $this->db->count_all_results();
  }

  // ------------------------------------------------------------------------
  public function get($id = null, $id_mapel = null)
  {
    $this->db->from('tb_bab');
    if ($id != null) {
      $this->db->where('id_bab', $id);
    }
    if ($id_mapel != null) {
      $this->db->where('mapel_id', $id_mapel);
    }
    $query = $this->db->get();
    return $query;
  }

  public function create($post)
  {
    $params['mapel_id'] = htmlspecialchars($post['mapel_id']);
    $params['nama_bab'] = htmlspecialchars($post['nama_bab']);
    $params['semester'] = htmlspecialchars($post['semester']);
    $this->db->insert('tb_bab', $params);
    return $this->db->affected_rows();
  }

  public function update($post)
  {
    $params['mapel_id'] = htmlspecialchars($post['mapel_id']);
    $params['nama_bab'] = htmlspecialchars($post['nama_bab']);
    $params['semester'] = htmlspecialchars($post['semester']);
    $params['updated'] = date('Y-m-d H:i:s');
    $this->db->where('id_bab', $post['id_bab']);
    $this->db->update('tb_bab', $params);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->where('id_bab', $id);
    $this->db->delete('tb_bab');
    return $this->db->affected_rows();
  }


  // ------------------------------------------------------------------------

}

/* End of file Bab_model.php */
/* Location: ./application/models/Bab_model.php */