<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Paket_model
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

class Paket_model extends CI_Model
{

  // ------------------------------------------------------------------------

  var $column_order = [null, 'nama_paket', 'created'];
  var $column_search = ['nama_paket'];

  var $order = ['id_paket' => 'asc'];
  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

  public function _getDataTablesQuery($id_bab)
  {
    $this->db->select("*");
    $this->db->from("tb_paket");
    $this->db->join("tb_bab", "tb_bab.id_bab = tb_paket.bab_id");
    $this->db->or_where('tb_paket.bab_id', $id_bab);

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

  public function _getDataTablesQueryLainnya($id_kelas)
  {
    $this->db->select("*");
    $this->db->from("tb_paket");
    $this->db->join("tb_kelas", "tb_kelas.id_kelas = tb_paket.kelas_id");
    $this->db->where('tb_paket.kelas_id', $id_kelas);

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

  public function getDataTables($id_bab)
  {
    $this->_getDataTablesQuery($id_bab);

    if (@$_POST['length'] != -1)
      $this->db->limit(@$_POST['length'], @$_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  public function getDataTablesLainnya($id_kelas)
  {
    $this->_getDataTablesQueryLainnya($id_kelas);

    if (@$_POST['length'] != -1)
      $this->db->limit(@$_POST['length'], @$_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  public function countFiltered($id_bab)
  {
    $this->_getDataTablesQuery($id_bab);
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function countFilteredLainnya($id_kelas)
  {
    $this->_getDataTablesQueryLainnya($id_kelas);
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function countAll()
  {
    $this->db->from('tb_paket');
    return $this->db->count_all_results();
  }

  // ------------------------------------------------------------------------
  public function get($id = null, $id_bab = null, $id_kelas = null)
  {
    if ($id != null) {
      $this->db->where('id_paket', $id);
    } elseif ($id_bab != null) {
      $this->db->where('bab_id', $id_bab);
    } else {
      $this->db->where('kelas_id', $id_kelas);
    }
    $query = $this->db->get('tb_paket');
    return $query;
  }

  public function create($post)
  {
    $params['bab_id'] = htmlspecialchars($post['bab_id']);
    $params['nama_paket'] = htmlspecialchars($post['nama_paket']);
    $params['waktu'] = htmlspecialchars($post['waktu']);
    $this->db->insert('tb_paket', $params);
    return $this->db->affected_rows();
  }

  public function createLainnya($post)
  {
    $params['kelas_id'] = htmlspecialchars($post['kelas_id']);
    $params['nama_paket'] = htmlspecialchars($post['nama_paket']);
    $params['waktu'] = htmlspecialchars($post['waktu']);
    $this->db->insert('tb_paket', $params);
    return $this->db->affected_rows();
  }

  public function update($post)
  {
    $params['bab_id'] = htmlspecialchars($post['bab_id']);
    $params['nama_paket'] = htmlspecialchars($post['nama_paket']);
    $params['waktu'] = htmlspecialchars($post['waktu']);
    $params['updated'] = date('Y-m-d H:i:s');
    $this->db->where('id_paket', $post['id_paket']);
    $this->db->update('tb_paket', $params);
    return $this->db->affected_rows();
  }

  public function updateLainnya($post)
  {
    // $params['mapel_id'] = htmlspecialchars($post['mapel_id']);
    $params['nama_paket'] = htmlspecialchars($post['nama_paket']);
    $params['waktu'] = htmlspecialchars($post['waktu']);
    $params['updated'] = date('Y-m-d H:i:s');
    $this->db->where('id_paket', $post['id_paket']);
    $this->db->update('tb_paket', $params);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->where('id_paket', $id);
    $this->db->delete('tb_paket');
    return $this->db->affected_rows();
  }

  // ------------------------------------------------------------------------

}

/* End of file Paket_model.php */
/* Location: ./application/models/Paket_model.php */