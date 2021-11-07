<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentor_model extends CI_Model
{
  var $column_order = [null, 'username', 'name'];
  var $column_search = ['username', 'name'];

  var $order = ['id_tentor' => 'asc'];
  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

  public function _getDataTablesQuery()
  {
    $this->db->select('*');
    $this->db->from('tb_tentor');

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
    $this->db->from('tb_tentor');
    return $this->db->count_all_results();
  }

  public function get($id = null)
  {
    $this->db->from('tb_tentor');
    if ($id != null) {
      $this->db->where('id_tentor', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function login($post)
  {
    $this->db->select('*');
    $this->db->from('tb_tentor');
    $this->db->where('username', $post['username']);
    $this->db->where('password', sha1($post['password']));
    $query = $this->db->get();
    return $query;
  }

  public function login_rest($user)
  {
    return $this->db->get_where("tb_tentor", $user);
  }

  public function create($post)
  {
    $params = [
      'id_tentor' => htmlspecialchars($post['id_tentor']),
      'username' => htmlspecialchars($post['username']),
      'name' => htmlspecialchars($post['name']),
      'password' => sha1($post['password']),
    ];
    $this->db->insert('tb_tentor', $params);
    return $this->db->affected_rows();
  }

  public function update($post)
  {
    $params['username'] = htmlspecialchars($post['username']);
    $params['name'] = htmlspecialchars($post['name']);
    if (!empty($post['password'])) {
      $params['password'] = sha1($post['password']);
    }
    $params['updated'] = date('Y-m-d H:i:s');

    $this->db->where('id_tentor', $post['id_tentor']);
    $this->db->update('tb_tentor', $params);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->where('id_tentor', $id);
    $this->db->delete('tb_tentor');
    return $this->db->affected_rows();
  }
}
