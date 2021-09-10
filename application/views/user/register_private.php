<!DOCTYPE html>
<html lang="en">

<head>

  <title>Register Private</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="" />
  <meta name="keywords" content="">
  <meta name="author" content="Phoenixcoded" />
  <!-- Favicon icon -->
  <link rel="icon" href="<?= site_url('assets/able/'); ?>assets/images/favicon.ico" type="image/x-icon">

  <!-- vendor css -->
  <link rel="stylesheet" href="<?= site_url('assets/able/'); ?>assets/css/style.css">


</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
  <div class="auth-content" style="width: 500px;">
    <div class="card">
      <div class="row align-items-center text-center">
        <div class="col-md-12">
          <div class="card-body">
            <h4 class="mb-3 f-w-400">Daftar</h4>
            <form action="<?= site_url('authprivate/process'); ?>" method="post">
              <div class="form-group mb-3">
                <input type="text" class="form-control" name="nama" placeholder="Nama">
              </div>
              <div class="form-row">
                <div class="form-group col-md-12 fill">
                  <select class="form-control" name="jenjang_id" id="jenjang">
                    <option selected value="">Pilih Jenjang</option>
                    <?php foreach ($jenjang->result() as $jen) { ?>
                      <option value="<?= $jen->id_jenjang; ?>"><?= $jen->nama_jenjang; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12 fill">
                  <select class="form-control" name="kelas_id" id="kelas">
                    <option selected value="">Pilih Kelas</option>
                    <?php foreach ($kelas->result() as $kel) { ?>
                      <option value="<?= $kel->id_kelas; ?>"><?= $kel->nama_kelas; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12 fill">
                  <select class="form-control" name="jurusan_id" id="jurusan">
                    <option selected value="">Pilih Jurusan</option>
                    <?php foreach ($jurusan->result() as $jur) { ?>
                      <option value="<?= $jur->id_kelas; ?>"><?= $jur->jurusan; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group mb-3">
                <input type="text" class="form-control" name="sekolah" placeholder="Sekolah">
              </div>
              <div class="form-group mb-3">
                <input type="text" class="form-control" name="alamat" placeholder="Alamat">
              </div>
              <div class="form-group mb-3">
                <input type="text" class="form-control" name="email" placeholder="Email">
              </div>
          </div>
          <button type="submit" class="btn btn-block btn-primary mb-4" name="register">Daftar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Required Js -->
<script src="<?= site_url('assets/able/'); ?>assets/js/vendor-all.min.js"></script>
<script src="<?= site_url('assets/able/'); ?>assets/js/plugins/bootstrap.min.js"></script>
<script src="<?= site_url('assets/able/'); ?>assets/js/ripple.js"></script>
<script src="<?= site_url('assets/able/'); ?>assets/js/pcoded.min.js"></script>
<script src="<?= base_url('assets/able/') ?>assets/js/jquery.js"></script>

<script>
  $(document).ready(function() {
    // Chained Dropdown
    $('#jenjang').change(function() {
      if ($('#jenjang').val() == 1 || $('#jenjang').val() == 2) {
        $('#jurusan').attr('disabled', 'disabled')
      } else {
        $('#jurusan').removeAttr('disabled');
      }
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
  })
</script>

</body>

</html>