<?php
include('../config.php');
session_start();
if(!isset($_COOKIE['UNAME'])){
	header('location:login.php');
	die();
}
$_SESSION['UNAME']=$_COOKIE['UNAME'];
$semester = $_REQUEST['semester'];
if(isset($_POST['submit'])){
	$reason = $_POST['reason'];
	$pending = 1;
$sql =  "UPDATE enroll SET status='1',
											reason='".$reason."'
								WHERE semester='".$semester."' 
										AND studentid='".$_SESSION['UNAME']."'";
	
if(mysqli_query($conn,$sql)){
		echo "Successfully inserted";
		header('Location:courseadd.php');
	}else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}

$conn->close();
}

	

?>
<form  method="post">
Reason:
<input type="text" name="reason"><br />
<input type="submit" name="submit" value="Submit">
</form>