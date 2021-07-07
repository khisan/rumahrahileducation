<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Siswa_model
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

class Siswa_model extends CI_Model
{

  // ------------------------------------------------------------------------

  var $column_order = [null, 'nama', 'jenjang_name', 'kelas_name', 'jurusan', 'sekolah', 'alamat', 'email'];
  var $column_search = ['nama', 'tb_jenjang.nama_jenjang', 'tb_kelas.nama_kelas', 'sekolah', 'alamat', 'email'];

  var $order = ['id_siswa_profile' => 'asc'];
  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

  public function _getDataTablesQuery()
  {
    $this->db->select("tb_siswa_profile.*, tb_jenjang.nama_jenjang as jenjang_name, tb_kelas.nama_kelas as kelas_name");
    $this->db->from("tb_siswa_profile");
    $this->db->join("tb_jenjang", "tb_jenjang.id_jenjang = tb_siswa_profile.jenjang_id");
    $this->db->join("tb_kelas", "tb_kelas.id_kelas = tb_siswa_profile.kelas_id");

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
    $this->db->from('tb_siswa_profile');
    return $this->db->count_all_results();
  }

  public function get($id = null)
  {
    $this->db->from('tb_siswa_profile');
    if ($id != null) {
      $this->db->where('id_siswa_profile', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function getSiswa($siswa_profile_id)
  {
    $this->db->where('id_siswa_profile', $siswa_profile_id);
    $query = $this->db->get('tb_siswa_profile')->result();
    return $query;
  }

  public function login($post)
  {
    $this->db->select('*');
    $this->db->from('tb_siswa_profile');
    $this->db->join('tb_jenjang', 'tb_jenjang.id_jenjang = tb_siswa_profile.jenjang_id');
    $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa_profile.kelas_id');
    $this->db->where('username', $post['username']);
    $this->db->where('password', sha1($post['password']));
    $query = $this->db->get();
    return $query;
  }

  public function create($post)
  {
    $params['id_siswa_profile'] = htmlspecialchars($post['id_siswa_profile']);
    $params['nama'] = htmlspecialchars($post['nama']);
    $params['username'] = htmlspecialchars($post['username']);
    $params['jenjang_id'] = htmlspecialchars($post['jenjang_id']);
    $params['kelas_id'] = $post['kelas_id'];
    $params['jurusan'] = htmlspecialchars($post['jurusan']);
    $params['sekolah'] = htmlspecialchars($post['sekolah']);
    $params['alamat'] = htmlspecialchars($post['alamat']);
    $params['email'] = htmlspecialchars($post['email']);
    $params['password'] = sha1($post['password1']);
    $params['image'] = $post['image'];

    $this->db->insert('tb_siswa_profile', $params);
    return $this->db->affected_rows();
  }

  public function update($post)
  {
    $params['nama'] = htmlspecialchars($post['nama']);
    $params['username'] = htmlspecialchars($post['username']);
    $params['jenjang_id'] = htmlspecialchars($post['jenjang_id']);
    $params['kelas_id'] = htmlspecialchars($post['kelas_id']);
    $params['jurusan'] = htmlspecialchars($post['jurusan']);
    $params['sekolah'] = htmlspecialchars($post['sekolah']);
    $params['alamat'] = htmlspecialchars($post['alamat']);
    $params['email'] = htmlspecialchars($post['email']);
    if (!empty($post['password1'])) {
      $params['password'] = sha1($post['password1']);
    }
    if ($post['image'] != null) {
      $params['image'] = htmlspecialchars($post['image']);
    }
    $params['updated'] = date('Y-m-d H:i:s');

    $this->db->where('id_siswa_profile', $post['id_siswa']);
    $this->db->update('tb_siswa_profile', $params);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->where('id_siswa_profile', $id);
    $this->db->delete('tb_siswa_profile');
    return $this->db->affected_rows();
  }

  // ------------------------------------------------------------------------

}

/* End of file Siswa_model.php */
/* Location: ./application/models/Siswa_model.php */