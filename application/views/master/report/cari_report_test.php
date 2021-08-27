<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="m-b-10">Report Test</h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard'); ?>"><i class="feather icon-home"></i></a></li>
          <li class="breadcrumb-item"><a href="#!">Report Test</a></li>
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
        <h3 class="text-primary">Report Test</strong></h3>
      </div>
      <div class="card-body">
        <form action="<?php echo site_url('report_test/hasilReportTest'); ?>" method="post">
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Jenjang</label>
                <select class="form-control" id="jenjang" name="jenjang">
                  <option selected value="">Pilih Jenjang</option>
                  <?php foreach ($jenjang as $jenjangs) {
                    echo '<option value="' . $jenjangs['id_jenjang'] . '">' . $jenjangs['nama_jenjang'] . '</option>';
                  } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-2" id="kelasElement">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control" id="kelas" name="kelas">
                  <option selected value="">Pilih Kelas</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2" id="mapelElement">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Mapel</label>
                <select class="form-control" id="mapel" name="mapel">
                  <option selected value="">Pilih Mapel</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2" id="mapelElementLainnya">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Mapel</label>
                <select class="form-control" id="mapel_lainnya" name="mapel_lainnya">
                  <option selected value="">Pilih Mapel</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2 bab">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Bab</label>
                <select class="form-control" id="bab" name="bab">
                  <option selected value="">Pilih Bab</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2" id="paketElement">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Paket</label>
                <select class="form-control" id="paket" name="paket">
                  <option selected value="">Pilih Paket</option>
                </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Siswa</label>
                <select class="form-control" id="siswa" name="siswa">
                  <option selected value="">Pilih Siswa</option>
                </select>
              </div>
            </div>
            <div class="col-sm-12 text-center">
              <button type="submit" class="btn btn-success">Lihat Report Test</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<script>
  $(document).ready(function() {
    $("#mapelElementLainnya").hide();
    $("#jenjang").change(function() {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("kelas/listKelasReport"); ?>",
        data: {
          id_jenjang: $("#jenjang").val()
        },
        dataType: "json",
        beforeSend: function(e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response) {
          $("#kelas").html(response.list_kelas_report);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
      if ($("#jenjang").val() == 4) {
        $(".semester, .bab, #mapelElement").hide();
        $("#mapelElementLainnya").show();
        $("#paketElement").insertAfter($("#kelasElement"));
      } else {
        $(".bab").show();
        $("#mapelElementLainnya").hide();
      }
    });

    $('#kelas').change(function() {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("mapel/listMapel"); ?>",
        data: {
          id_kelas: $("#kelas").val(),
        },
        dataType: "json",
        beforeSend: function(e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response) {
          $("#mapel").html(response.list_mapel).show();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("paket/listPaketLainnya"); ?>",
        data: {
          id_kelas: $("#kelas").val(),
        },
        dataType: "json",
        beforeSend: function(e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response) {
          $("#paket").html(response.list_paket_lainnya).show();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
    });

    $("#bab").change(function() {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("paket/listPaket"); ?>",
        data: {
          id_bab: $("#bab").val()
        },
        dataType: "json",
        beforeSend: function(e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response) {
          $("#paket").html(response.list_paket).show();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
    });

    $("#paket").change(function() {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("mapel/listMapelLainnya"); ?>",
        data: {
          id_paket: $("#paket").val()
        },
        dataType: "json",
        beforeSend: function(e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response) {
          $("#mapel_lainnya").html(response.list_mapel_lainnya).show();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("h_test/listHTest"); ?>",
        data: {
          id_paket: $("#paket").val(),
          id_mapel: $("#mapel").val()
        },
        dataType: "json",
        beforeSend: function(e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response) {
          $("#siswa").html(response.list_siswa).show();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
    });

    $("#mapel").change(function() {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("bab/listBab"); ?>",
        data: {
          id_mapel: $("#mapel").val()
        },
        dataType: "json",
        beforeSend: function(e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response) {
          $("#bab").html(response.list_bab).show();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
    });

    $("#mapel_lainnya").change(function() {
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("h_test/listHTest"); ?>",
        data: {
          id_paket: $("#paket").val(),
          id_mapel: $("#mapel_lainnya").val()
        },
        dataType: "json",
        beforeSend: function(e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response) {
          $("#siswa").html(response.list_siswa).show();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
    });
  });
</script>