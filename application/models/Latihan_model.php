<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Latihan_model
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

class Latihan_model extends CI_Model
{

  // ------------------------------------------------------------------------

  var $column_order = [null, 'nama_latihan', 'created'];
  var $column_search = ['nama_latihan'];

  var $order = ['id_latihan' => 'asc'];
  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

  public function _getDataTablesQuery($id = null)
  {
    $this->db->select("tb_latihan.*, tb_bab.nama_bab");
    $this->db->from("tb_latihan");
    $this->db->join("tb_bab", "tb_bab.id_bab = tb_latihan.bab_id");
    $this->db->where('bab_id', $id);

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

  public function countFiltered($id = null)
  {
    $this->_getDataTablesQuery($id);
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function countAll()
  {
    $this->db->from('tb_latihan');
    return $this->db->count_all_results();
  }

  // ------------------------------------------------------------------------
  public function get($id = null, $id_bab = null)
  {
    $this->db->from('tb_latihan');
    if ($id != null) {
      $this->db->where('id_latihan', $id);
    }
    if ($id_bab != null) {
      $this->db->where('bab_id', $id_bab);
    }
    $query = $this->db->get();
    return $query;
  }

  public function create($post)
  {
    $params['bab_id'] = htmlspecialchars($post['bab_id']);
    $params['nama_latihan'] = htmlspecialchars($post['nama_latihan']);
    $this->db->insert('tb_latihan', $params);
    return $this->db->affected_rows();
  }

  public function update($post)
  {
    $params['bab_id'] = htmlspecialchars($post['bab_id']);
    $params['nama_latihan'] = htmlspecialchars($post['nama_latihan']);
    $params['updated'] = date('Y-m-d H:i:s');
    $this->db->where('id_latihan', $post['id_latihan']);
    $this->db->update('tb_latihan', $params);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->where('id_latihan', $id);
    $this->db->delete('tb_latihan');
    return $this->db->affected_rows();
  }


  // ------------------------------------------------------------------------

}

/* End of file Latihan_model.php */
/* Location: ./application/models/Latihan_model.php */