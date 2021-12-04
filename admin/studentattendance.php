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
<link rel="stylesheet" href="libs/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/interface.css">
  </head>
	<body>
	<br><br><br><br>
	<?php
					echo "<form method=post id='form_display' >";

						$sql="SELECT subjectid FROM subject WHERE adminid='".$adminid."'";
						$result=mysqli_query($conn,$sql);
							if($result !== 0){
							echo "<label>Class Name</label>";
							echo '<td><select name="subject" required>';
							echo '<option value=""></option>';
							$num_results = mysqli_num_rows($result);
								for ($i=0;$i<$num_results;$i++) {
								$row=mysqli_fetch_array($result);
								$subjectid = $row['subjectid'];
								
								echo '<option value="'.$subjectid .'">'.$subjectid.'</option>';
								}
							echo "</select>";
							}
							
							$sql="SELECT class FROM class_list WHERE adminid='".$adminid."'";
						$result=mysqli_query($conn,$sql);
							if($result !== 0){
							echo "<label>Class Name</label>";
							echo '<td><select name="class" required>';
							echo '<option value=""></option>';
							$num_results = mysqli_num_rows($result);
								for ($i=0;$i<$num_results;$i++) {
								$row=mysqli_fetch_array($result);
								$class = $row['class'];
								
								echo '<option value="'.$class .'">'.$class.'</option>';
								}
							echo "</select>";
							
							
								echo "<input type=submit name=submit value=search>";
								}
								
								echo "</form>";
								if(isset($_POST['submit'])){
									$subjectid = $_POST['subject'];
									$class = $_POST['class'];
							$searchsql = "SELECT studentid,datetime,attend FROM attendance WHERE subjectid LIKE '%$subjectid%' AND class LIKE '%$class%'";
							if($result = mysqli_query($conn,$searchsql)){
								if(mysqli_num_rows($result)>0){
									
									echo "<table id='form_display'>";
									echo "<thead>";	
									echo "<tr class=table100-head>";
									echo "<th class=column1>Student</th>";
									echo "<th class=column2>Date Time</th>";
									echo "<th class=column3>Attendance</th>";
									echo "</tr>";
									echo "</thead>";
								while($data = mysqli_fetch_assoc($result)){
									echo "<tbody>";
									echo "<tr>";
									
									echo "<td class=column1>".$data['studentid']."</td>";
									echo "<td class=column2>".$data['datetime']."</td>";
									echo '<td class=column3><select name=attend>';
							
									if($data['attend'] == '1'){
										
										echo '<option value="Attendance">Attendance</option>';
										echo '<option value="Not Attendance">Not Attendance</option>';
									}else{
										echo '<option value="Not Attendance">Not Attendance</option>';
										echo '<option value="Attendance">Attendance</option></select>';
									}
									echo "</td>";
									echo "</tr>";
									echo "</tbody>";
								}
								echo "</table>";
			
								mysqli_free_result($result);
								}else{
								echo "No record";
							}
							}else{
								echo "ERROR: $sql.".mysqli_error($conn);
							}
							mysqli_close($conn);
							echo "</div>";
							echo "</div>";
							echo "</div>";
							}
						?>
						
	
	</body>

</html>
