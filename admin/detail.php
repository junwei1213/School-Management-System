<?php
include('../config.php');
include('admininterface.php');
session_start();
if(!isset($_COOKIE['UNAME'])){
	header('location:login.php');
	die();
}
$_SESSION['UNAME']=$_COOKIE['UNAME'];
$studentid = $_REQUEST['studentid'];
$mysql = mysqli_query($conn,"SELECT * FROM enroll where studentid='".$studentid."'");
$data = mysqli_fetch_assoc($mysql);

if(isset($_POST['submit'])){
	$status = $_POST['status'];
	
	if($status == 0){
		
		$sqldelect = mysqli_query($conn,"DELETE FROM enroll WHERE studentid='".$studentid."'");
		$sqldelect1 = mysqli_query($conn,"UPDATE student SET subjectid= NULL WHERE studentid='".$studentid."'");
		
		if($sqldelect && $sqldelect1){
			echo "Successfull";
			header("Location: subjectdrop.php");
		}else{
		echo mysqli_error();
	}
	}else if($status == 2){
		$sqlupdate = mysqli_query($conn , "UPDATE enroll set status='".$status."',
													");

	}
}
?>
<!DOCTYPE HTML>
<html>
<head>

<link rel="stylesheet" type="text/css" href="../css/interface.css">

</head>

<body>
<br><br><br>
<form method="post" id="form_display">
<h3>Student Enroll Detail</h3>
<table id="form_display">
	<tr>
		<td>Student ID</td>
		<td><?php echo $data['studentid'];  ?></td>
	<tr>
	<tr>
		<td>Subject ID</td>
		<td><?php echo $data['subjectid'];  ?></td>
	<tr>
	<tr>
		
		
		<td>Status</td>
		<td><select name="status">";
		
		<option value="0">Pass</option>
		<option value="2">Reject</option>
		
		
		
			</select>
			</td>
		
		
		
			
		
		
		</td>
	<tr>
	<tr>
		<td>Reason</td>
		<td><?php echo $data['reason'];  ?></td>
	<tr>
	<tr >
		<td colspan="2"><input type="submit" name="submit" value="Update"></td>
		<tr>


</table>
</form>
