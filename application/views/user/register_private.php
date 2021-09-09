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
            <form action="<?= site_url('auth/process'); ?>" method="post">
              <div class="form-group mb-3">
                <label class="floating-label">Nama</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="">
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
                      <option value="<?= $jur->jurusan; ?>"><?= $jur->jurusan; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group mb-3">
                <label class="floating-label">Sekolah</label>
                <input type="text" class="form-control" id="sekolah" name="sekolah" placeholder="">
              </div>
              <div class="form-group mb-3">
                <label class="floating-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="">
              </div>
              <div class="form-group mb-3">
                <label class="floating-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="">
              </div>
          </div>
          <button type="submit" class="btn btn-block btn-primary mb-4" name="register">Daftar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="<?= site_url('assets/able/'); ?>assets/js/vendor-all.min.js"></script>
<script src="<?= site_url('assets/able/'); ?>assets/js/plugins/bootstrap.min.js"></script>
<script src="<?= site_url('assets/able/'); ?>assets/js/ripple.js"></script>
<script src="<?= site_url('assets/able/'); ?>assets/js/pcoded.min.js"></script>



</body>

</html>