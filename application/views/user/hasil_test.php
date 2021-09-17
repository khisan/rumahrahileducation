<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="m-b-10">Hasil Test</h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-users"></i></a></li>
          <li class="breadcrumb-item"><a href="#!">Hasil Test</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header text-center">
        <h3 class="text-primary"><strong>Hasil Test</strong></h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Paket</th>
                <th>Nama Mapel</th>
                <th>Nama Siswa</th>
                <th>Nilai</th>
                <th>Tanggal Test</th>
                <th>Detail Test</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
<script>
  let table = $('#table').DataTable({
    processing: true,
    ajax: {
      url: '<?= site_url("h_test/getAjax/$siswa->siswa_profile_id"); ?>',
      type: 'POST'
    },
  });
</script>