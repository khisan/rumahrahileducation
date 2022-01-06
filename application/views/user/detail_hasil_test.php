<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="m-b-10">Detail Hasil Test</h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-users"></i></a></li>
          <li class="breadcrumb-item"><a href="#!">Detail Hasil Test</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <div class="card table-card">
      <div class="card-header">
        <h5>Informasi Akun</h5>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover">
            <tr>
              <th>Nama</th>
              <td><?= $h_test->nama ?></td>
            </tr>
            <tr>
              <th>Paket</th>
              <td><?= $h_test->nama_paket ?></td>
            </tr>
            <tr>
              <th>Mapel</th>
              <td><?= $h_test->nama_mapel ?></td>
            </tr>
            <tr>
              <th>Nilai</th>
              <td><?= $h_test->nilai ?></td>
            </tr>
            <tr>
              <th>Tanggal Test</th>
              <td><?= $h_test->tgl_test ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header text-center">
        <h3 class="text-primary"><strong>Detail Hasil Test</strong></h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Jawab</th>
                <th>Cek</th>
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
<!-- Datatables JS --->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.js"></script>
</script>
<script>
  var judul = '<?= $h_test->nama_mapel . " " . $h_test->nama_paket; ?>';
  let table = $('#table').DataTable({
    rowCallback: function(row, data, index) {
      if (data[2] == "Salah") {
        $(row).find('td:eq(2)').css('color', 'red');
      }
    },
    processing: true,
    // serverSide: true,
    ajax: {
      url: '<?= site_url("detail_h_test/getAjax/$h_test->id_h_test"); ?>',
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
    ],
    dom: 'Bflrtip',
    dom: "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
    buttons: [{
      extend: 'pdf',
      text: '<i class="fa fa-print" aria-hidden="true"> Cetak PDF</i>',
      title: judul,
      customize: function(doc) {
        doc.content[1].table.widths =
          Array(doc.content[1].table.body[0].length + 1).join('*').split('');
        doc.styles.tableBodyEven.alignment = 'center';
        doc.styles.tableBodyOdd.alignment = 'center';
        for (var column = 2; column <= 2; column++) {
          cek = table.column(column).data().toArray();
          for (var i = 0; i < cek.length; i++) {
            if (cek[i] == "Salah") {
              doc.content[1].table.body[i + 1][column].fillColor = 'red';
            }
          }
        }
      }
    }],
    initComplete: function() {
      var btns = $('.dt-button');
      btns.addClass('btn btn-success btn-sm');
      btns.removeClass('dt-button');

    }
  });
</script>