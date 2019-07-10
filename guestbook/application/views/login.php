<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminCRUD | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="<?php echo base_url('assets/favicon.png') ?>" />
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/eksternal/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/eksternal/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 	<style  type="text/css">
   
    body {
/*opacity: 0.2;
  filter: alpha(opacity=20);*/

   background-image:url(../uploads/bgloginnn.png);
   background-size: 100%;
   background-color: #D2D6DE;
        background-attachment: fixed;
     background-repeat: no-repeat;
     background-position:center center;
   }
   .logo{
          background-image:url(../uploads/logo2.png);

   }
   
   
   .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background-color: #fff;
    }
    .preloader .loading {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
      font: 14px arial;
    }
   
    </style>
   
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/morris.css' ?>">
                    <script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>

   
    <script>
    $(document).ready(function(){
      $(".preloader").delay(500).fadeOut();
    })
    </script>
 
  </head>
  <body>
       <div class="preloader">
      <div class="loading">
       <img src="../uploads/baru.gif" width="88">
<!--       <div>
       <p>Harap Tunggu...</p>
       </div>-->
      </div>
    </div>
      
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo base_url(); ?>assets/index2.html"><b><img src="<?php echo base_url('assets/img/logo.png') ?>" width="150px" height="150px"></a>
      </div>

      <!-- /.login-logo -->
      <div class="logo">
          <div class="login-box-body">
        <p class="login-box-msg">
          Log in to start your session
        </p>

        <form action="<?php echo base_url('Auth/login'); ?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="NIK" name="nik">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          
          <div class="row">
            <!-- <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div> -->
            <div class="col-xs-offset-8 col-xs-4">
              <button type="submit" class="btn btn-danger btn-block btn-flat">Sign In</button>
            </div>
          </div>
        </form>
        </div>

        <!-- <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
            Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
            Google+</a>
        </div> -->
        <!-- /.social-auth-links -->

        <!-- <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a> -->

      </div>
      <!-- /.login-box-body -->
      <?php
        echo show_err_msg($this->session->flashdata('error_msg'));
      ?>
    </div>
    

    <!-- /.login-box -->

    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <!-- <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script> -->
    <!-- <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script> -->
  </body>
</html>
