<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="m-b-10">soal</h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-users"></i></a></li>
          <li class="breadcrumb-item"><a href="#!">soal</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row soal-isi">
  <!-- [ static-layout ] start -->
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header text-center">
        <h3 class="text-primary"><strong>soal</strong></h3>
      </div>
      <div class="card-body">
        <div class="row mb-3">
          <div class="col-sm-5">
            <h1>Soal</h1>
          </div>
          <div class="offset-sm-6 col-sm-1">
            <div class="float-right">
              <?php if ($paket->kelas_id == 19) { ?>
                <a href="<?= site_url("mapel/lainnya/$paket->kelas_id/$paket->id_paket"); ?>" class="btn btn-warning btn-flat">
                  <i class="fa fa-undo"></i> Back</a>
              <?php } else { ?>
                <a href="<?= site_url("paket/index/$paket->bab_id"); ?>" class="btn btn-warning btn-flat">
                  <i class="fa fa-undo"></i> Back</a>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="float-right mb-3">
          <button type="button" class="btn btn-primary has-ripple" id="soalAdd"><i class="feather mr-2 icon-plus"></i>Tambah Data<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Soal Gambar</th>
                <th>Soal Text</th>
                <th>Option A</th>
                <th>Option B</th>
                <th>Option C</th>
                <th>Option D</th>
                <th>Option E</th>
                <th>Jawaban Benar</th>
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
        <h4 class="modal-title judul">soal</h4>
        <button type="button" class="close tutup-modal" data-dismiss="modal">×</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="validation">

        </div>
        <form id="submitForm" method="post" enctype="multipart/form-data">
          <div class="form-group mb-3">
            <label for="inputGroupFile01">Soal Gambar</label>
            <div class="custom-file">
              <input type="file" id="soal_gambar" class="custom-file-input" name="soal_gambar" accept="image/*">
              <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
            </div>
          </div>
          <div class="form-group fill">
            <input type="hidden" name="id_soal" id="id">
            <input type="hidden" name="paket_id" id="paket_id" value="<?= $paket->id_paket; ?>">
            <input type="hidden" name="mapel_id" id="mapel_id" value="<?= $mapel->id_mapel; ?>">
            <label for="soal_text">Soal Text</label>
            <textarea name="soal_text" id="soal_text" class="form-control texteditor ckeditor"></textarea>
          </div>
          <div class="form-group fill">
            <label for="option_a">Option A</label>
            <textarea name="option_a" id="option_a" class="form-control texteditor ckeditor"></textarea>
          </div>
          <div class="form-group fill">
            <label for="option_b">Option B</label>
            <textarea name="option_b" id="option_b" class="form-control texteditor ckeditor"></textarea>
          </div>
          <div class="form-group fill">
            <label for="option_c">Option C</label>
            <textarea name="option_c" id="option_c" class="form-control texteditor ckeditor"></textarea>
          </div>
          <div class="form-group fill">
            <label for="option_d">Option D</label>
            <textarea name="option_d" id="option_d" class="form-control texteditor ckeditor"></textarea>
          </div>
          <div class="form-group fill">
            <label for="option_e">Option E</label>
            <textarea name="option_e" id="option_e" class="form-control texteditor ckeditor"></textarea>
          </div>
          <div class="form-group fill">
            <label for="jawaban">Jawaban Benar</label>
            <select class="form-control" name="jawaban_benar" id="jawaban_benar">
              <option value="default">--Pilih Salah Satu--</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
              <option value="E">E</option>
            </select>
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
    const site_url = "<?= site_url('soal/'); ?>";
    $('.soal-isi').on('click', '#soalAdd', function() {
      $('.judul').html('Tambah soal');
      $('.simpan').html('Tambah Data');
      $('.simpan').attr('id', 'add');
      $("#myModal").modal('show');
      $('.validation').html(null);
      $('.image').html(null);


    });

    $('.soal-isi').on('click', '.update', function() {
      $('.judul').html('Update soal');
      $('.simpan').html('Update Data');
      $('.simpan').attr('id', 'update');
      $("#myModal").modal('show');
      $('.validation').html(null);

      let id = $(this).attr('value');
      let paket_id = $(this).attr('value');
      let mapel_id = $(this).attr('value');

      $.ajax({
        type: "GET",
        url: site_url + "get",
        data: {
          id: id,
          paket_id: paket_id,
          mapel_id: mapel_id
        },
        dataType: "JSON",
        success: function(response) {
          $('#id').val(response.id_soal);
          $('#soal_text').val(response.soal_text);
          $('#option_a').val(response.option_a);
          $('#option_b').val(response.option_b);
          $('#option_c').val(response.option_c);
          $('#option_d').val(response.option_d);
          $('#option_e').val(response.option_e);
          $('#jawaban_benar').val(response.jawaban_benar);
          $('.image').html(`<img src="<?= site_url('uploads/soal/'); ?>${response.soal_gambar}" class="rounded mx-auto d-block" alt="" width="200px">`);

        }
      });

    });


    $('#myModal').on('click', '.simpan', function() {
      event.preventDefault();
      let url = '';

      let id = $('#id').val();
      let paket_id = $('#paket_id').val();
      let mapel_id = $('#mapel_id').val();
      let soal_text = CKEDITOR.instances['soal_text'].getData();
      let option_a = CKEDITOR.instances['option_a'].getData();
      let option_b = CKEDITOR.instances['option_b'].getData();
      let option_c = CKEDITOR.instances['option_c'].getData();
      let option_d = CKEDITOR.instances['option_d'].getData();
      let option_e = CKEDITOR.instances['option_e'].getData();
      let jawaban_benar = $('#jawaban_benar').val();
      let soal_gambar = $('[name="soal_gambar"]')[0].files[0];
      let formData = new FormData();

      formData.append('id_soal', id);
      formData.append('soal_text', soal_text);
      formData.append('paket_id', paket_id);
      formData.append('mapel_id', mapel_id);
      formData.append('soal_gambar', soal_gambar);
      formData.append('option_a', option_a);
      formData.append('option_b', option_b);
      formData.append('option_c', option_c);
      formData.append('option_d', option_d);
      formData.append('option_e', option_e);
      formData.append('jawaban_benar', jawaban_benar);


      console.log(formData);
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
          //console.log(response);
          if (response >= 0) {
            reloadTable();
            $("#myModal").modal('hide');
            $('#submitForm')[0].reset();
            $('#soal_gambar').next('label').html('Pilih Gambar');
            CKEDITOR.instances.soal_text.setData('');
            CKEDITOR.instances.option_a.setData('');
            CKEDITOR.instances.option_b.setData('');
            CKEDITOR.instances.option_c.setData('');
            CKEDITOR.instances.option_d.setData('');
            CKEDITOR.instances.option_e.setData('');
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

    $('.soal-isi').on('click', '.delete', function() {
      let id = $(this).attr('value');

      console.log(id);

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
              //,
              //                     error: function (request, status, error) {
              // alert(request.responseText);
              //}
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
        url: '<?= site_url("soal/getAjax/$paket->id_paket/$mapel->id_mapel"); ?>',
        type: 'POST'
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
      $("#submitForm")[0].reset();
      $("#myModal").modal('hide');
      $('#soal_gambar').next('label').html('Pilih Gambar');
      CKEDITOR.instances.soal_text.setData('');
      CKEDITOR.instances.option_a.setData('');
      CKEDITOR.instances.option_b.setData('');
      CKEDITOR.instances.option_c.setData('');
      CKEDITOR.instances.option_d.setData('');
      CKEDITOR.instances.option_e.setData('');
      $('.validation').html(null);
    });

    $('#myModal').on('click', '.reset', function() {
      $('#submitForm').reset();
      $('.validation').html(null);
      $('#soal_gambar').next('label').html('Pilih Gambar');
      CKEDITOR.instances.soal_text.setData('');
      CKEDITOR.instances.option_a.setData('');
      CKEDITOR.instances.option_b.setData('');
      CKEDITOR.instances.option_c.setData('');
      CKEDITOR.instances.option_d.setData('');
      CKEDITOR.instances.option_e.setData('');
    });

    function reloadTable() {
      table.ajax.reload();
    }

    $('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

  })
</script>