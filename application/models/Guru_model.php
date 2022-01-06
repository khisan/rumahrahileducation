<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Guru_model
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

class Guru_model extends CI_Model
{

  // ------------------------------------------------------------------------

  var $column_order = [null, 'nama', 'alamat', 'email'];
  var $column_search = ['nama', 'alamat', 'email'];

  var $order = ['id_guru_profile' => 'asc'];
  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

  public function _getDataTablesQuery()
  {
    $this->db->select("*");
    $this->db->from("tb_guru_profile");

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
    $this->db->from('tb_guru_profile');
    return $this->db->count_all_results();
  }

  public function get($id = null)
  {
    $this->db->from('tb_guru_profile');
    if ($id != null) {
      $this->db->where('id_guru_profile', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function login($post)
  {
    $this->db->select('*');
    $this->db->from('tb_guru_profile');
    $this->db->where('username', $post['username']);
    $this->db->where('password', sha1($post['password']));
    $query = $this->db->get();
    return $query;
  }


  public function create($post)
  {
    $params['id_guru_profile'] = htmlspecialchars($post['id_guru_profile']);
    $params['nama'] = htmlspecialchars($post['nama']);
    $params['username'] = htmlspecialchars($post['username']);
    $params['alamat'] = htmlspecialchars($post['alamat']);
    $params['email'] = htmlspecialchars($post['email']);
    $params['password'] = sha1($post['password1']);
    $params['image'] = htmlspecialchars($post['image']);

    $this->db->insert('tb_guru_profile', $params);
    return $this->db->affected_rows();
  }

  public function update($post)
  {
    $params['nama'] = htmlspecialchars($post['nama']);
    $params['username'] = htmlspecialchars($post['username']);
    $params['alamat'] = htmlspecialchars($post['alamat']);
    $params['email'] = htmlspecialchars($post['email']);
    if (!empty($post['password1'])) {
      $params['password'] = sha1($post['password1']);
    }
    if ($post['image'] != null) {
      $params['image'] = htmlspecialchars($post['image']);
    }
    $params['updated'] = date('Y-m-d H:i:s');

    $this->db->where('id_guru_profile', $post['id_guru_profile']);
    $this->db->update('tb_guru_profile', $params);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->where('id_guru_profile', $id);
    $this->db->delete('tb_guru_profile');
    return $this->db->affected_rows();
  }

  // ------------------------------------------------------------------------

}

/* End of file Guru_model.php */
/* Location: ./application/models/Guru_model.php */