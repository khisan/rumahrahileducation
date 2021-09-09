<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Video
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Video extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('Video_model', 'video');
    $this->load->model('Paket_model', 'paket');
    $this->load->model('Mapel_model', 'mapel');
    $this->load->model('Jenjang_model', 'jenjang');
    $this->load->model('Kelas_model', 'kelas');
    $this->load->model('Bab_model', 'bab');
  }

  public function index($id_mapel = NULL, $id_bab = NULL)
  {
    $id_mapel = (isset($id_mapel) && strtolower($id_mapel) != 'null') ? $id_mapel : NULL;
    $id_bab = (isset($id_bab) && strtolower($id_bab) != 'null') ? $id_bab : NULL;

    if (!isAdmin()) return redirect('dashboard');
    if (is_null($id_mapel)) {
      $data['paket'] = NULL;
      $data['bab'] = $this->bab->get($id_bab)->row();
      $data['mapel'] = $this->mapel->get($data['bab']->mapel_id)->row();
      $data['kelas'] = $this->kelas->get($data['mapel']->kelas_id)->row();
      $data['jenjang'] = $this->jenjang->get($data['kelas']->jenjang_id)->row();
    } else {
      $data['mapel'] = $this->mapel->get($id_mapel)->row();
      $data['paket'] = $this->paket->get($data['mapel']->paket_id)->row();
      $data['kelas'] = $this->kelas->get($data['paket']->kelas_id)->row();
      $data['bab'] = null;
      $data['jenjang'] = $this->jenjang->get($data['kelas']->jenjang_id)->row();
    }

    $this->template->load('template', 'master/video-menu/video', $data);
  }

  public function getAjax()
  {
    $id_mapel = NULL === ($this->input->post('id_mapel')) ? null : $this->input->post('id_mapel');
    $id_bab = NULL === ($this->input->post('id_bab')) ? null : $this->input->post('id_bab');
    $id = (empty($this->input->post('id')) || NULL === $this->input->post('id')) ? null : $this->input->post('id');

    $list = $this->video->getDataTables($id, $id_mapel, null, $id_bab);
    $data = [];
    $no = @$_POST['start'];

    foreach ($list as $video) {
      $bab = $this->bab->get(null, $video->mapel_id, null)->result();
      $no++;
      $row = [];
      $row[] = $no . '.';
      $row[] = html_entity_decode($video->nama_video);
      $row[] = html_entity_decode($video->deskripsi);
      $row[] = html_entity_decode($video->nama_mapel);
      $row[] = html_entity_decode($video->link);
      $row[] = '
          <button type="button" value="' . $video->id_video . '"
          data-mapel="' . $video->id_mapel . '"
          data-kelas="' . $this->getKelas($video->id_mapel, false)[0]->id_kelas . '"
          data-jenjang="' . $this->getKelas($video->id_mapel, false)[0]->jenjang_id . '"
          data-bab="' . (empty($bab) ? null : $bab[0]->id_bab) . '"
          data-semester="' . (empty($bab) ? null : $bab[0]->semester) . '"
          class="btn btn-success has-ripple update"><i class="feather mr-2 icon-edit"></i>Update<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
          <button type="button" value="' . $video->id_video . '" class="btn btn-danger has-ripple delete"><i class="feather mr-2 icon-trash"></i>Delete<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
      ';
      $data[] = $row;
    }
    $output = [
      'draw' => @$_POST['draw'],
      'recordsTotal' => $this->video->countAll(),
      'recordsFiltered' => $this->video->countFiltered($id),
      'data' => $data
    ];
    echo json_encode($output);
  }

  public function get()
  {
    $get = $this->input->get(null, TRUE);
    if ($get == null) {
      $query = $this->video->get();
      echo json_encode($query->result_array());
    } else {
      $query = $this->video->get($get['id']);
      echo json_encode($query->row());
    }
  }

  public function add()
  {
    $post = $this->input->post();

    $this->form_validation->set_rules('nama_video', 'nama_video', 'required');
    $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
    $this->form_validation->set_rules('link', 'link', 'required|callback_link_check');
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    } else {
      $data = $this->video->create($post);
      echo json_encode($data);
    }
  }

  public function update()
  {
    $post = $this->input->post(null, TRUE);

    $this->form_validation->set_rules('nama_video', 'nama_video', 'required');
    $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
    $this->form_validation->set_rules('link', 'link', 'required|callback_link_check');
    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

    if ($this->form_validation->run() == false) {
      echo json_encode(validation_errors());
    } else {
      $data = $this->video->update($post);
      echo json_encode($data);
    }
  }

  public function delete()
  {
    $post = $this->input->post(null, TRUE);
    $data = $this->video->delete($post['id']);
    echo json_encode($data);
  }

  public function SMA()
  {
    if (!isAdmin()) redirect('dashboard');
    $data['jenjang'] = 'SMA' or 3;
    $data['kelas'] = $this->kelas->get(null, "SMA")->result();
    $this->template->load('template', 'master/video-menu/kelas', $data);
  }

  public function SBM()
  {
    $data['jenjang'] = 4;
    $data['nama_jenjang'] = 'SBM';
    $data['kelas'] = $this->kelas->get(null, "SBM")->result();
    $this->template->load('template', 'master/video-menu/kelas_lainnya', $data);
  }

  public function Kedinasan()
  {
    $data['jenjang'] = 4;
    $data['nama_jenjang'] = 'Kedinasan';
    $data['kelas'] = $this->kelas->get(null, "Kedinasan")->result();
    $this->template->load('template', 'master/video-menu/kelas_lainnya', $data);
  }

  public function link_check($url)
  {
    if ($this->video->getEmbedUrl($url) == FALSE) {
      $this->form_validation->set_message('link_check', 'Link video harus berasal dari Youtube atau Google Drive');
      return FALSE;
    } else return TRUE;
  }

  public function getKelas($mapel_id = null, $jsonExport = true)
  {
    if ($mapel_id != null) {
      $dataKelas = $this->db->where('id_mapel', $mapel_id)->get('tb_mapel')->row();
      if ($dataKelas->kelas_id == null) $dataKelas = $this->db->where('id_paket', $dataKelas->paket_id)->get('tb_paket')->row();
      $this->db->where('id_kelas', $dataKelas->kelas_id);
    }

    $data = $this->db->get('tb_kelas')->result();
    if ($jsonExport) echo json_encode($data);
    else return $data;
  }

  public function daftarVideo($jenjang = null, $kelas = null)
  {
    if (isAdmin()) redirect('dashboard');

    $data['id_jenjang'] = $jenjang;
    $data['id_kelas'] = $kelas;
    $data['jenjang'] = $this->jenjang->get($jenjang)->row();
    $data['kelas'] = $this->kelas->get($kelas)->row();
    $data['mapel'] = $this->mapel->get()->result();
    $data['bab'] = $this->bab->get()->result();
    $data['paket'] = $this->paket->get()->result();
    $this->template->load('template', 'user/video', $data);
  }

  public function getListVideo()
  {
    $id = (!empty($this->input->post('id_video'))) ? $this->input->post('id_video') : null;
    $id_mapel = (!empty($this->input->post('id_mapel'))) ? $this->input->post('id_mapel') : null;
    $id_bab = (!empty($this->input->post('id_bab'))) ? $this->input->post('id_bab') : null;
    $searchData = (!empty($this->input->post('search_data'))) ? $this->input->post('search_data') : null;

    $list = $this->video->getDataTables($id, $id_mapel, $searchData, $id_bab);
    $data = '<tbody>';
    foreach ($list as $video) {
      if (strpos($video->link, 'youtube.com')) {
        $thumbnail = str_replace('https://www.youtube.com/embed/', 'https://img.youtube.com/vi/', $video->link);
        $thumbnail .= '/default.jpg';
      } else {
        $thumbnail = str_replace('/preview?usp=sharing', '', $video->link);
        $thumbnail = str_replace('file/d/', 'thumbnail?id=', $thumbnail);
      }
      $data .= '
        <tr class="border-bottom">
          <th>
          <div class="row px-0 mx-0">
            <div class="col-4 px-0">
              <img class="img img-responsive w-100 h-100" src="' . $thumbnail . '">
            </div>
            <div class="col-8 pl-2 pr-0">
              <div class="col-12 px-0">
                <p class="font-weight-bold h5">' . $video->nama_video . '<p>
              </div>
              <div class="col-12 px-0 mb-2">
              ' . $video->nama_mapel . ' ' . (isset($video->nama_bab) ? '&#9679;' . $video->nama_bab : '') . '
              </div>
              <div class="col-12 px-0 update-container">
                <button value="' . $video->id_video . '" 
                  class="btn btn-outline-primary hasRipple btn-rounded w-100 play text-center"><i class="feather mr-2 icon-play"></i>Tonton Video<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
              </div>
            </div>
          </div>
          </th>
        </tr>
      ';
    }
    $data .= '</tbody>';
    $data = html_entity_decode($data);
    $output = [
      'data' => $data
    ];
    echo json_encode($output);
  }
}


/* End of file Video.php */
/* Location: ./application/controllers/Video.php */