<!DOCTYPE html>
<html>
<head>
    <title>Idcard | Selamat Datang</title>
    <link rel="stylesheet" media="all"  type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
<link rel="stylesheet" media="all"  type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css">
<link rel="stylesheet" media="all"  type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap-theme.css">
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title"><b>ID CARD ONLINE MAKER</b></h1>
            <center><?php echo validation_errors(); ?></center>
            
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
        
    <?php 
    $attributes = array('class' => 'form-signin');
        echo form_open('login/registrasi',$attributes); ?>

                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required autofocus>
                <input type="text" name="username" class="form-control" placeholder="Username" required >
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <input type="password" name="cpass" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block"  type="submit">
                   Register</button>
               
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
              <?php echo form_close(); ?>
                
            </div>
            <a href="<?php echo site_url() ?>/login/index" class="text-center new-account">Already have an account </a>
        </div>
    </div>

</div>
</body>
</html>