<?php
include ('../config.php');

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
	<?php
	/*echo "<form method=post id='form_display' >";

						$sql="SELECT subjectid FROM subject WHERE adminid='".$adminid."'";
						$result=mysqli_query($conn,$sql);
							if($result !== 0){
							echo "<label>Class Name</label>";
							echo '<td><select name="subject" onchange="this.form.submit()" required>';
							echo '<option value=""></option>';
							$num_results = mysqli_num_rows($result);
								for ($i=0;$i<$num_results;$i++) {
								$row=mysqli_fetch_array($result);
								$subjectid = $row['subjectid'];
								
								echo '<option value="'.$subjectid .'">'.$subjectid.'</option>';
								}
							echo "</select>";
							echo "</form>";
							}*/
							?>
<?php
 //if (isset($_POST['subject'])){
		$sqlselect = "SELECT * FROM subject WHERE adminid='$adminid' ";
		if($result = mysqli_query($conn,$sqlselect)){
			
		if(mysqli_num_rows($result)>0){
			
			
			
			echo "<form  method=get id='form_display'>";
			echo "<a href=insertsubject.php class=text1>Add Course</a>";
			echo "<table id='form_display' style=margin-left:-50%;>";
			echo "<thead>";	
				echo "<tr >";
					echo "<th >Course ID</th>";
					echo "<th >Course Name</th>";
					echo "<th >Credit Hours</th>";
					echo "<th >Semester</th>";
					echo "<th >Course Fee</th>";
					echo "<th >Lecturer</th>";
					echo "<th>Action </th> ";
					
					
					
					
					
					
					
				echo "</tr>";
				echo "</thead>";	
			while($data = mysqli_fetch_assoc($result)){
				echo "<tbody>";
				echo "<tr>";
					echo "<td >".$data['subjectid']."</td>";
					echo "<td >".$data['subjectname']."</td>";
					echo "<td >".$data['credithours']."</td>";
					echo "<td >".$data['semester']."</td>";
					
					echo "<td >".$data['subjectfee']."</td>";
					echo "<td >".$data['adminid']."</td>";
					echo "<td><a href=subedit.php?subjectid=".$data['subjectid'].">Detail</a></td>";
					
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
			echo "<a href=insertsubject.php class=text1>Add Course</a>";
			echo "No record";
		}
		
	
}else{
	echo "ERROR: $sqlselect.".mysqli_error($conn);
}
// }
?>
</center>
</body>
</html>