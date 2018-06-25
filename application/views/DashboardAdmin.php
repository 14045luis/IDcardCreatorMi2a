<?php foreach($user as $row){ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url() ?>assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>ADMIN</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url() ?>assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="<?php echo base_url() ?>assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url() ?>assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() ?>assets/css/themify-icons.css" rel="stylesheet">
</head>
<body>

<div class="wrapper">
    <?php include('sidebaradmin.php'); ?>
    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">User Profile </a>
                </div>
           
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                                <img src="<?php echo base_url() ?>assets/img/background.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                  <img class="avatar border-white" src="<?php echo base_url() ?>assets/img/<?php echo $row->gambar;  ?>" alt="..."/>
                                  <h4 class="title"><?php echo $row->nama; ?><br />   
                                  </h4>
                                </div>
                                <p class="description text-center">
                                    <?php echo $row->alamat; ?>
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <div class="row">
                                  <?php echo $row->tgl_lahir; ?>
                                </div>
                            </div>
                        </div>
                         <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Foto</h4>
                            </div>
                            <div class="content">
                               <?php echo form_open('admin/editFoto', array('enctype'=>'multipart/form-data')); ?>
                               <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Pilih</label>
                                               <input type="file" name="gambar" class="form-control-file" >
                                            </div>
                                        </div>
                                    </div>
                                     <div class="text-center">
                                        <button type="submit" name="update" class="btn btn-info btn-fill btn-wd">Update Foto</button>
                                    </div>
                                    <div class="clearfix"></div>
                               <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                            <?php 
    $attributes = array('class' => 'form-signin');
        echo form_open('admin/editProfil',$attributes); ?>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control border-input" placeholder="Username" value="<?php echo $row->username; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Lengkap</label>
                                                <input type="text" name="nama" value="<?php echo $row->nama; ?>" class="form-control border-input" placeholder="Nama">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="text" name="tgl_lahir" class="form-control border-input" placeholder="Company" value="<?php echo $row->tgl_lahir; ?>">
                                            </div>
                                        </div>
                                       
                                    </div>

                                          <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea rows="5" class="form-control border-input" name="alamat" ><?php echo $row->alamat; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                              
                                    <div class="text-center">
                                        <button type="submit" onclick="return confirm('Pastikan Data Sudah Benar')" name="update" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                                    </div>
                                    <div class="clearfix"></div>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="#">
                                Iqbal
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Luis 
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                POLINEMA
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.iqbalcakep.com">IQBALLUIS</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap-checkbox-radio.js"></script>

    <!--  Charts Plugin -->
    <script src="<?php echo base_url() ?>assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="<?php echo base_url() ?>text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="<?php echo base_url() ?>assets/js/paper-dashboard.js"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?php echo base_url() ?>assets/js/demo.js"></script>

</html>
<?php } ?>