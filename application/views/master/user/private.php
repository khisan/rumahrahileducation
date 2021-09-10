<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="m-b-10">siswa</h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-users"></i></a></li>
          <li class="breadcrumb-item"><a href="#!">Private</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="col-sm-12">
  <div class="card">
    <div class="card-header text-center">
      <h3 class="text-primary"><strong>Private</strong></h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" id="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jenjang</th>
              <th>Kelas</th>
              <th>Jurusan</th>
              <th>Sekolah</th>
              <th>Alamat</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    let table = $('#table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: '<?= site_url('privatemanagement/getAjax'); ?>',
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
  })
</script>