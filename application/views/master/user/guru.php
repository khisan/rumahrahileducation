<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="m-b-10">Guru</h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-users"></i></a></li>
          <li class="breadcrumb-item"><a href="#!">Guru</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row guru-isi">
  <!-- [ static-layout ] start -->
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header text-center">
        <h3 class="text-primary"><strong>Guru</strong></h3>
      </div>
      <div class="card-body">
        <div class="float-right mb-3">
          <button type="button" class="btn btn-primary has-ripple" id="guruAdd"><i class="feather mr-2 icon-plus"></i>Tambah Data<span class="ripple ripple-animate" style="height: 112.65px; width: 112.65px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -38.825px; left: -2.85833px;"></span></button>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="table">
            <thead>
              <tr>
                <th>No</th>
                <th>username</th>
                <th>nama</th>
                <th>alamat</th>
                <th>email</th>
                <th>Image</th>
                <th>password</th>
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
        <h4 class="modal-title judul">Guru</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="validation">
        </div>
        <form id="submitForm">
          <div class="form-group fill">
            <input type="hidden" name="id_guru_profile" id="id">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
          </div>
          <div class="form-group fill">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Name">
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
            </div>
            <div class="form-group col-md-6 fill">
              <label for="password2">Confirm Password</label>
              <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password">
            </div>
            <div class="form-group col-md-12">
              <label for="inputGroupFile01">Photo Profile</label>
              <div class="image"></div>
              <br>
              <div class=" custom-file mt-12">
                <input type="file" class="custom-file-input" id="inputGroupFile01" name="image" accept="image/*">
                <label class="custom-file-label" for="inputGroupFile01">Pilih Photo Profile</label>
              </div>
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
    const site_url = "<?= site_url('guru/'); ?>";
    $('.guru-isi').on('click', '#guruAdd', function() {
      $('.judul').html('Tambah Guru');
      $('.simpan').html('Tambah Data');
      $('.simpan').attr('id', 'add');
      $("#myModal").modal('show');
      $('.validation').html(null);

    });

    $('.guru-isi').on('click', '.update', function() {
      $('.judul').html('Update Guru');
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
          $('#id').val(response.id_guru_profile);
          $('#username').val(response.username);
          $('#nama').val(response.nama);
          $('#alamat').val(response.alamat);
          $('#email').val(response.email);
          $('.image').html(`<img src="<?= site_url('uploads/guru/'); ?>${response.image}" class="rounded mx-auto d-block alt="" width="200px">`);
          $('.pass').html(`<small>Kosongkan saja jika tidak ingin merubah password</small>`);
        }
      });

    });


    $('#myModal').on('click', '.simpan', function() {
      let url = '';
      let datastring = $("#submitForm").serialize();

      if ($(this).attr('id') == 'update') {
        url = 'update';
      } else if ($(this).attr('id') == 'add') {
        url = 'add';
      }
      $.ajax({
        type: "POST",
        url: site_url + url,
        data: datastring,
        dataType: "JSON",
        success: function(response) {
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
        }
      });
    });

    $('.guru-isi').on('click', '.delete', function() {
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
        url: '<?= site_url('guru/getAjax'); ?>',
        type: 'POST'
      },
      columnDefs: [{
          targets: [-1],
          className: 'text-center'
        },
        {
          targets: [0, 3, 4, -2, -1],
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
  })
</script>