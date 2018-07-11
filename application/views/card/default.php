<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    max-width: 300px;
    border: 1px solid black;
    margin: auto;
    text-align: center;
}

.title {
    color: grey;
    font-size: 18px;
}

button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
}

a {
    text-decoration: none;
    font-size: 22px;
    color: black;
}

button:hover, a:hover {
    opacity: 0.7;
}
	</style>
	<title></title>
</head>
<body>

<?php foreach ($user as $row ) { ?>
<div class="card">
  <img src="./assets/img/<?php echo $row->gambar;  ?>" alt="John" style="width:100%">
  <h1><u><?php echo $row->nama; ?></u></h1>
 <?php echo $row->idcard; ?>
  <?php foreach ($organisasi as $r ) { ?>
   <p>  <?php echo $r->nama; ?></p>
   <p>  <img src="./assets/img/<?php echo $r->logo; ?>" height="100" width="100"></p>
  <?php } ?>
  <p>  <?php echo $row->tgl_lahir; ?></p>
  <p><?php echo $row->alamat; ?></p>
  
<?php } ?>
</div>
</body>
</html>