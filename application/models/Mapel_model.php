<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel_model extends CI_Model
{

  var $column_order = [null, 'nama_mapel', 'created'];
  var $column_search = ['nama_mapel'];

  var $order = ['id_mapel' => 'asc'];

  public function _getDataTablesQuery($id)
  {
    $this->db->select("*");
    $this->db->from("tb_mapel");
    $this->db->join("tb_kelas", "tb_kelas.id_kelas = tb_mapel.kelas_id", "left");
    $this->db->join("tb_paket", "tb_paket.id_paket = tb_mapel.paket_id", "left");
    $this->db->where('tb_mapel.kelas_id', $id);

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

  public function _getDataTablesQueryLainnya($id_paket)
  {
    $this->db->select("*");
    $this->db->from("tb_mapel");
    $this->db->join("tb_kelas", "tb_kelas.id_kelas = tb_mapel.kelas_id", "left");
    $this->db->join("tb_paket", "tb_paket.id_paket = tb_mapel.paket_id", "left");
    $this->db->where('tb_mapel.paket_id', $id_paket);
    /*Apakah id paket adalah array? 
    jika iya maka parameter id_paket dikirim dari controller video*/
    // if (is_array($id_paket)) {
    //   foreach ($id_paket as $key) {
    //     $this->db->where('tb_mapel.paket_id', $key->id_paket);
    //   }
    // } else $this->db->where('tb_mapel.paket_id', $id_paket);

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

  public function getDataTables($id)
  {
    $this->_getDataTablesQuery($id);

    if (@$_POST['length'] != -1)
      $this->db->limit(@$_POST['length'], @$_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  public function getDataTablesLainnya($id_paket)
  {
    $this->_getDataTablesQueryLainnya($id_paket);

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
    $this->db->from('tb_mapel');
    return $this->db->count_all_results();
  }

  public function get($id = null, $id_kelas = null, $id_paket = null)
  {
    if ($id != null) {
      $this->db->where('id_mapel', $id);
    } elseif ($id_kelas != null) {
      $this->db->where('kelas_id', $id_kelas);
    } else {
      if (is_array($id_paket)) {
        foreach ($id_paket as $key) {
          $this->db->where('paket_id', $key->id_paket);
        }
      } else $this->db->where('paket_id', $id_paket);
    }
    $final = $this->db->get('tb_mapel');
    return $final;
  }

  public function getRest($id, $id_mapel)
  {
    $this->db->select("id_mapel,kelas_id,paket_id,nama_mapel");
    $this->db->from("tb_mapel");
    if ($id != null) {
      $this->db->where("kelas_id", $id);
      $this->db->or_where("paket_id", $id);
    } elseif ($id == null && $id_mapel != null) {
      $this->db->where("id_mapel", $id_mapel);
    }
    return $this->db->get()->result();
  }

  public function create($post)
  {
    $params['kelas_id'] = htmlspecialchars($post['kelas_id']);
    $params['nama_mapel'] = htmlspecialchars($post['nama_mapel']);
    $this->db->insert('tb_mapel', $params);
    return $this->db->affected_rows();
  }

  public function createLainnya($post)
  {
    $params['paket_id'] = htmlspecialchars($post['paket_id']);
    $params['nama_mapel'] = htmlspecialchars($post['nama_mapel']);
    $this->db->insert('tb_mapel', $params);
    return $this->db->affected_rows();
  }

  public function update($post)
  {
    $params['kelas_id'] = htmlspecialchars($post['kelas_id']);
    $params['nama_mapel'] = htmlspecialchars($post['nama_mapel']);
    $params['updated'] = date('Y-m-d H:i:s');
    $this->db->where('id_mapel', $post['id_mapel']);
    $this->db->update('tb_mapel', $params);
    return $this->db->affected_rows();
  }

  public function updateLainnya($post)
  {
    $params['paket_id'] = htmlspecialchars($post['paket_id']);
    $params['nama_mapel'] = htmlspecialchars($post['nama_mapel']);
    $params['updated'] = date('Y-m-d H:i:s');
    $this->db->where('id_mapel', $post['id_mapel']);
    $this->db->update('tb_mapel', $params);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->where('id_mapel', $id);
    $this->db->delete('tb_mapel');
    return $this->db->affected_rows();
  }

  public function getMapelForVideo()
  {
    $this->db->select("*");
    $this->db->from("tb_mapel");
    $this->db->join("tb_kelas", "tb_kelas.id_kelas = tb_mapel.kelas_id", "left");
    $this->db->join("tb_paket", "tb_paket.id_paket = tb_mapel.paket_id", "left");
    $this->db->where('tb_kelas.jenjang_id', '3');
    $this->db->where('tb_kelas.jenjang_id', '4');
    $query = $this->db->get();
    print_r($query->result());
    die();
  }


  // ------------------------------------------------------------------------

}

/* End of file Mapel_model.php */
/* Location: ./application/models/Mapel_model.php */