<?php foreach($user as $row){ ?>
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


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                                <img src="<?php echo base_url() ?>assets/img/sekolah.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                  <img class="avatar border-white" src="<?php echo base_url() ?>assets/img/<?php echo $row->gambar;  ?>" alt="..."/>
                                   <h4> NAMA </h4>
                                   
                                  <h4 class="title"><?php echo $row->nama;?></h4>
                                  <h4> ORGANISASI </h4>
                                   <!-- <h4 class="title"><?php echo $row->organisasi;?></h4> -->
                            </div>
                            <hr>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
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