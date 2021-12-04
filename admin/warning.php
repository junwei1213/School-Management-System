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

<html>
<head>

	<link rel="stylesheet" type="text/css" href="../css/interface.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
<body>
	<form id="form_display" method="post" action="">
		<br><br><br><br><?php
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
							?>
			<div class="submit">
				<input type="submit" name="submit" id="submit">
			</div>
		<br>
	</form>
</body>
</html>

<?php
	
	//$query = "SELECT studentid,subjectid,count(attend)as total FROM attendance group by subjectid";
	//$result= mysqli_query($conn,$query); 
	
	if(isset($_POST['submit'])){
		$search = $_POST['subject'];
		$query = "SELECT attend,studentid,subjectid,sum(attend='attend')as attend,sum(attend='absent')as absent FROM attendance WHERE subjectid LIKE '%$search%' group by studentid";
		$result= mysqli_query($conn,$query);
		

			
		while($list = mysqli_fetch_assoc($result))
		{
			//$total_attend=$list['attend'];
			$total_absent=$list['absent'];

			//$percentage_attend=($total_attend/$total_absent)*100;
			echo "<table class=styled-table id='form_display'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th colspan=2>"."Student list"."</th>";
			echo "</tr>";
			echo "</thead>";
			
			if($list['studentid']&&$total_absent<='3')
			{
				
				echo "<tbody>";
				echo "<td>";
				echo $list['studentid'].' is not under warning of '.$list['subjectid'].'<br>';
				echo "</td>";
				echo "</tbody>";
	        }
			else
			{
				echo "<tbody>";
				echo "<tr>";
				echo "<td>";
				echo $list['studentid'].' is under warning of '.$list['subjectid'];
				echo "</td>";
				echo "<td>";
				echo "<form id='form_display' method='POST' action=mail.php?studentid=".urlencode($list['studentid']);
				echo "><button type=send name=send>Send</button></form>";
				echo "</td>";
				echo "</tr>";
				echo "</tbody>";
	        }
			echo"<br>";
			echo "</table>";
		}
	}
		
	
	
?>


