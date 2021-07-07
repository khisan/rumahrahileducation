<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin-RumahRahil</title>
  <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
  <!-- Meta -->
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
  <nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
      <div class="navbar-content scroll-div ">

        <div class="">
          <div class="main-menu-header">
            <?php
            $id = $this->session->userdata('userid');
            $nama = $this->session->userdata('nama');
            $jenjang = $this->session->userdata('jenjang');
            $kelas = $this->session->userdata('kelas');
            $jenjang_id = $this->session->userdata('id_jenjang');
            if ($jenjang_id == '1') {
              $jenjang = 'SD';
            } elseif ($jenjang_id == '2') {
              $jenjang = 'SMP';
            } elseif ($jenjang_id == '3') {
              $jenjang = 'SMA';
            } else {
              $jenjang = 'Lainnya';
            }
            $kelas_id = $this->session->userdata('id_kelas');
            if (is_numeric($id) == 'true') {
            ?>
              <img class="img-radius" src="<?= base_url('assets/able/'); ?>assets/images/user/admin.png" alt="User-Profile-Image">
              <div class="user-details">
                <div id="more-details"><?= $nama ?> <i class="fa fa-caret-down"></i></div>
              </div>
            <?php } elseif (strpos($id, 'guru') == 'true') { ?>
              <img class="img-radius" src="<?= base_url() . 'uploads/guru/' . $this->session->userdata("gambar"); ?>" alt="User-Profile-Image">
              <div class="user-details">
                <div id="more-details"><?= $nama ?> <i class="fa fa-caret-down"></i></div>
              </div>
            <?php } else { ?>
              <img class="img-radius" src="<?= base_url() . 'uploads/siswa/' . $this->session->userdata("gambar"); ?>" alt="User-Profile-Image">
              <div class="user-details">
                <div id="more-details"><?= $nama ?> <i class="fa fa-caret-down"></i></div>
              </div>
            <?php } ?>
          </div>
          <div class="collapse" id="nav-user-link">
            <ul class="list-unstyled">
              <a href="<?= site_url('auth/logout'); ?>">
                <li class="list-group-item"><i class="feather icon-log-out m-r-5"></i>Logout</li>
              </a>
            </ul>
          </div>
        </div>

        <ul class="nav pcoded-inner-navbar ">
          <li class="nav-item pcoded-menu-caption">
            <label>Navigation</label>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('dashboard'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
          </li>
          <?php if (is_numeric($id) == 'true') { ?>
            <li class="nav-item pcoded-menu-caption">
              <label>User</label>
            </li>
            <li class="nav-item pcoded-hasmenu">
              <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">User Management</span></a>
              <ul class="pcoded-submenu">
                <li><a href="<?= site_url('admin'); ?>">Admin</a></li>
                <li><a href="<?= site_url('siswa'); ?>">Siswa</a></li>
                <!-- <li><a href="<?= site_url('guru'); ?>">Guru</a></li> -->
              </ul>
            </li>
          <?php }
          if (is_numeric($id) == 'true' or strpos($id, 'guru') == 'true') { ?>
            <li class="nav-item pcoded-menu-caption">
              <label>Test Online</label>
            </li>
            <li class="nav-item pcoded-hasmenu">
              <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fas fa-book-open"></i></span><span class="pcoded-mtext">Test Management</span></a>
              <ul class="pcoded-submenu">
                <li><a href="<?= site_url('kelas/sd'); ?>">SD</a></li>
                <li><a href="<?= site_url('kelas/smp'); ?>">SMP</a></li>
                <li><a href="<?= site_url('kelas/sma'); ?>">SMA</a></li>
                <li><a href="<?= site_url("kelas/sbm"); ?>">SBM</a></li>
                <li><a href="<?= site_url("kelas/kedinasan"); ?>">Kedinasan</a></li>
              </ul>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a href="<?= site_url("h_test/index/$id"); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Hasil Test</span></a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url("test/$jenjang_id/$kelas_id"); ?>" class="nav-link "><span class="pcoded-micon"><i class="fas fa-book-open"></i></span><span class="pcoded-mtext">Mulai Test</span></a>
            </li>
          <?php } ?>
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
      <div class="pcoded-content">
        <div class="pcoded-inner-content">
          <div class="main-body">
            <div class="page-wrapper">
              <!-- [ breadcrumb ] start -->
              <script src="<?= base_url('assets/able/') ?>assets/js/jquery.js"></script>
              <?= $contents; ?>
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
</body>

</html>