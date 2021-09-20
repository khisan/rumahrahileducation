<!DOCTYPE html>
<html lang="en">

<head>

  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="" />
  <meta name="keywords" content="">
  <meta name="author" content="Phoenixcoded" />
  <!-- Favicon icon -->
  <link href="<?= site_url('assets/landingpage/img/rumahrahil.jpeg') ?>" rel="icon">

  <!-- vendor css -->
  <link rel="stylesheet" href="<?= site_url('assets/able/'); ?>assets/css/style.css">

  <style>
    #buku {
      height: auto;
      width: auto;
      max-width: 600px;
      max-height: 600px;
    }

    body {
      background: white;
    }
  </style>
</head>

<!-- [ auth-signin ] start -->

<body>
  <div class="auth-wrapper">
    <div class="col-md-6 vh-100" style="background: white">
      <div class="row align-items-center text-center">
        <div class="col-md-12 mx-auto" style="margin-top: 100px;"">
        <h1 class=" mb-3 f-w-400">Rumahrahil Education</h1>
          <img src=" <?= base_url('assets/able/'); ?>assets/images/auth/books_icon.jpg" alt="" id="buku">
        </div>
      </div>
    </div>
    <div class="col-md-6 vh-100" style="background: #4680ff;">
      <div class="auth-content mx-auto" style="margin-top: 130px;">
        <div class="card">
          <div class="row align-items-center text-center">
            <div class="col-md-12">
              <div class="card-body">
                <h4 class="mb-3 f-w-400">Login</h4>
                <form action="<?= site_url('auth/process'); ?>" method="post">
                  <div class="form-group mb-3">
                    <label class="floating-label" for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="">
                  </div>
                  <div class="form-group mb-4">
                    <label class="floating-label" for="Password">Password</label>
                    <input type="password" class="form-control" id="Password" name="password" placeholder="">
                  </div>
                  <button type="submit" class="btn btn-block btn-primary mb-4" name="login">Signin</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="<?= site_url('assets/able/'); ?>assets/js/vendor-all.min.js"></script>
<script src="<?= site_url('assets/able/'); ?>assets/js/plugins/bootstrap.min.js"></script>
<script src="<?= site_url('assets/able/'); ?>assets/js/ripple.js"></script>
<script src="<?= site_url('assets/able/'); ?>assets/js/pcoded.min.js"></script>



</body>

</html>