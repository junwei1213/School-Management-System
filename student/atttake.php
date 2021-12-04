<?php
include('../config.php');
session_start();
if(!isset($_COOKIE['UNAME'])){
	header('location:login.php');
	die();
}
$_SESSION['UNAME']=$_COOKIE['UNAME'];

$studentid=$_SESSION['UNAME'];
if(isset($_POST['text'])){
	$text = $_POST['text'];
	$class =explode(".",$text);
	$sub = $class[0];
	$cla = $class[1];
	$currentDateTime = date('Y-m-d H:i:s');
	$sql = "UPDATE  attendance SET datetime = '$currentDateTime',
										attend = 1 
										WHERE studentid='$studentid'
										AND subjectid='$sub'
										AND class='$cla'";
	if(mysqli_query($conn,$sql)){
		
		header('location:success.php');
	}else{
		echo "You name not at this class";
		echo "Error".mysqli_error($conn);
	}
}





?>