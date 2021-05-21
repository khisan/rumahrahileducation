<html lang="en">

<head>
  <title>Admin-RumahRahil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="" />
  <meta name="keywords" content="">
  <meta name="author" content="Phoenixcoded" />
  <!-- Favicon icon -->
  <link rel="icon" href="<?= base_url('assets/able/'); ?>assets/images/favicon.ico" type="image/x-icon">

  <!-- prism css -->
  <link rel="stylesheet" href="<?= base_url('assets/able/'); ?>assets/css/plugins/prism-coy.css">
  <!-- vendor css -->
  <link rel="stylesheet" href="<?= base_url('assets/able/'); ?>assets/css/style.css">

  <!-- funky radio css -->
  <link rel="stylesheet" href="<?= base_url('assets/able/'); ?>assets/css/funkyRadio.css">
  <script>
    window.MathJax = {
      MathML: {
        extensions: ["mml3.js", "content-mathml.js"]
      }
    };
  </script>
  <script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=MML_HTMLorMML"></script>
</head>

<body>
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->
  <!-- [ navigation menu ] start -->
  <nav class="pcoded-navbar menu-light theme-horizontal">
    <div class="navbar-wrapper container">
      <div class="navbar-content sidenav-horizontal" id="layout-sidenav">
        <ul class="nav pcoded-inner-navbar ">
          <li class="nav-item pcoded-menu-caption">
            <label>Navigation</label>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('dashboard'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
          </li>
          <li class="nav-item">
            <?php $jenjang_id = $this->session->userdata('id_jenjang');
            if ($jenjang_id == '1') {
              $jenjang = 'SD';
            } elseif ($jenjang_id == '2') {
              $jenjang = 'SMP';
            } elseif ($jenjang_id == '3') {
              $jenjang = 'SMA';
            } else {
              $jenjang = 'Lainnya';
            }
            $kelas_id = $this->session->userdata('id_kelas'); ?>
            <a href="<?= site_url("test/$jenjang_id/$kelas_id"); ?>" class="nav-link "><span class="pcoded-micon"><i class="fas fa-book-open"></i></span><span class="pcoded-mtext">List Test</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- [ navigation menu ] end -->
  <!-- [ Header ] start -->
  <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
    <div class="m-header">
      <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
      <a href="<?= site_url('dashboard'); ?>" class="b-brand">
        <!-- ========   change your logo hear   ============ -->
        <img src="<?= base_url('assets/able/'); ?>assets/images/logo.png" alt="" class="logo">
        <img src="<?= base_url('assets/able/'); ?>assets/images/logo-icon.png" alt="" class="logo-thumb">
      </a>
      <a href="#!" class="mob-toggler">
        <i class="feather icon-more-vertical"></i>
      </a>
    </div>
    <div class="collapse navbar-collapse">

      <ul class="navbar-nav ml-auto">
        <li>
          <div class="dropdown drp-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="feather icon-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-notification">
              <div class="pro-head">
                <?php
                $id = $this->session->userdata('userid');
                $nama = $this->session->userdata('nama');
                if (is_numeric($id) == 'true') {
                ?>
                  <img src="<?= base_url('assets/able/'); ?>assets/images/user/admin.png" class="img-radius" alt="User-Profile-Image">
                  <span><?= $nama; ?></span>
                <?php } elseif (strpos($id, 'guru') == 'true') { ?>
                  <img src=" <?= base_url() . 'uploads/guru/' . $this->session->userdata("gambar"); ?>" alt="User-Profile-Image" class="img-radius">
                  <span><?= $nama; ?></span>
                <?php } else { ?>
                  <img src=" <?= base_url() . 'uploads/siswa/' . $this->session->userdata("gambar"); ?>" alt="User-Profile-Image" class="img-radius">
                  <span><?= $nama; ?></span>
                <?php } ?>
              </div>
              <ul class="pro-body">
                <li><a href="<?= site_url('auth/logout'); ?>" class="dropdown-item"><i class="feather icon-log-out"></i> Log Out</a></li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </header>
  <!-- [ Header ] end -->
  <!-- [ Main Content ] start -->
  <div class="pcoded-main-container">
    <div class="pcoded-wrapper">
      <div class="pcoded-content" style="margin-top: 10px!important;">
        <div class="pcoded-inner-content">
          <div class="main-body">
            <div class="page-wrapper">
              <script src="<?= base_url('assets/able/') ?>assets/js/jquery.js"></script>
              <!-- [ Main Content ] start -->
              <div class="row">
                <!-- [ static-layout ] start -->
                <div class="col-xl-3 col-md-12">
                  <div class="card table-card">
                    <div class="card-header">
                      <center>
                        <h5>Navigasi Soal
                        </h5>
                      </center>
                    </div>
                    <div class="card-body p-0 text-center" id="tampil_jawaban">
                    </div>
                  </div>
                </div>
                <div class="col-xl-9 col-md-12">
                  <form action="<?php echo site_url('Ujian'); ?>" method="post" id="test">
                    <div class="card support-bar overflow-hidden">
                      <div class="card-header">
                        <h3 class="text-primary"><strong>Soal <span id="soalke"></span></strong></h3>
                        <input type="hidden" id="waktu" value="<?= $waktu ?>">
                        <div class="card-header-right" style="margin-top: 15px;">
                          <h5 class="text-warning">Sisa Waktu : <span id="sisawaktu" class="text-danger">
                            </span></h5>
                          </button>
                        </div>
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
                      <input type="hidden" name="siswa_profile_id" value="<?= $siswa_profile_id; ?>">
                      <input type="hidden" name="id_test" value="<?= $id_test; ?>">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- Required Js -->
  <script src="<?= base_url('assets/able/'); ?>assets/js/lottie.js"></script>
  <script src="<?= base_url('assets/able/'); ?>assets/js/vendor-all.min.js"></script>
  <script src="<?= base_url('assets/able/'); ?>assets/js/plugins/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/able/'); ?>assets/js/ripple.js"></script>
  <script src="<?= base_url('assets/able/'); ?>assets/js/pcoded.min.js"></script>

  <!-- prism Js -->
  <script src="<?= base_url('assets/able/'); ?>assets/js/plugins/prism.js"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js">
  </script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    var widget = $(".step");
    var total_widget = widget.length;
    var base_url = "<?php echo base_url(); ?>";
    var id_test = "<?= $id_test; ?>";

    function mulaiTimer(waktu, display) {
      var timer = waktu,
        hours, minutes, seconds;
      setInterval(function() {
        minutes = parseInt(timer / 60);
        seconds = parseInt(timer % 60);

        hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        $('#sisawaktu').html(minutes + " menit " + seconds + " detik ");
        console.log(display);

        if (--timer < 0) {
          timer = waktu;
        }
      }, 1000);
      setTimeout(function() {
        waktuHabis();
      });
    }

    $(document).ready(function() {
      var waktuAwal = $("#waktu").val();
      var waktu = waktuAwal * 60;
      display = $('#sisawaktu');
      mulaiTimer(waktu, display);

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

      simpan();
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
              '" class="btn btn-success btn-sm" style="margin: 10px 5px 10px 0px" onclick="return buka(' +
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

    function simpan() {
      simpan_sementara();
      var form = $("#test");

      $.ajax({
        type: "POST",
        url: base_url + "test/simpan_satu",
        data: form.serialize(),
        dataType: "json",
        success: function(data) {
          console.log(data);
        },
      });
    }

    function selesai() {
      simpan();
      $.ajax({
        type: "POST",
        url: base_url + "test/simpan_akhir",
        data: {
          id_test: id_test
        },
        beforeSend: function() {
          simpan();
        },
        success: function(r) {
          console.log(r);
          if (r.status) {
            window.location.href = base_url + "test";
          }
        },
      });
    }

    function waktuHabis() {
      selesai();
      alert("Waktu ujian telah habis!");
    }

    function simpan_akhir() {
      simpan();
      if (confirm("Yakin ingin mengakhiri tes?")) {
        selesai();
      }
    }
  </script>
</body>

</html>