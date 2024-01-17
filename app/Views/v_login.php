
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Arsip PT. JAMKRIDAKB | <?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/iCheck/square/blue.css">
  <!-- logo icons -->
  <link rel="shortcut icon" href="https://arsip.jamkridakalbar.com/adminlte/img/logo-jamkrida-kalbar.png">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <!-- /.login-logo -->
  <div class="login-box-body" style="border-radius: 5px; box-shadow: 0 0 7px rgb(179, 179, 179);">
    <center>
      <img src="../../public/foto/logojkd.png/" width="60px" height="110px" alt="Logo JKD">      
      <h2><b style="color: rgb(55, 55, 55);">PT. JAMKRIDA KALBAR</b></h2>
    </center><br>  
    <?php 
    $errors = session()->getFlashdata('errors');
        if (!empty($errors)) { ?>
        <div class="alert alert-danger alert-dismissible">
            <ul>
                <?php foreach ($errors as $key => $value) { ?>
                    <li><?= esc($value) ?></li>
                <?php  } ?>  
            </ul>       
        </div>
    <?php } ?>
    <?php
    if(session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-danger alert-dismissible">';
        echo session()->getFlashdata('pesan');
        echo'</div>';
    }
    ?>
    <?php echo form_open('auth/login')?>
      <div class="form-group has-feedback">
        <input type="email" name="email"class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-normal">Login</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close()?>
  <!-- /.login-box-body -->
</div>

<!-- jQuery 3 -->
<script src="<?= base_url() ?>/template/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>/template/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
