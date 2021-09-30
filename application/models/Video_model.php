<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Video_model
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

class Video_model extends CI_Model
{

  var $column_order = [null, 'nama_video'];
  var $column_search = ['nama_video'];

  var $order = ['id_video' => 'asc'];
  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------

  public function _getDataTablesQuery($id = null, $id_mapel = null, $searchData = null, $id_bab = null)
  {
    $this->db->select("*");
    $this->db->from("tb_video");
    $this->db->join("tb_mapel", "tb_mapel.id_mapel = tb_video.mapel_id");
    if (!is_null($id)) $this->db->where('tb_video.id_video', $id);
    if (!is_null($id_mapel)) $this->db->where('tb_video.mapel_id', $id_mapel);
    if (!is_null($id_bab)) $this->db->where('tb_video.bab_id', $id_bab);
    $tempRes = $this->db->get()->row();

    if (!is_null($tempRes) && $tempRes->bab_id != NULL) {
      $this->db->select("*");
      $this->db->from("tb_video");
      $this->db->join("tb_bab", "tb_bab.id_bab = tb_video.bab_id");
      $this->db->join("tb_mapel", "tb_mapel.id_mapel = tb_video.mapel_id");
      if (!is_null($id)) $this->db->where('tb_video.id_video', $id);
      if (!is_null($id_mapel)) $this->db->where('tb_video.mapel_id', $id_mapel);
      if (!is_null($id_bab)) $this->db->where('tb_video.bab_id', $id_bab);
    } else {
      $this->db->select("*");
      $this->db->from("tb_video");
      $this->db->join("tb_mapel", "tb_mapel.id_mapel = tb_video.mapel_id");
      if (!is_null($id)) $this->db->where('tb_video.id_video', $id);
      if (!is_null($id_mapel)) $this->db->where('tb_video.mapel_id', $id_mapel);
      if (!is_null($id_bab)) $this->db->where('tb_video.bab_id', $id_bab);
    }

    $data = null;
    if (!is_null($searchData)) {
      foreach ($searchData as $table => $column) {
        foreach ($column as $key => $value) {
          $this->db->like($table . '.' . $key, $value);
        }
      }
    }

    $i = 0;

    if (null !== $this->column_search) {
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
    }
    if (isset($_POST['order'])) {
      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } elseif (isset($this->order)) {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  public function getDataTables($id = null, $id_mapel = null, $searchData = null, $id_bab = null)
  {
    $this->_getDataTablesQuery($id, $id_mapel, $searchData, $id_bab);

    if (null !== (@$_POST['length']) && @$_POST['length'] != -1)
      $this->db->limit(@$_POST['length'], @$_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  public function countFiltered($id = null, $id_mapel, $searchData = null, $id_bab)
  {
    $this->_getDataTablesQuery($id = null, $id_mapel, $searchData = null, $id_bab);
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function countAll()
  {
    $this->db->from('tb_video');
    return $this->db->count_all_results();
  }

  public function get($id = null, $paket_id = null, $mapel_id = null, $bab_id = null)
  {
    $this->db->select("*");
    $this->db->from("tb_video");
    $this->db->join("tb_mapel", "tb_mapel.id_mapel = tb_video.mapel_id");

    if ($id != null) {
      $this->db->where('tb_video.id_video', $id);
    } elseif ($mapel_id != null) {
      $this->db->where('tb_video.mapel_id', $mapel_id);
    } elseif ($bab_id != null) {
      $this->db->where('tb_video.bab_id', $bab_id);
    }
    $query = $this->db->get();
    if (isset($query->row()->bab_id)) {
      if ($query->row()->bab_id != null) {
        $this->db->select("*");
        $this->db->from("tb_video");
        $this->db->join("tb_bab", "tb_bab.id_bab = tb_video.bab_id");
        $this->db->join("tb_mapel", "tb_mapel.id_mapel = tb_video.mapel_id");
        if ($id != null) {
          $this->db->where('tb_video.id_video', $id);
        } elseif ($mapel_id != null) {
          $this->db->where('tb_video.mapel_id', $mapel_id);
        } elseif ($bab_id != null) {
          $this->db->where('tb_video.bab_id', $bab_id);
        }
      } else {
        $this->db->select("*");
        $this->db->from("tb_video");
        $this->db->join("tb_mapel", "tb_mapel.id_mapel = tb_video.mapel_id");
        if ($id != null) {
          $this->db->where('tb_video.id_video', $id);
        } elseif ($mapel_id != null) {
          $this->db->where('tb_video.mapel_id', $mapel_id);
        } elseif ($bab_id != null) {
          $this->db->where('tb_video.bab_id', $bab_id);
        }
      }
      $query = $this->db->get();
    }
    return $query;
  }

  public function getVideo($paket_id = null, $mapel_id = null)
  {
    if ($mapel_id != null) {
      $this->db->where('mapel_id', $mapel_id);
    }
    $query = $this->db->get('tb_video');
    return $query;
  }

  public function create($post)
  {
    $params['mapel_id'] = $post['mapel_id'];
    $params['nama_video'] = $post['nama_video'];
    $params['deskripsi'] = $post['deskripsi'];
    $params['bab_id'] = isset($post['bab_id']) && !empty($post['bab_id']) ? $post['bab_id'] : NULL;
    $params['link'] = $this->getEmbedUrl($post['link']);

    $this->db->insert('tb_video', $params);
    return $this->db->affected_rows();
  }

  public function update($post)
  {
    $params['mapel_id'] = $post['mapel_id'];
    $params['nama_video'] = $post['nama_video'];
    $params['deskripsi'] = $post['deskripsi'];
    $params['bab_id'] = isset($post['bab_id']) && !empty($post['bab_id']) ? $post['bab_id'] : NULL;
    $params['link'] = $this->getEmbedUrl($post['link']);
    $params['updated'] = date('Y-m-d H:i:s');

    $this->db->where('id_video', $post['id_video']);
    $this->db->update('tb_video', $params);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->where('id_video', $id);
    $this->db->delete('tb_video');
    return $this->db->affected_rows();
  }

  public function getEmbedUrl($url)
  {
    if (!function_exists('str_contains')) {
      function str_contains($haystack, $needle)
      {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
      }
    }
    if (
      str_contains($url, 'https://www.youtube.com/embed/') ||
      str_contains($url, 'preview?usp=sharing')
    ) return $url;

    if (str_contains($url, 'drive.google.com')) {
      $convertedUrl = str_replace('/view?usp=sharing', '/preview?usp=sharing', $url);
    } else if (str_contains($url, 'youtu.be') || str_contains($url, 'youtube.com')) {
      $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
      $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

      if (preg_match($longUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
      }

      if (preg_match($shortUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
      }
      $convertedUrl = 'https://www.youtube.com/embed/' . $youtube_id;
    } else {
      return FALSE;
    }

    return $convertedUrl;
  }
  // ------------------------------------------------------------------------

}

/* End of file Video_model.php */
/* Location: ./application/models/Video_model.php */