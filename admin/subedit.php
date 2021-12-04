<?php
include('../config.php');
include('admininterface.php');
session_start();
if(!isset($_COOKIE['UNAME'])){
	header('location:login.php');
	die();
}
$_SESSION['UNAME']=$_COOKIE['UNAME'];
$subjectid = $_REQUEST['subjectid'];
$mysql = mysqli_query($conn,"SELECT * FROM subject where subjectid='".$subjectid."'");
$data = mysqli_fetch_assoc($mysql);

if(isset($_POST['submit'])){
	$subjectname = $_POST['name'];
	$credithours = $_POST['credit'];
	$semester = $_POST['semester'];
	$fee = $_POST['fee'];
	$lecturer = $_POST['lecturer'];
	
	$sqlup = mysqli_query($conn,"UPDATE subject SET subjectname='$subjectname',
													credithours = '$credithours',
													semester='$semester',
													subjectfee='$fee',
													adminid='$lecturer'
													WHERE subjectid='$subjectid'");
	if($sqlup){
		header('location:subjectadd.php');
	}else{
		mysqli_error();
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
<h3>Course Detail</h3>
<table id="form_display">
	<tr>
		<td>Course ID</td>
		<td><?php echo $data['subjectid'];  ?></td>
	</tr>
	<tr>
		<td>Course Name</td>
		<td><input type="text" name="name" value="<?php echo $data['subjectname'];  ?>"></td>
	</tr>
	<tr>
		
		<td>Credit Hours</td>
		<td><input type="text" name="credit" value="<?php echo $data['credithours'];  ?>"></td>	
	</tr>
				
	<tr>
	<?php
	$sql="SELECT * FROM semester ";
						$result=mysqli_query($conn,$sql);
							if($result !== 0){
							?>
							<?php
							}
							?>
		<td>Semester</td>
		<td><select name="semester">
		<option value="<?php $data['semester']; ?>"><?php echo $data['semester']; ?></option>
			<?php $num_results = mysqli_num_rows($result);
			for($i=0;$i<$num_results;$i++){
				$row=mysqli_fetch_array($result);
				$semester = $row['semester'];
				echo '<option value="'.$semester .'">'.$semester.'</option>';
			}
		?>
		</select>
								
		
	</tr>
	<tr>
		
		<td>Course Fee</td>
		<td><input type="text" name="fee" value="<?php echo $data['subjectfee'];  ?>"></td>	
	</tr>
	<tr>
	<?php
	$sql="SELECT * FROM admindata ";
						$result=mysqli_query($conn,$sql);
							if($result !== 0){
							?>
							<?php
							}
							?>
		<td>Lecturer</td>
		<td><select name="lecturer">
		<option value="<?php $data['adminid']; ?>"><?php echo $data['adminid']; ?></option>
			<?php $num_results = mysqli_num_rows($result);
			for($i=0;$i<$num_results;$i++){
				$row=mysqli_fetch_array($result);
				$adminid = $row['adminid'];
				echo '<option value="'.$adminid .'">'.$adminid.'</option>';
			}
		?>
		</select>
								
		
	</tr>
	<tr >
		<td colspan="2"><input type="submit" name="submit" value="Update"></td>
		</tr>


</table>
</form>
