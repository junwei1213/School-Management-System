<?php
include ('../config.php');
include('admininterface.php');
include('../libs/phpqrcode/qrlib.php');
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
     </head>
	<body>
	<br><br><br><br>
<?php
		$sqlselect = "SELECT * FROM enroll ";
		if($result = mysqli_query($conn,$sqlselect)){
		if(mysqli_num_rows($result)>0){
			echo "<form  method=get id='form_display'>";
			echo "<div class=container-table100>";
			echo "<div class=wrap-table100>";
			echo "<div class=table100>";
			
			
			echo "<table>";
			echo "<thead>";	
				echo "<tr class=table100-head>";
					echo "<th class=column1>Student ID</th>";
					
					echo "<th class=column3>Subject ID</th>";
					echo "<th class=column4>Status</th>";
					echo "<th class=column5>Reason</th>";
					echo "<th class=column6>Detail</th>";
					
					
					
					
					
					
					
				echo "</tr>";
				echo "</thead>";	
			while($data = mysqli_fetch_assoc($result)){
				echo "<tbody>";
				echo "<tr>";
					echo "<td class=column1>".$data['studentid']."</td>";
					
					echo "<td class=column3>".$data['subjectid']."</td>";
					
					if($data['status'] == 0){
						echo "<td class=column4>Enroll Succesfull</td>";
					}else if($data['status'] == 1){
						echo "<td class=column4>Drop Pending</td>";
					}else if($data['status'] == 2){
						echo "<td class=column4>Drop Reject</td>";
					}
					
					
					echo "<td class=column5>".$data['reason']."</td>";
					echo "<th class=column6><a href=detail.php?studentid=".$data['studentid'].">Detail</a></th>";
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
			
			echo "No record";
		}
		
	
}else{
	echo "ERROR: $sqlselect.".mysqli_error($conn);
}
?>
</body>
</html>