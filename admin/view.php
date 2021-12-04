<?php
include ('../config.php');
include('../libs/phpqrcode/qrlib.php');
include('admininterface.php');
session_start();
if(!isset($_COOKIE['UNAME'])){
	header('location:login.php');
	die();
}
$adminid=$_COOKIE['UNAME'];

?>

<!DOCTYPE html>
<html>
	<head>
	<title>QR code genaral</title>
    <link rel="stylesheet" type="text/css" href="../css/interface.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
	<body>
	<center>
	<br><br><br><br>
	
<form method="post" action="" >
	<?php
							$sqlsubject1 = "SELECT subjectid FROM subject WHERE adminid='$adminid'";
							$result1=mysqli_query($conn,$sqlsubject1);
							?>
							
							<select name="subject2" onchange="this.form.submit()">
							<?php
							echo '<option value=""></option>';
							$num_results1 = mysqli_num_rows($result1);
								for ($i=0;$i<$num_results1;$i++) {
								$row1=mysqli_fetch_array($result1);
								$subjectid1 = $row1['subjectid'];
								
								echo '<option value="'.$subjectid1 .'">'.$subjectid1.'</option>';
								}
							echo "</select>";
						
						?>

	</form>


<?php
if(isset($_POST['subject2'])){
		$sub=$_POST['subject2'];
		$sqlselect = "SELECT * FROM class_list WHERE adminid ='".$adminid."' AND subjectid='$sub' ORDER BY class";
		if($result = mysqli_query($conn,$sqlselect)){
		if(mysqli_num_rows($result)>0){
			
			
			echo "<form  method=get id='form_display'>";
			echo "<a href=insert.php class=text1>Create Class</a>";
			echo "<table id='form_display' style=margin-left:-50%;>";
			echo "<thead>";	
				echo "<tr >";
					echo "<th >Subject</th>";
					echo "<th >Week</th>";
					echo "<th >Description</th>";
					echo "<th >Vaveu</th>";
					
					echo "<th >Date Time Start</th>";
					echo "<th >Date Time End</th>";
					
					
					echo "<th class=column7>QR Code</th>";
					
					
					
					
				echo "</tr>";
				echo "</thead>";	
			while($data = mysqli_fetch_assoc($result)){
				echo "<tbody>";
				echo "<tr>";
					echo "<td >".$data['subjectid']."</td>";
					echo "<td >".$data['class']."</td>";
					echo "<td >".$data['description']."</td>";
					echo "<td >".$data['venue']."</td>";
					
					echo "<td >".$data['datetime_start']."</td>";
					echo "<td >".$data['datetime_end']."</td>";
					
					echo "<td ><img src=".$data['qrcode']." style=width:128px;height:128px ></td>";
					
					}
					
				
				echo "</tr>";
				echo "</tbody>";
			echo "</table>";
			echo "</div>";
			echo "</div>";
		echo "</div>";
			echo "</form>";
			
			mysqli_free_result($result);
		}else{
			echo "<center><a href=insert.php class=text1>Create Class</a><br></center>";
			echo "No record";
		}
		
	
}else{
	echo "ERROR: $sqlselect.".mysqli_error($conn);
}
}else{
			echo "<center><a href=insert.php class=text1>Create Class</a><br></center>";
			
		}

?>
</center>
</body>
</html>