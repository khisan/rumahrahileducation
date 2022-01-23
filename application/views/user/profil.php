<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="m-b-10">Profil</h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-user"></i></a></li>
          <li class="breadcrumb-item"><a href="#!">Profil</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
  <!-- [ static-layout ] start -->
  <?php $jenjang = $this->session->userdata('jenjang');
  $kelas = $this->session->userdata('kelas'); ?>
  <div class="col-md-5">
    <div class="card">
      <div class="card-header">
        <h5>Edit Profil</h5>
      </div>
      <center>
        <img src="<?= base_url() . './uploads/siswa/' . $data->image; ?>" class="img-fluid mt-4" />
        <div class="card-body">
          <h4 class="card-title m-t-10"> <?= $data->nama ?> </h4>
          <p><?= $data->sekolah ?></p>
        </div>
      </center>
    </div>
  </div>
  <div class="col-md-7">
    <div class="card">
      <div class="card-body">
        <form class="form-horizontal form-material" action="<?= base_url('profil/update') ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label class="col-md-12 mb-0">Nama Lengkap</label>
            <div class="col-md-12">
              <input type="hidden" class="form-control pl-0 form-control-line" name="id_siswa" value="<?= $data->id_siswa_profile ?>">
              <input type="hidden" class="form-control pl-0 form-control-line" name="jenjang_id" value="<?= $jenjang ?>">
              <input type="hidden" class="form-control pl-0 form-control-line" name="kelas_id" value="<?= $kelas ?>">
              <input type="text" class="form-control pl-0 form-control-line" name="nama" value="<?= $data->nama ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-12 mb-0">Nama Sekolah</label>
            <div class="col-md-12">
              <input type="text" class="form-control pl-0 form-control-line" name="sekolah" value="<?= $data->sekolah ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-12 mb-0">Foto</label>
            <div class="col-md-12">
              <input type="file" name="foto" class="form-control pl-0 form-control-line">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12 d-flex">
              <button class="btn btn-success mx-auto mx-md-0 text-white" type="submit">Ubah Profil</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>