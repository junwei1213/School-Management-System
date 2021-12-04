<?php
include('../config.php');
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
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	.flex{
		display: inline-flex;
		width: 100%;
	}
	.w-50{
		width: 50%;
	}
	.text-center{
		text-align:center;
	}
	.text-right{
		text-align:right;
	}
	table.wborder{
		width: 100%;
		border-collapse: collapse;
	}
	 table.wborder>tbody>tr>td>p{
		border:1px solid;
	}
	p{
		margin:unset;
	}

</style>
</head>
<body onload="window.print()">

  

<div class="container-fluid">
<h1 class="text-center">Receipt</h1>
<hr>
			<?php
		$sqlselect = "SELECT * FROM student WHERE studentid='".$_SESSION['UNAME']."'";
		if($result = mysqli_query($conn,$sqlselect)){
			if(mysqli_num_rows($result)>0){
				while($data = mysqli_fetch_assoc($result)){
                    
					echo "<h3>Student Information</h3>";
					echo "<div class=flex>
                    <div class=w-50><form method=post>";
					
					
					echo		"<p>Student ID: <b>".$_SESSION['UNAME'];
					echo		"</b></p><p>Student Name: <b>".$data['studentname']."</b></p>";
					echo		"<p>Student IC: <b>".$data['studentic']."</b>";
					echo		"<p>Mode of Study: <b>".$data['modeofstudy']."</b></p></div>";
					echo		"<div class=w-50><p>Session :<b>".$data['session']."</b></p>";
                    echo		"<p>Program: <b>".$data['program']."</b>";
					echo		"</p><p>Level: <b>".$data['level']."</b></p>";
					echo		"<p>Semester: <b>".$data['semester']."</b></p></div>";
                   

				}
				echo "</div><hr><h3>Payment Summary</h3><p align=right><b>";
                
				
		$sqlif = mysqli_query($conn,"SELECT * FROM enroll WHERE studentid='".$_SESSION['UNAME']."' ");
		while($data = mysqli_fetch_assoc($sqlif)){

                echo "<p align=right>Payment Date: <b>".$data['payday']."</b><br>";
            
            $status = $data['status'];
		}
		if($status == 0){
			?>
            <br>
				<form action="/ass/student/create-checkout-session.php" method="POST">
				<table class="wborder" width=80% border="1">
				<tr>
				<th>Course ID</th>
				<th>Course Name</th>
                <th>Course Fee</th>
        </tr>
		<?php
		$query = mysqli_query($conn,"SELECT * FROM student WHERE studentid='".$_SESSION['UNAME']."'");
		
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
					echo "</table><br><table align=right><tr><tr><td colspan=2><b>Total Amount :</b></td><td><b>RM ".$sum."</b></td>";
                    echo "<tr><tr><td colspan=2><b>Total Paid :</b></td><td><b>RM ".$sum."</b></td><table>";
				?>
			</tr>
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
					
					
					echo "</form>";
					mysqli_free_result($result);
			}else{
				echo "no record";
			}
		}else{
	echo "ERROR: $sqlselect.".mysqli_error($conn);
		}
		
	?>
	
</body>
</html>
