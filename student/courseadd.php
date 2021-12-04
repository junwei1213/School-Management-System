<?php
include('../config.php');
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
	<title>Course Drop</title>
	<link rel="stylesheet" type="text/css" href="../css/interface.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

  
<div class="login-content" > 
<br><br><br><br>

</div>
<div >
<h1>sTUDENT Information</h1>
			<?php
		$sqlselect = "SELECT * FROM student WHERE studentid='".$_SESSION['UNAME']."'";
		if($result = mysqli_query($conn,$sqlselect)){
			if(mysqli_num_rows($result)>0){
				while($data = mysqli_fetch_assoc($result)){
					echo "<form method=post>";
					echo "<table>";
					echo "<tr >";
					echo "<td colspan=2><h3>Student Information</h3></td>";
					echo "</tr>";
					echo	"<tr>";
					echo		"<td>Student ID</td>";
					echo		"<td>".$_SESSION['UNAME']."</td>";
					echo	"</tr>";
					echo	"<tr>";
					echo		"<td>Student Name</td>";
					echo		"<td>".$data['studentname']."</td>";
					echo	"</tr>";
					echo	"<tr>";
					echo		"<td>Student IC</td>";
					echo		"<td>".$data['studentic']."</td>";
					echo	"</tr>";
					echo	"<tr>";
					echo		"<td>Mode of Study</td>";
					echo		"<td>".$data['modeofstudy']."</td>";
					echo	"</tr>";
					echo	"<tr>";
					echo		"<td>Session</td>";
					
					echo		"<td>".$data['session']."</td>";
					echo	"</tr>";
					echo	"<tr>";
					echo		"<td>Program</td>";
					echo		"<td>".$data['program']."</td>";
					echo	"</tr>";
					echo	"<tr>";
					echo		"<td>Level</td>";
					echo		"<td>".$data['level']."</td>";
					echo	"</tr>";
					echo	"<tr>";
					echo		"<td>Semester</td>";
					echo		"<td>".$data['semester']."</td>";
					echo	"</tr>";
					$semester = $data['semester'];
					
					
					
					
				}
				echo "</table>";
				
					
					
					echo "</form>";
					mysqli_free_result($result);
			}else{
				echo "no record";
			}
		}else{
	echo "ERROR: $sqlselect.".mysqli_error($conn);
		}
	?>
	
<?php
		$sqlif = mysqli_query($conn,"SELECT status FROM enroll WHERE studentid='".$_SESSION['UNAME']."' ");
		while($data = mysqli_fetch_assoc($sqlif)){
			$status = $data['status'];
		}
		if($status == 0){
			?>
			<h5>Course Enrolment</h5>
				<form action="enroll2.php" method="post">
				<table border="1">
				<tr>
				<th>Semester</th>
				<th>Course ID</th>
			
				<th>Action</th>
        </tr>
		<?php
		$query = mysqli_query($conn,"SELECT * FROM student WHERE studentid='".$_SESSION['UNAME']."' AND semester ='".$semester."'");
		
		$arr = array();
		
		while ($row = mysqli_fetch_object($query)){
			$arr[$row->semester][] = $row;
		}
		?>
		<?php foreach ($arr as $key => $val) : ?>
            <?php foreach ($val as $k => $v) : ?>
			
		<tr>
		<?php
			if($k == 0): ?>
				<td rowspan="<?php echo count($val)?>">
				
				<?php echo $v->semester ?>
				
				</td>
			
				<?php 
				endif ?>
				
				<?php
					
					echo	"<td> You are Enroll the Subject ". $v->subjectid."</td>";
					
				?>
				
				
				
				
				
					<?php
			if($k == 0): ?>
			<td rowspan="<?php echo count($val)?>">
				<?php
				echo "<a href=drop.php?semester=".$v->semester.">Drop</a>";
				?>
				</td>
			<?php 
				endif ?>
			<?php endforeach ?>
			
        <?php endforeach ?>
		</tr>
		</table>
		</form>
		<?php
		}else{
			?>
			<h5>Course Enrolment</h5>
				<form action="enroll2.php" method="post">
				<table border="1">
				<tr>
				<th>Semester</th>
				<th>Course ID</th>
			
				
        </tr>
		<?php
		$query = mysqli_query($conn,"SELECT * FROM student WHERE studentid='".$_SESSION['UNAME']."' AND semester ='".$semester."'");
		
		$arr = array();
		
		while ($row = mysqli_fetch_object($query)){
			$arr[$row->semester][] = $row;
		}
		?>
		<?php foreach ($arr as $key => $val) : ?>
            <?php foreach ($val as $k => $v) : ?>
			
		<tr>
		<?php
			if($k == 0): ?>
				<td rowspan="<?php echo count($val)?>">
				
				<?php echo $v->semester ?>
				
				</td>
			
				<?php 
				endif ?>
				
				<?php
					
					echo	"<td> You are Enroll the Subject ". $v->subjectid."</td>";
					
				?>
				
				
				
				
				
					
			<?php endforeach ?>
			
        <?php endforeach ?>
		</tr>
		</table>
		</form>
		
			<h1>Pending</h1>
				<form action="enroll2.php" method="post">
				<table border="1">
				<tr>
				<th>Semester</th>
				<th>Course ID</th>
			
				<th>Action</th>
        </tr>
		<?php
			
			$query = mysqli_query($conn,"SELECT * FROM student WHERE studentid='".$_SESSION['UNAME']."' AND semester ='".$semester."'");
		
		$arr = array();
		
		while ($row = mysqli_fetch_object($query)){
			$arr[$row->semester][] = $row;
		}
		?>
		<?php foreach ($arr as $key => $val) : ?>
            <?php foreach ($val as $k => $v) : ?>
			
		<tr>
		<?php
			if($k == 0): ?>
				<td rowspan="<?php echo count($val)?>">
				
				<?php echo $v->semester ?>
				
				</td>
			
				<?php 
				endif ?>
				
				<?php
					
					echo	"<td> You are Enroll the Subject ". $v->subjectid."</td>";
					
				?>
				
				
				
				
				
					<?php
			if($k == 0): ?>
			<td rowspan="<?php echo count($val)?>">
				<?php
				if($status == 1){
					echo "Drop Pending";
				}else if($status == 2){
					echo "Drop Reject" ;
				}
				
				?>
				</td>
			<?php 
				endif ?>
			<?php endforeach ?>
			
        <?php endforeach ?>
		</tr>
		</table>
		</form>
		<?php
		}
		?>

</body>
</html>
