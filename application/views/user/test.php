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
      <div class="card-body">
        <form>
          <div class="row">
            <div class="col-sm-2">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Jenjang</label>
                <select class="form-control" id="jenjang">
                  <option selected value="<?= $id_jenjang ?>"><?= $jenjang->nama_jenjang ?></option>
                </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control" id="kelas">
                  <option selected value="<?= $id_kelas ?>"><?= $kelas->nama_kelas ?></option>
                </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Mapel</label>
                <select class="form-control" id="mapel">
                  <option selected value="">Pilih Mapel</option>
                  <?php foreach ($mapel as $data) {
                    echo "<option value='" . $data->id_mapel . "'>" . $data->nama_mapel . "</option>";
                  } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Bab</label>
                <select class="form-control" id="bab">
                  <option selected value="">Pilih Bab</option>
                  <?php foreach ($bab as $data) {
                    echo "<option value='" . $data->id_bab . "'>" . $data->nama_bab . "</option>";
                  } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Paket</label>
                <select class="form-control" id="paket">
                  <option selected value="">Pilih Paket</option>
                  <?php foreach ($paket as $data) {
                    echo "<option value='" . $data->id_paket . "'>" . $data->nama_paket . "</option>";
                  } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <button type="button" class="btn btn-success" style="margin-top: 20px;">Mulai Test</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
    $.ajax({
      type: "POST", // Method pengiriman data bisa dengan GET atau POST
      url: "<?php echo base_url("mapel/listMapel"); ?>", // Isi dengan url/path file php yang dituju
      data: {
        id_kelas: $("#kelas").val()
      }, // data yang akan dikirim ke file yang dituju
      dataType: "json",
      beforeSend: function(e) {
        if (e && e.overrideMimeType) {
          e.overrideMimeType("application/json;charset=UTF-8");
        }
      },
      success: function(response) { // Ketika proses pengiriman berhasil
        // set isi dari combobox kota
        $("#mapel").html(response.list_mapel);
      },
      error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
      }
    });
  });
</script>