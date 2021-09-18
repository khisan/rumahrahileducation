<!DOCTYPE html>
<html lang="en">

<head>

  <title>Login Page</title>
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
  <link href="<?= site_url('assets/landingpage/img/rumahrahil.jpeg') ?>" rel="icon">

  <!-- vendor css -->
  <link rel="stylesheet" href="<?= site_url('assets/able/'); ?>assets/css/style.css">


</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
  <div class="auth-content">
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
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="<?= site_url('assets/able/'); ?>assets/js/vendor-all.min.js"></script>
<script src="<?= site_url('assets/able/'); ?>assets/js/plugins/bootstrap.min.js"></script>
<script src="<?= site_url('assets/able/'); ?>assets/js/ripple.js"></script>
<script src="<?= site_url('assets/able/'); ?>assets/js/pcoded.min.js"></script>



</body>

</html>