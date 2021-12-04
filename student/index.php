<?php
include('studentinterface.php');
session_start();
if(!isset($_COOKIE['UNAME'])){
	header('location:login.php');
	die();
}
$_SESSION['UNAME']=$_COOKIE['UNAME'];



?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/interface.css">
	<!--<link rel="stylesheet" type="text/css" href="../css/style.css">-->
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

  <!--<img class="wave" src="../img/wave1.png">
<div class="login-content" > 

<img src="../img/avatar.svg" class="center">
</div>
<div >
<?php
/*echo "<br/><h3 >Welcome ,";
echo $_SESSION['UNAME']."</h3>";*/
?>
</div>
<div class="index-content">
<a href="enroll.php">Enrolment</a>
<a href="courseadd.php">Course Add / Drop </a>
<a href="timetable.php">Time Table</a>
<a href="attendance2.php">Attendance</a>
<a href="logout.php">Logout</a>

</div>-->

</body>
</html>
