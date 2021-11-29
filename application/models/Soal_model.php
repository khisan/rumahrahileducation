<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soal_model extends CI_Model
{
  var $column_order = [null, 'soal'];
  var $column_search = ['soal'];

  var $order = ['id_soal' => 'asc'];

  public function _getDataTablesQuery($id = null, $id_mapel = null)
  {
    $this->db->select("*");
    $this->db->from("tb_soal");
    $this->db->join("tb_paket", "tb_paket.id_paket = tb_soal.paket_id");
    $this->db->join("tb_mapel", "tb_mapel.id_mapel = tb_soal.mapel_id");
    $this->db->where('tb_soal.paket_id', $id);
    $this->db->where('tb_soal.mapel_id', $id_mapel);


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

  public function getDataTables($id, $id_mapel)
  {
    $this->_getDataTablesQuery($id, $id_mapel);

    if (@$_POST['length'] != -1)
      $this->db->limit(@$_POST['length'], @$_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  public function countFiltered($id, $id_mapel)
  {
    $this->_getDataTablesQuery($id, $id_mapel);
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function countAll()
  {
    $this->db->from('tb_soal');
    return $this->db->count_all_results();
  }

  public function get($id = null, $paket_id = null, $mapel_id = null)
  {
    if ($id != null) {
      $this->db->where('id_soal', $id);
    } elseif ($paket_id != null) {
      $this->db->where('paket_id', $paket_id);
    } elseif ($mapel_id != null) {
      $this->db->where('mapel_id', $mapel_id);
    }
    $query = $this->db->get('tb_soal');
    return $query;
  }

  public function getRest($id, $id_paket, $id_mapel)
  {
    $this->db->select("id_soal,paket_id,mapel_id,soal,option_a,option_b,option_c,option_d,option_e,jawaban_benar");
    $this->db->from("tb_soal");
    if ($id != null) {
      $this->db->where("id_soal", $id);
    } elseif ($id_paket != null) {
      $this->db->where("paket_id", $id_paket);
    } elseif ($id_mapel != null) {
      $this->db->where("mapel_id", $id_mapel);
    }
    return $this->db->get()->result();
    // $html_decoded = "";
    // $query = $this->db->query("SELECT * FROM `tb_soal`");
    // for ($i = 0; $i < $query->num_rows(); $i++) {
    //   // var_dump($query->id_soal);
    //   $result_query[] = $query->result();
    //   $html_decoded[$i]['id_soal'] = html_entity_decode($result_query->id_soal);
    //   $html_decoded[$i]['paket_id'] = html_entity_decode($result_query->paket_id);
    //   $html_decoded[$i]['mapel_id'] = html_entity_decode($result_query->mapel_id);
    //   $html_decoded[$i]['soal'] = html_entity_decode($result_query->soal);
    //   $html_decoded[$i]['option_a'] = html_entity_decode($result_query->option_a);
    //   $html_decoded[$i]['option_b'] = html_entity_decode($result_query->option_b);
    //   $html_decoded[$i]['option_c'] = html_entity_decode($result_query->option_c);
    //   $html_decoded[$i]['option_d'] = html_entity_decode($result_query->option_d);
    //   $html_decoded[$i]['option_e'] = html_entity_decode($result_query->option_e);
    //   $html_decoded[$i]['jawaban_benar'] = html_entity_decode($result_query->jawaban_benar);
    // }
    // return  $html_decoded;
  }

  public function getSoal($paket_id = null, $mapel_id = null)
  {
    $this->db->where('paket_id', $paket_id);
    $this->db->where('mapel_id', $mapel_id);
    $query = $this->db->get('tb_soal');
    return $query;
  }

  public function create($post)
  {
    $params['paket_id'] = $post['paket_id'];
    $params['mapel_id'] = $post['mapel_id'];
    $params['soal'] = $post['soal'];
    $params['option_a'] = $post['option_a'];
    $params['option_b'] = $post['option_b'];
    $params['option_c'] = $post['option_c'];
    $params['option_d'] = $post['option_d'];
    $params['option_e'] = $post['option_e'];
    $params['jawaban_benar'] = $post['jawaban_benar'];

    $this->db->insert('tb_soal', $params);
    return $this->db->affected_rows();
  }

  public function update($post)
  {
    $params['paket_id'] = $post['paket_id'];
    $params['mapel_id'] = $post['mapel_id'];
    $params['soal'] = $post['soal'];
    $params['option_a'] = $post['option_a'];
    $params['option_b'] = $post['option_b'];
    $params['option_c'] = $post['option_c'];
    $params['option_d'] = $post['option_d'];
    $params['option_e'] = $post['option_e'];
    $params['jawaban_benar'] = $post['jawaban_benar'];


    $params['updated'] = date('Y-m-d H:i:s');

    $this->db->where('id_soal', $post['id_soal']);
    $this->db->update('tb_soal', $params);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->where('id_soal', $id);
    $this->db->delete('tb_soal');
    return $this->db->affected_rows();
  }

  // ------------------------------------------------------------------------

}

/* End of file Soal_model.php */
/* Location: ./application/models/Soal_model.php */