<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="m-b-10">Test</h5>
        </div>
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
        <h3 class="text-primary">Test Online</strong></h3>
      </div>
      <?php if ($jenjang->id_jenjang != 4) { ?>
        <div class="card-body">
          <form action="<?php echo site_url('test/mulaiTest'); ?>" method="post">
            <div class="row">
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Jenjang</label>
                  <div class="form-control">
                    <label for="exampleFormControlSelect1"><?= $jenjang->nama_jenjang ?></label>
                  </div>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Kelas</label>
                  <div class="form-control">
                    <label for="exampleFormControlSelect1"><?= $kelas->nama_kelas ?></label>
                  </div>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Mapel</label>
                  <select class="form-control babChange" id="mapel" name="mapel">
                    <option selected value="">Pilih Mapel</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Semester</label>
                  <select class="form-control babChange" id="semester">
                    <option selected value="">Pilih Semester</option>
                    <option value="1">Semester 1</option>
                    <option value="2">Semester 2</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Bab</label>
                  <select class="form-control" id="bab">
                    <option selected value="">Pilih Bab</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Paket</label>
                  <select class="form-control" id="paket" name="paket">
                    <option selected value="">Pilih Paket</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-2 mx-auto">
                <div class="form-group">
                  <button type="submit" class="btn btn-success" style="margin-top: 20px;">Mulai Test</button>
                  <input type="hidden" name="tgl_test" value="<?php date_default_timezone_set("Asia/Jakarta");
                                                              echo date("Y-m-d h:i:sa") ?>">
                  <div id="waktu"></div>
                </div>
              </div>
            </div>
          </form>
        </div>
      <?php } else { ?>
        <div class="card-body">
          <form action="<?php echo site_url('test/mulaiTest'); ?>" method="post">
            <div class="row">
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Jenjang</label>
                  <div class="form-control">
                    <label for="exampleFormControlSelect1"><?= $jenjang->nama_jenjang ?></label>
                  </div>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Kelas</label>
                  <div class="form-control">
                    <label for="exampleFormControlSelect1"><?= $kelas->nama_kelas ?></label>
                    <input type="hidden" id="kelas_lainnya" value="<?= $kelas->id_kelas ?>">
                  </div>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Paket</label>
                  <select class="form-control" id="paket_lainnya" name="paket">
                    <option selected value="">Pilih Paket</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Mapel</label>
                  <select class="form-control" id="mapel_lainnya" name="mapel">
                    <option selected value="">Pilih Mapel</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-2 mx-auto">
                <div class="form-group">
                  <button type="submit" class="btn btn-success" style="margin-top: 20px;">Mulai Test</button>
                  <input type="hidden" name="tgl_test" value="<?php date_default_timezone_set("Asia/Jakarta");
                                                              echo date("Y-m-d h:i:sa") ?>">
                  <div id="waktu"></div>
                </div>
              </div>
            </div>
          </form>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    <?php if ($jenjang->id_jenjang != 4) { ?>
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("mapel/listMapel"); ?>",
        data: {
          id_kelas: $("#kelas").val()
        },
        dataType: "json",
        beforeSend: function(e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response) {
          $("#mapel").html(response.list_mapel);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });

      $('.babChange').change(function() {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url("bab/listBab"); ?>",
          data: {
            id_mapel: $("#mapel").val(),
            semester: $("#semester").val()
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
          url: "<?php echo base_url("paket/getWaktu"); ?>",
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
            $("#waktu").html(response.waktu).show();
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
          }
        });
      });
    <?php } else { ?>
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("paket/listPaketLainnya"); ?>",
        data: {
          id_kelas: $("#kelas_lainnya").val()
        },
        dataType: "json",
        beforeSend: function(e) {
          if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response) {
          $("#paket_lainnya").html(response.list_paket_lainnya).show();
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });

      $("#paket_lainnya").change(function() {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url("mapel/listMapelLainnya"); ?>",
          data: {
            id_paket: $("#paket_lainnya").val(),
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
      });

      $("#paket_lainnya").change(function() {
        $.ajax({
          type: "POST",
          url: "<?php echo base_url("paket/getWaktu"); ?>",
          data: {
            id_paket: $("#paket_lainnya").val()
          },
          dataType: "json",
          beforeSend: function(e) {
            if (e && e.overrideMimeType) {
              e.overrideMimeType("application/json;charset=UTF-8");
            }
          },
          success: function(response) {
            $("#waktu").html(response.waktu).show();
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
          }
        });
      });
    <?php } ?>
  });
</script>