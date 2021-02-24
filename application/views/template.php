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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">



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
                        <img class="img-radius" src="<?= base_url('assets/able/'); ?>assets/images/user/avatar-2.jpg" alt="User-Profile-Image">
                        <div class="user-details">
                            <div id="more-details">UX Designer <i class="fa fa-caret-down"></i></div>
                        </div>
                    </div>
                    <div class="collapse" id="nav-user-link">
                        <ul class="list-unstyled">
                            <li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
                            <li class="list-group-item"><a href="<?= site_url('auth/logout'); ?>"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
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
                    <li class="nav-item pcoded-menu-caption">
                        <label>User</label>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">User Management</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?= site_url('admin'); ?>">Admin</a></li>
                            <li><a href="<?= site_url('siswa'); ?>">Siswa</a></li>
                            <li><a href="<?= site_url('guru'); ?>">Guru</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Test Online</label>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fas fa-school"></i></span><span class="pcoded-mtext">Test Management</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="<?= site_url('kelas/sd'); ?>">SD</a></li>
                            <li><a href="<?= site_url('kelas/smp'); ?>">SMP</a></li>
                            <li><a href="<?= site_url('kelas/sma'); ?>">SMA</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Quiz Online</label>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="fas fa-school"></i></span><span class="pcoded-mtext">Quiz Management</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="#!">SD</a></li>
                            <li><a href="#!">SMP</a></li>
                            <li><a href="#!">SMA</a></li>
                        </ul>
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
                                <img src="<?= base_url('assets/able/'); ?>assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
                                <span>John Doe</span>
                            </div>
                            <ul class="pro-body">
                                <li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
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
                            <!-- [ Main Content ] end -->
                            <!-- [ Main Content ] start -->

                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <!-- Warning Section start -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
            <div class="ie-warning">
                <h1>Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade
                   <br/>to any of the following web browsers to access this website.
                </p>
                <div class="iew-container">
                    <ul class="iew-download">
                        <li>
                            <a href="http://www.google.com/chrome/">
                                <img src="<?= base_url('assets/able/'); ?>assets/images/browser/chrome.png" alt="Chrome">
                                <div>Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.mozilla.org/en-US/firefox/new/">
                                <img src="<?= base_url('assets/able/'); ?>assets/images/browser/firefox.png" alt="Firefox">
                                <div>Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com">
                                <img src="<?= base_url('assets/able/'); ?>assets/images/browser/opera.png" alt="Opera">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.apple.com/safari/">
                                <img src="<?= base_url('assets/able/'); ?>assets/images/browser/safari.png" alt="Safari">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                                <img src="<?= base_url('assets/able/'); ?>assets/images/browser/ie.png" alt="">
                                <div>IE (11 & above)</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
        <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Js -->
    <script src="<?= base_url('assets/able/'); ?>assets/js/lottie.js"></script>
    <script src="<?= base_url('assets/able/'); ?>assets/js/vendor-all.min.js"></script>
    <script src="<?= base_url('assets/able/'); ?>assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/able/'); ?>assets/js/ripple.js"></script>
    <script src="<?= base_url('assets/able/'); ?>assets/js/pcoded.min.js"></script>

    <!-- prism Js -->
    <script src="<?= base_url('assets/able/'); ?>assets/js/plugins/prism.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>