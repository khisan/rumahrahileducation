<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="m-b-10">Video</h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-users"></i></a></li>
          <li class="breadcrumb-item"><a href="<?= (!is_null($bab)) ? site_url("Video/$jenjang->nama_jenjang") : site_url("Video/$kelas->nama_kelas"); ?>"><?= $jenjang->nama_jenjang; ?></a></li>
          <li class="breadcrumb-item"><a href="<?= (is_null($bab) ? site_url("Video/$kelas->nama_kelas") : site_url("mapel/$jenjang->nama_jenjang/$mapel->kelas_id")); ?>/video"><?= $kelas->nama_kelas . ' ' . $kelas->jurusan; ?></a></li>
          <?php if (!is_null($bab)) : ?>
            <li class="breadcrumb-item"><a href="<?= (is_null($bab) ? '#!' : site_url("bab/$jenjang->nama_jenjang/$mapel->id_mapel")); ?>/video"><?= $mapel->nama_mapel; ?></a></li>
            <li class="breadcrumb-item"><a href="<?= site_url("bab/$jenjang->nama_jenjang/$mapel->id_mapel") ?>/video"><?= $bab->nama_bab; ?></a></li>
          <?php else : ?>
            <li class="breadcrumb-item"><a href="<?= site_url("mapel/lainnya/null/video/$kelas->id_kelas"); ?>"><?= $mapel->nama_mapel; ?></a></li>
          <?php endif; ?>
          <li class="breadcrumb-item"><a href="#!">Video</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row video-isi">
  <!-- [ static-layout ] start -->
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header text-center">
        <h3 class="text-primary"><strong>Video : <?= is_null($bab) ? $mapel->nama_mapel : $bab->nama_bab ?></strong></h3>
      </div>
      <div class="card-body">
        <div class="row mb-3">
          <div class="col-sm-5">
            <h1>Video</h1>
          </div>
          <div class="offset-sm-6 col-sm-1">
            <div class="float-right">
              <?php if (is_null($bab)) { ?>
                <a href="<?= site_url("mapel/lainnya/null/video/$kelas->id_kelas"); ?>" class="btn btn-warning btn-flat">
                  <i class="fa fa-undo"></i> Back</a>
              <?php } else { ?>
                <a href="<?= site_url("bab/$jenjang->nama_jenjang/$mapel->id_mapel"); ?>/video" class="btn btn-warning btn-flat">
                  <i class="fa fa-undo"></i> Back</a>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="float-right mb-3">
          <button type="button" class="btn btn-primary has-ripple" id="videoAdd"><i class="feather mr-2 icon-plus"></i>Tambah Data<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
        </div>
        <div class="table-responsive">
          <input type="hidden" name="id_mapel" id="id_mapel" value="<?= $mapel->id_mapel ?>">
          <input type="hidden" name="id_bab" id="id_bab" value="<?= ($bab !== NULL) ? $bab->id_bab : '' ?>">
          <table class="table table-bordered table-striped" id="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Video</th>
                <th>Deskripsi</th>
                <th>Mapel</th>
                <th>Link</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- [ static-layout ] end -->
</div>
<div class="modal fade bd-example-modal-xl" id="myModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title judul">Video</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="validation">

        </div>
        <form id="submitForm" method="post" enctype="multipart/form-data">

          <div class="form-group fill">
            <input type="hidden" name="id_video" id="id">
            <label for="video">Nama Video</label>
            <input type="text" class="form-control" id="nama_video" name="nama_video" placeholder="Ketik Nama Video">
          </div>
          <div class="form-group fill">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control texteditor ckeditor"></textarea>
          </div>
          <div class="form-group fill">
            <label for="link">Link</label>
            <input type="text" class="form-control" id="link" name="link" placeholder="Ketik link video">
          </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary reset" id="reset">Reset</button>
        <button type="button" class="btn btn-success simpan" id="save">Submit</button>
        <button type="button" class="btn btn-danger tutup" id="close">Close</button>
      </div>

    </div>
  </div>
</div>
<script src="<?= site_url("assets/ckeditor") ?>/ckeditor.js"></script>
<script>
  $(document).ready(function() {
    const site_url = "<?= site_url('video/'); ?>";

    $('.video-isi').on('click', '#videoAdd', function() {
      resetForm();
      CKEDITOR.instances.deskripsi.setData('');
      $('.judul').html('Tambah video');
      $('.simpan').html('Tambah Data');
      $('.simpan').attr('id', 'add');
      $("#myModal").modal('show');
      $('.validation').html(null);
      $('.image').html(null);

    });

    $('.video-isi').on('click', '.update', function() {
      resetForm();

      $('.judul').html('Update video');
      $('.simpan').html('Update Data');
      $('.simpan').attr('id', 'update');
      $("#myModal").modal('show');
      $('.validation').html(null);

      let id = $(this).attr('value');
      $.ajax({
        type: "GET",
        async: false,
        url: site_url + "get",
        data: {
          id: id,
          <?php if (isset($paket)) { ?>
            paket_id: <?= $paket->id_paket ?>,
          <?php } else { ?>
            bab_id: <?= $bab->id_bab ?>,
          <?php } ?>
          mapel_id: $("id_mapel").val()
        },
        dataType: "JSON",
        success: function(response) {
          $('#id').val(response.id_video);
          $('#nama_video').val(response.nama_video);
          $('#link').val(response.link);
          CKEDITOR.instances.deskripsi.setData(response.deskripsi);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status);
          alert(thrownError);
        }
      });

    });

    $('#myModal').on('click', '.simpan', function() {
      event.preventDefault();
      let url = '';

      let id = $('#id').val();
      let mapel_id = $('#id_mapel').val();
      let bab_id = $('#id_bab').val();
      let nama_video = $('#nama_video').val();
      let deskripsi = CKEDITOR.instances.deskripsi.getData('');
      let link = $('#link').val();
      let formData = new FormData();

      formData.append('id_video', id);
      formData.append('mapel_id', mapel_id);
      formData.append('bab_id', bab_id);
      formData.append('nama_video', nama_video);
      formData.append('deskripsi', deskripsi);
      formData.append('link', link);

      if ($(this).attr('id') == 'update') {
        url = 'update';
      } else if ($(this).attr('id') == 'add') {
        url = 'add';
      }
      $.ajax({
        type: "POST",
        url: site_url + url,
        data: formData,
        processData: false,
        contentType: false,
        dataType: "JSON",
        success: function(response) {
          if (response >= 0) {
            reloadTable();
            $("#myModal").modal('hide');
            $('#submitForm')[0].reset();
            CKEDITOR.instances.deskripsi.setData('');
            $('.validation').html(null);
          } else {
            $('.validation').html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    ${response}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>`);
          }
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status);
          alert(thrownError);
        }
      });
    });

    $('.video-isi').on('click', '.delete', function() {
      let id = $(this).attr('value');

      swal({
          title: "Apakah anda yakin?",
          text: "data akan terkapus secara permanent!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              type: "POST",
              url: site_url + "delete",
              data: {
                id: id
              },
              dataType: "JSON",
              success: function(response)

              {

                reloadTable();
                swal("Selamat, file berhasil di hapus!", {
                  icon: "success",

                });
              }
            });
          } else {
            swal("Data batal di hapus!");
          }
        });
    });

    let table = $('#table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: '<?= site_url("video/getAjax"); ?>',
        type: 'POST',
        data: {
          id_mapel: <?= $mapel->id_mapel ?>,
          <?php if (isset($paket)) { ?>
            id_paket: <?= $paket->id_paket ?>,
          <?php } else { ?>
            id_bab: <?= $bab->id_bab ?>,
          <?php } ?>
          id: null
        },
        dataType: 'json',
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      },
      columnDefs: [{
          targets: [-1],
          className: 'text-center'
        },
        {
          targets: [-1, -2, -3],
          orderable: false
        }
      ]
    });

    $('.tutup').on('click', function() {
      resetForm();
      $("#myModal").modal('hide');
    });

    $('#myModal').on('click', '.reset', function() {
      $('#submitForm')[0].reset();
      $('.validation').html(null);
      CKEDITOR.instances.deskripsi.setData('');
    });

    function reloadTable() {
      table.ajax.reload();
    }

    function resetForm() {
      $("#submitForm")[0].reset();
      $('.validation').html(null);
    }

  })
</script>