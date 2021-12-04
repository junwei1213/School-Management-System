<?php
include('../config.php');
session_start();
if(!isset($_COOKIE['UNAME'])){
	header('location:login.php');
	die();
}
$_SESSION['UNAME']=$_COOKIE['UNAME'];

$sqlif = mysqli_query($conn,"SELECT * FROM enroll WHERE studentid='".$_SESSION['UNAME']."' ");
		while($data = mysqli_fetch_assoc($sqlif)){
			$payday = $data['payday'];
if($payday != NULL){
	echo "You have already make transaction <a href=receipt.php>View Receipt</a>";
}else{
	
?>
<html>
<head>
	<title>Payment</title>
	<link rel="stylesheet" href="./css/_style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

  
<div class="login-content" > 


</div>

<div >
<h1>Payment</h1>
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
				<form action="/ass/student/create-checkout-session.php" method="POST">
				<table width=90% border="1">
				<tr>
				<th>Course ID</th>
				<th>Course Name</th>
                <th>Course Fee</th>
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
			
				<?php 
				endif ?>
				
				<?php
					
                    $ex = explode (', ', $v->subjectid);
					$sum = 0;

					foreach ($ex as $key=>$value) {
						echo "<tr><td>$value</td>";
					  
					$sqlselect = "SELECT * FROM subject WHERE subjectid='".$value."'";
						if($result = mysqli_query($conn,$sqlselect)){
							if(mysqli_num_rows($result)>0){
								while($data = mysqli_fetch_assoc($result)){
									echo "<td>".$data['subjectname']."</td>";
									echo "<td>RM ".$data['subjectfee']."</td>";

									$next = $data['subjectfee'];
									$sum = $sum + $next;
									
									
								}
							}else{
								echo "no record";
							}
						}else{
						echo "ERROR: $sqlselect.".mysqli_error($conn);
						}
					}
					$query = mysqli_query($conn,"UPDATE enroll SET total='".$sum."' WHERE studentid='".$_SESSION['UNAME']."'");
					echo "<tr><tr><td colspan=2><b>Total Amount</b></td><td align=left><b>RM ".$sum."</b></td>";
				?>
			</tr>
		<td><td>
		<td>
        <button type="submit" id="checkout-button">Checkout</button></td>
					<?php
			if($k == 0): ?>
			
			<?php?>

			<?php 
				endif ?>
			<?php endforeach ?>
			
        <?php endforeach ?>
		
		</table>
		
		</form>
		
		<?php
		}
		}
		}?>
</body>
</html>