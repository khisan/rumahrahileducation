<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="m-b-10">Mulai Test</h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#!">List Test</a></li>
          <li class="breadcrumb-item"><a href="#!">Mulai Test</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
  <!-- [ static-layout ] start -->
  <div class="col-xl-3 col-md-12">
    <div class="card table-card">
      <div class="card-header">
        <center>
          <h5>Navigasi Soal</h5>
        </center>
      </div>
      <div class="card-body p-0 text-center" id="tampil_jawaban">
        <!-- <a id="btn_soal" class="btn btn-light btn-soal btn-sm" style="margin: 10px 0px 10px 0px">1. -</a> -->
      </div>
    </div>
  </div>
  <div class="col-xl-9 col-md-12">
    <form action="<?php echo site_url('Ujian'); ?>" method="post" id="test">
      <div class="card support-bar overflow-hidden">
        <div class="card-header">
          <h3 class="text-primary"><strong>Soal <span id="soalke"></span></strong></h3>
        </div>
        <div class="card-body">
          <?= $html; ?>
        </div>
      </div>
      <div class="card-footer bg-gray text-white text-center">
        <a class="action back btn btn-success" rel="0" onclick="return back();"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
        <a class="action next btn btn-primary" rel="1" onclick="return next();"><i class="glyphicon glyphicon-chevron-right"></i> Next</a>
        <a class="selesai action submit btn btn-danger" onclick="return simpan_akhir();"><i class="glyphicon glyphicon-stop"></i> Selesai</a>
        <input type="hidden" name="jml_soal" id="jml_soal" value="<?= $no; ?>">
      </div>
    </form>
  </div>
</div>
<script>
  var widget = $(".step");
  var total_widget = widget.length;

  $(document).ready(function() {
    simpan_sementara();
    buka(1);
    widget = $(".step");
    btnnext = $(".next");
    btnback = $(".back");
    btnsubmit = $(".submit");

    $(".step, .back, .selesai").hide();
    $("#widget_1").show();

  });

  function getFormData($form) {
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};
    $.map(unindexed_array, function(n, i) {
      indexed_array[n["name"]] = n["value"];
    });
    return indexed_array;
  }

  function buka(id_widget) {
    $(".next").attr("rel", id_widget + 1);
    $(".back").attr("rel", id_widget - 1);
    $(".ragu_ragu").attr("rel", id_widget);
    cek_terakhir(id_widget);

    $("#soalke").html(id_widget);

    $(".step").hide();
    $("#widget_" + id_widget).show();

    // simpan();
  }

  function next() {
    var berikutnya = $(".next").attr("rel");
    berikutnya = parseInt(berikutnya);
    berikutnya = berikutnya > total_widget ? total_widget : berikutnya;

    $("#soalke").html(berikutnya);

    $(".next").attr("rel", berikutnya + 1);
    $(".back").attr("rel", berikutnya - 1);
    $(".ragu_ragu").attr("rel", berikutnya);
    cek_terakhir(berikutnya);

    var sudah_akhir = berikutnya == total_widget ? 1 : 0;

    $(".step").hide();
    $("#widget_" + berikutnya).show();

    if (sudah_akhir == 1) {
      $(".back").show();
      $(".next").hide();
    } else if (sudah_akhir == 0) {
      $(".next").show();
      $(".back").show();
    }

    // simpan();
  }

  function back() {
    var back = $(".back").attr("rel");
    back = parseInt(back);
    back = back < 1 ? 1 : back;

    $("#soalke").html(back);

    $(".back").attr("rel", back - 1);
    $(".next").attr("rel", back + 1);
    $(".ragu_ragu").attr("rel", back);
    cek_terakhir(back);

    $(".step").hide();
    $("#widget_" + back).show();

    var sudah_awal = back == 1 ? 1 : 0;

    $(".step").hide();
    $("#widget_" + back).show();

    if (sudah_awal == 1) {
      $(".back").hide();
      $(".next").show();
    } else if (sudah_awal == 0) {
      $(".next").show();
      $(".back").show();
    }

    // simpan();
  }

  function cek_terakhir(id_soal) {
    var jml_soal = $("#jml_soal").val();
    jml_soal = parseInt(jml_soal) - 1;

    if (jml_soal === id_soal) {
      $(".next").hide();
      $(".selesai, .back").show();
    } else {
      $(".next").show();
      $(".selesai, .back").hide();
    }
  }

  function simpan_sementara() {
    var form_asal = $("#test");
    var form = getFormData(form_asal);
    var jml_soal = form.jml_soal;
    jml_soal = parseInt(jml_soal);

    var hasil_jawaban = "";

    for (var i = 1; i < jml_soal; i++) {
      var idx = "opsi_" + i;
      var jawab = form[idx];

      console.log(jawab);

      if (jawab != undefined) {
        if (jawab == "-") {
          hasil_jawaban +=
            '<a id="btn_soal_' +
            i +
            '" class="btn btn-light btn-sm" style="margin: 10px 5px 10px 0px" onclick="return buka(' +
            i +
            ');">' +
            i +
            ". " +
            jawab +
            "</a>";
        } else {
          hasil_jawaban +=
            '<a id="btn_soal_' +
            i +
            '" class="btn btn-info btn-sm" style="margin: 10px 5px 10px 0px" onclick="return buka(' +
            i +
            ');">' +
            i +
            ". " +
            jawab +
            "</a>";
        }
      } else {
        hasil_jawaban +=
          '<a id="btn_soal_' +
          i +
          '"  class="btn btn-light btn-sm" style="margin: 10px 0px 10px 0px" onclick="return buka(' +
          i +
          ');">' +
          i +
          ". -</a>";
      }
      $("#tampil_jawaban").html('<p></p>' + hasil_jawaban);
    }
  }
  // function simpan() {
  //   // simpan_sementara();
  //   var form = $("#ujian");

  //   $.ajax({
  //     type: "POST",
  //     url: base_url + "ujian/simpan_satu",
  //     data: form.serialize(),
  //     dataType: "json",
  //     success: function(data) {
  //       // $('.ajax-loading').show();
  //       console.log(data);
  //     },
  //   });
  // }
</script>