<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="m-b-10">Dashboard</h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
  <!-- [ static-layout ] start -->
  <?php
  $id = $this->session->userdata('userid');
  $nama = $this->session->userdata('nama');
  $jenjang = $this->session->userdata('jenjang');
  $kelas = $this->session->userdata('kelas');
  $sekolah = $this->session->userdata('sekolah');
  $jurusan = $this->session->userdata('jurusan');
  if (strpos($id, 'SD') == 'true' or strpos($id, 'SMP') == 'true') { ?>
    <div class="col-xl-4 col-md-12">
      <div class="card table-card">
        <div class="card-header">
          <h5>Informasi Akun</h5>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover">
              <tr>
                <th>Nama</th>
                <td><?= $nama ?></td>
              </tr>
              <tr>
                <th>Jenjang</th>
                <td><?= $jenjang ?></td>
              </tr>
              <tr>
                <th>Kelas</th>
                <td><?= $kelas ?></td>
              </tr>
              <tr>
                <th>Sekolah</th>
                <td><?= $sekolah ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-8 col-md-12">
      <div class="card latest-update-card">
        <div class="card-header">
          <h3 class="text-primary"><strong>Rumah Rahil Education</strong></h3>
        </div>
        <div class="card-body">
          <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_JYe5t7/data2.json" background="transparent" speed="1" style="width: 600px; height: 600px;" loop autoplay class="mx-auto my-auto"></lottie-player>
        </div>
      </div>
    </div>
  <?php } elseif (strpos($id, 'SMA') == 'true' or strpos($id, 'SBM') == 'true' or strpos($id, 'Kedinasan') == 'true') { ?>
    <div class="col-xl-4 col-md-12">
      <div class="card table-card">
        <div class="card-header">
          <h5>Informasi Akun</h5>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover">
              <tr>
                <th>Nama</th>
                <td><?= $nama ?></td>
              </tr>
              <tr>
                <th>Jenjang</th>
                <td><?= $jenjang ?></td>
              </tr>
              <tr>
                <th>Kelas</th>
                <td><?= $kelas ?></td>
              </tr>
              <tr>
                <th>Jurusan</th>
                <td><?= $jurusan ?></td>
              </tr>
              <tr>
                <th>Sekolah</th>
                <td><?= $sekolah ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-8 col-md-12">
      <div class="card latest-update-card">
        <div class="card-header">
          <h3 class="text-primary"><strong>Rumah Rahil Education</strong></h3>
        </div>
        <div class="card-body">
          <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_JYe5t7/data2.json" background="transparent" speed="1" style="width: 600px; height: 600px;" loop autoplay class="mx-auto my-auto"></lottie-player>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <div class="col-xl-12 col-md-12">
      <div class="card">
        <div class="card-header text-center">
          <h3 class="text-primary"><strong>Rumah Rahil Education</strong></h3>
        </div>
        <div class="card-body ">
          <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_JYe5t7/data2.json" background="transparent" speed="1" style="width: 600px; height: 600px;" loop autoplay class="mx-auto my-auto"></lottie-player>
        </div>
      </div>
    <?php } ?>
    </div>
    <!-- [ static-layout ] end -->
</div>