
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url() ?>assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>ID CARD ONLINE MAKER</title>

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
	<?php include('sidebar.php'); ?>
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
                    <a class="navbar-brand" href="#">DESAIN LIST </a>
                </div>
           
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
 <?php 
    $attributes = array('class' => 'form-signin');
        echo form_open('desain/update_desain',$attributes); ?>
                                   
                <input type="hidden" name="id_organisasi" value="<?php echo $id; ?>">    
                    <?php foreach ($desain as $row) { ?>
<div class="col-lg-4 col-md-5">
                        <div class="card">
  <img src="<?php echo base_url() ?>assets/img/<?php echo $row->desain; ?>" alt="Avatar" style="width:100%">
   <div class="text-center" style="padding: 10px;">
    <h4><b><input type="radio"  name="id_desain" value="<?php echo $row->id_desain; ?>"><?php echo $row->nama; ?></b></h4> 
</div>
</div>
                    </div>
                <?php } ?>
     
                </div>
            </div>
             <div class="text-center">
                                        <button type="submit" onclick="return confirm('Pastikan Data Sudah Benar')" name="update" class="btn btn-info btn-fill btn-wd">Ganti Desain</button>
                                    </div>
                                    <div class="clearfix"></div>
                                    <?php echo form_close(); ?>
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
