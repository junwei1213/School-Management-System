<?php
include('../config.php');
include('admininterface.php');
session_start();
if(!isset($_COOKIE['UNAME'])){
	header('location:login.php');
	die();
}
$_SESSION['UNAME']=$_COOKIE['UNAME'];



?>
<html>
<head>
	<title>Home Page</title>
	<!--<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>-->
	<link rel="stylesheet" type="text/css" href="../css/interface.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

  <br> <br> <br>
  <center>
<?php
	
			echo "<br/><h3 >Welcome ,";
			echo $_SESSION['UNAME']."</h3>";
		
		
	


?>
</center>

</body>
</html>
