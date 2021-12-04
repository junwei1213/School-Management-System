<?php

include('../config.php');
include('admininterface.php');
session_start();
if(!isset($_COOKIE['UNAME'])){
	header('location:login.php');
	die();
}



	if(isset($_POST['submit']) ) {
	$id = $_POST['courseid'];
	$name = $_POST['name'];
	$credit =$_POST['credit'];
	$semester= $_POST['semester'];
	$fee=$_POST['fee'];
	$adminid= $_POST['lecturer'];
	
	$sqlinset = "INSERT INTO subject (subjectid,subjectname,credithours,semester,adminid,subjectfee)
					VALUES ('$id','$name','$credit','$semester','$adminid','$fee')";
	if(mysqli_query($conn, $sqlinset)){
		header('location:subjectadd.php');
		} else{
    echo "ERROR: Could not able to execute $sqlinset. " . mysqli_error($conn);
	echo "<br/>";
		}
		
			
	}

			
	
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Course ADD</title>
    <link rel="stylesheet" href="../libs/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../css/interface.css">
    </head>
	<body>
	<br><br><br><br>
	<center>

			<h3><strong>Course Add</strong></h3>
			<div class="input-field">
				
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
					<table style="border: 0px;">
					<div class="form-group">
					
					<tr style="border: 0px;">
						<th style="border: 0px;"><label>Course ID</label></th>
						<td style="border: 0px;"><input type="text" class="form-control" name="courseid" style="width:20em;" placeholder="Course ID"  required  /></td>
					</tr>
					</div>
					<div class="form-group">
						<tr>
						<th style="border: 0px;"><label>Course Name</label></th>
						<td style="border: 0px;"><input type="text" class="form-control" name="name" style="width:20em;" placeholder="Course Name"  required  /></td>
					</tr>
					</div>
					<div class="form-group">
						<tr><th style="border: 0px;"><label>Credit Hours</label></th>
						<td style="border: 0px;"><input type="text" class="form-control" name="credit" style="width:20em;" placeholder="Credit Hours"  required  /></td>
					</tr>
					</div>
					<div class="form-group">
						
	<?php
	$sql="SELECT * FROM semester ";
						$result=mysqli_query($conn,$sql);
							if($result !== 0){
							?>
							<?php
							}
							?>
		<tr>
						<th style="border: 0px;"><label>Semester</label></th>
		<td style="border: 0px;"><select name="semester" required>
		<option value=""></option>
			<?php $num_results = mysqli_num_rows($result);
			for($i=0;$i<$num_results;$i++){
				$row=mysqli_fetch_array($result);
				$semester = $row['semester'];
				echo '<option value="'.$semester .'">'.$semester.'</option>';
			}
		?>
		</select>
			</td>					
		</tr>
	</div>
	<div class="form-group">
					<tr>
						<th style="border: 0px;">	<label>Course Fee</label><br></th>
					<td style="border: 0px;">	<input type="text" class="form-control" name="fee" style="width:20em;" placeholder="Course Fee"  required  />
					</td></div>
					
				
			
			<div class="form-group">
			<?php
	$sql="SELECT * FROM admindata ";
						$result=mysqli_query($conn,$sql);
							if($result !== 0){
							?>
							<?php
							}
							?>
		<tr>
						<th style="border: 0px;"><label>Lecturer</label>
		<td style="border: 0px;"><select name="lecturer">
		<option value=""></option>
			<?php $num_results = mysqli_num_rows($result);
			for($i=0;$i<$num_results;$i++){
				$row=mysqli_fetch_array($result);
				$adminid = $row['adminid'];
				echo '<option value="'.$adminid .'">'.$adminid.'</option>';
			}
		?>
		
		</select>
		</td>
		</th>
		</div>
		
		<div class="form-group">
		
		<tr style="border: 0px;">
		
				<td ColSpan=2 style="border: 0px;">	<center>	
						<input type="submit" name="submit" class="btn btn-danger submitBtn" value="Add" style="width:20em; margin:0;" />
					<center>
					</td>
					</tr>
					</div>
		</div>
		</table>
		</form>
	<center>
	</body>

</html>