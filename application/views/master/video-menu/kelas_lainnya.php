<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="m-b-10">Admin</h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#!"><i class="fas fa-school"></i></a></li>
          <li class="breadcrumb-item"><a href="#!"><?= $nama_jenjang; ?></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row admin-isi">
  <!-- [ static-layout ] start -->
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header text-center">
        <h3 class="text-primary"><strong>Kelas <?= $nama_jenjang; ?></strong></h3>
      </div>
      <div class="card-body">
        <div class="row">
          <?php foreach ($kelas as $key) { ?>
            <div class="col-lg-4">
              <div class="card p-2">
                <a class="card-block stretched-link text-decoration-none" href="<?= site_url("mapel/lainnya/null/video/$key->id_kelas"); ?>">
                  <div class="row">
                    <div class="col-sm-6">
                      <h2 class="card-title"><?= $key->nama_kelas; ?></h2>
                      <h6><?= $key->jurusan; ?></h6>
                    </div>
                    <div class="col-sm-3 offset-sm-3">
                      <h1><i class="fas fa-school"></i></h1>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <!-- [ static-layout ] end -->
</div>