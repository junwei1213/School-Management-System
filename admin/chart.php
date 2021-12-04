<?php
include ('../config.php');
include('admininterface.php');
?>


<?php

	if(isset($_POST['submit'])){
		$subjectid = $_POST['subjectid'];
		$class = $_POST['class'];
		//$query = "SELECT attend,count(attend)as total FROM attendance WHERE datetime LIKE '%$search%' group by attend";
		$query="SELECT studentid,subjectid,attend,count(attend)as total FROM 
				attendance WHERE subjectid LIKE '%$subjectid%' AND class LIKE '%$class%'group by attend";
		$result= mysqli_query($conn,$query);
	}	
		
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/interface.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<br><br><br>
	<form id="form_display" method="post" action="">
		<label for="subjectid">Select Subject Id</label>
		<select name="subjectid">
			<option></option>
			<option>MPU3253</option>
			<option>IBM4205</option>
			<option>IBM4202</option>
		</select><br>
		<label for="subjectid">Select Class</label>
		<select name="class">
			<option></option>
			<option>Week1</option>
			<option>Week2</option>
			<option>Week3</option>
		</select>
		<input type="submit" name="submit" id="submit">
		
		</form>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

	//Pie Chart
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Absent n Attend', 'Amount'],
		
			<?php
			
				while($chart = mysqli_fetch_assoc($result))
				{
					
					echo "['".$chart['attend']."',".$chart['total']."],";
				}
			
			?>
        ]);

        var options = {
          title: 'Student Attandance Review'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
	


<div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>