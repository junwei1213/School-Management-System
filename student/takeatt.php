<?php
session_start();
if(!isset($_COOKIE['UNAME'])){
	header('location:login.php');
	die();
}
$_SESSION['UNAME']=$_COOKIE['UNAME'];




include ('../config.php');

if(isset($_POST['result'])){
	$result = $_POST['text'];
	$class =explode(".",$text);
	$sub = $class[0];
	$cla = $class[1];
	$name = $_SESSION['UNAME'];
	$currentDateTime = date('Y-m-d H:i:s');
    
	$sql = "UPDATE attendance SET 
			datetime='".$currentDateTime."'
			,attend='1' 
			WHERE subjectid='".$sub."' AND class='".$cla."' AND studentid='".$name."'";
	if(mysqli_query($conn,$sql)){
		echo "Successfully inserted";
		header('Location:success.php');
	}else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}
}
$conn->close();
?>