<?php
include('../config.php');
session_start();
if(!isset($_COOKIE['UNAME'])){
	header('location:login.php');
	die();
}
$_SESSION['UNAME']=$_COOKIE['UNAME'];
$semester = $_REQUEST['semester'];
$student = $_SESSION['UNAME'];
$sql = mysqli_query($conn, "SELECT subjectid FROM subject where semester='".$semester."'");
	$list = array();
	while($row =mysqli_fetch_assoc($sql)){
		 $list[] = $row;
		
	}
	$output = implode(', ', array_map(
						function($v,$k){
							if(is_array($v)){
								return implode('&'.$k.'[]=', $v);
							}else{
								return $k.'='.$v;
							}
						},
						$list,
						array_keys($list)
						));
	
	
	$sqlinset = mysqli_query($conn,"UPDATE student  SET 
					subjectid='".$output."',
					semester='".$semester."',
					credithours='4'
					WHERE studentid='".$_SESSION['UNAME']."'");
	
		$status = 0;
	
	$sqlinset1 = mysqli_query($conn,"INSERT INTO enroll(studentid,semester,subjectid,status)
						VALUES ('$student','$semester','$output','$status')");
	
		if($sqlinset && $sqlinset1){
		echo "Successfully inserted";
		header('Location:index.php');
	}else{
		echo  mysqli_error($conn);
	}

$conn->close();

	

?>

