<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="m-b-10">Hasil Report Test</h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard'); ?>"><i class="feather icon-home"></i></a></li>
          <li class="breadcrumb-item"><a href="<?php echo site_url('Report_test'); ?>"><i class="fas fa-archive"></i></a></li>
          <li class="breadcrumb-item"><a href="#!">Hasil Report Test</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header text-center">
        <h3 class="text-primary"><strong>Hasil Report Test</strong></h3>
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
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js">
</script>
<script>
  let table = $('#table').DataTable({
    processing: true,
    ajax: {
      url: '<?= site_url("report_test/getAjax/$paket_id/$mapel_id/$siswa_profile_id"); ?>',
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
</script>