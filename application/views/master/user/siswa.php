<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="m-b-10">siswa</h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-users"></i></a></li>
          <li class="breadcrumb-item"><a href="#!">siswa</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row siswa-isi">
  <!-- [ static-layout ] start -->
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header text-center">
        <h3 class="text-primary"><strong>siswa</strong></h3>
      </div>
      <div class="card-body">
        <div class="float-right mb-3">
          <button type="button" class="btn btn-primary has-ripple" id="siswaAdd"><i class="feather mr-2 icon-plus"></i>Tambah Data<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Jenjang</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Sekolah</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Image</th>
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
        <h4 class="modal-title judul">siswa</h4>
        <button type="button" class="close tutup-modal" data-dismiss="modal">×</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="validation">

        </div>
        <form id="submitForm" method="post" enctype="multipart/form-data">
          <div class="form-group fill">
            <input type="hidden" name="id_siswa" id="id">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
          </div>
          <div class="form-group fill">
            <label for="nama">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="username">
          </div>
          <div class="form-row">
            <div class="form-group col-md-4 fill">
              <label for="jenjang">Jenjang</label>
              <select class="form-control" name="jenjang_id" id="jenjang">
                <option selected value="">Pilih Jenjang</option>
                <?php foreach ($jenjang->result() as $jen) { ?>
                  <option value="<?= $jen->id_jenjang; ?>"><?= $jen->nama_jenjang; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4 fill">
              <label for="kelas">Kelas</label>
              <select class="form-control" name="kelas_id" id="kelas">
                <option selected value="">Pilih Kelas</option>
                <?php foreach ($kelas->result() as $kel) { ?>
                  <option value="<?= $kel->id_kelas; ?>"><?= $kel->nama_kelas; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4 fill">
              <label for="jurusan">Jurusan</label>
              <select class="form-control" name="jurusan_id" id="jurusan">
                <option selected value="">Pilih Jurusan</option>
                <?php foreach ($jurusan->result() as $jur) { ?>
                  <option value="<?= $jur->jurusan; ?>"><?= $jur->jurusan; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group fill">
            <label for="sekolah">Sekolah</label>
            <input type="text" class="form-control" id="sekolah" name="sekolah" placeholder="Sekolah">
            <small>Contoh : SDN Polehan 1, SMPN 1 Singasari, SMKN 1 Singasari</small>
          </div>
          <div class="form-group fill">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control"></textarea>
          </div>
          <div class="form-group fill">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            <small>Contoh : budi@gmail.com</small>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6 fill">
              <label for="password1">Password</label>
              <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
              <div class="pass"></div>
            </div>
            <div class="form-group col-md-6 fill">
              <label for="password2">Confirm Password</label>
              <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password">
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="inputGroupFile01">Photo Profile</label>
            <div class="image"></div>
            <div class="custom-file mt-3">
              <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
              <label class="custom-file-label" for="inputGroupFile01">Pilih Photo Profile</label>
            </div>
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
<script>
  $(document).ready(function() {
    // Chained Dropdown
    $('#jenjang').change(function() {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("kelas/listKelas"); ?>",
        data: {
          jenjang_id: $("#jenjang").val()
        },
        dataType: "json",
        beforeSend: function(e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response) {
          $("#kelas").html(response.list_kelas);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
    });

    $('#kelas').change(function() {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("kelas/listJurusan"); ?>",
        data: {
          kelas_id: $("#kelas").val()
        },
        dataType: "json",
        beforeSend: function(e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response) {
          $("#jurusan").html(response.list_jurusan);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
    });

    // Ajax
    const site_url = "<?= site_url('siswa/'); ?>";
    $('.siswa-isi').on('click', '#siswaAdd', function() {
      $('.judul').html('Tambah siswa');
      $('.simpan').html('Tambah Data');
      $('.simpan').attr('id', 'add');
      $("#myModal").modal('show');
      $('.validation').html(null);
      $('.image').html(null);
      $('.pass').html(null);

    });

    $('.siswa-isi').on('click', '.update', function() {
      $('.judul').html('Update siswa');
      $('.simpan').html('Update Data');
      $('.simpan').attr('id', 'update');
      $("#myModal").modal('show');
      $('.validation').html(null);

      let id = $(this).attr('value');

      $.ajax({
        type: "GET",
        url: site_url + "get",
        data: {
          id: id
        },
        dataType: "JSON",
        success: function(response) {
          $('#id').val(response.id_siswa_profile);
          $('#nama').val(response.nama);
          $('#username').val(response.username);
          $('#jenjang').val(response.jenjang_id);
          $('#kelas').val(response.kelas_id);
          $('#jurusan').val(response.jurusan_id);
          $('#sekolah').val(response.sekolah);
          $('#alamat').val(response.alamat);
          $('#email').val(response.email);
          $('.image').html(`<img src="<?= site_url('uploads/siswa/'); ?>${response.image}" class="rounded mx-auto d-block alt="" width="200px">`);
          $('.pass').html(`<small>Kosongkan saja jika tidak ingin merubah password</small>`);
        }
      });

    });


    $('#myModal').on('click', '.simpan', function() {
      event.preventDefault();
      let url = '';

      let id = $('#id').val();
      let nama = $('#nama').val();
      let username = $('#username').val();
      let jenjang = $('#jenjang').val();
      let kelas = $('#kelas').val();
      let jurusan = $('#jurusan').val();
      let sekolah = $('#sekolah').val();
      let alamat = $('#alamat').val();
      let email = $('#email').val();
      let password1 = $('#password1').val();
      let password2 = $('#password2').val();
      let image = $('#image')[0].files[0];

      let formData = new FormData();

      formData.append('id_siswa', id);
      formData.append('nama', nama);
      formData.append('username', username);
      formData.append('jenjang_id', jenjang);
      formData.append('kelas_id', kelas);
      formData.append('jurusan_id', jurusan);
      formData.append('sekolah', sekolah);
      formData.append('alamat', alamat);
      formData.append('email', email);
      formData.append('password1', password1);
      formData.append('password2', password2);
      formData.append('image', image);

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

    $('.siswa-isi').on('click', '.delete', function() {
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
              success: function(response) {
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
        url: '<?= site_url('siswa/getAjax'); ?>',
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

    $('.tutup-modal').on('click', function() {
      $('#submitForm')[0].reset();
    });

    $('.tutup').on('click', function() {
      $('#submitForm')[0].reset();
      $("#myModal").modal('hide');
      $('.validation').html(null);
    });

    $('#myModal').on('click', '.reset', function() {
      $('#submitForm')[0].reset();
      $('.validation').html(null);
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