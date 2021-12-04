<?php
include('../config.php');
include('admininterface.php');
session_start();
if (!isset($_COOKIE['UNAME'])) {
	header('location:login.php');
	die();
}
$adminid = $_COOKIE['UNAME'];
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="../css/interface.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<br><br><br><br>
<body>
	<?php
	echo "<form method=post id='form_display'>";

	$sql = "SELECT subjectid FROM subject WHERE adminid='" . $adminid . "'";
	$result = mysqli_query($conn, $sql);
	if ($result !== 0) {
		echo "<label>Class Name</label>";
		echo '<td><select name="subject">';
		echo '<option value=""></option>';
		$num_results = mysqli_num_rows($result);
		for ($i = 0; $i < $num_results; $i++) {
			$row = mysqli_fetch_array($result);
			$subjectid = $row['subjectid'];

			echo '<option value="' . $subjectid . '">' . $subjectid . '</option>';
		}
		echo "</select>";
	}

	$sql = "SELECT class FROM class_list WHERE adminid='" . $adminid . "'";
	$result = mysqli_query($conn, $sql);
	if ($result !== 0) {
		echo "<label>Week</label>";
		echo '<td><select name="class">';
		echo '<option value=""></option>';
		$num_results = mysqli_num_rows($result);
		for ($i = 0; $i < $num_results; $i++) {
			$row = mysqli_fetch_array($result);
			$class = $row['class'];

			echo '<option value="' . $class . '">' . $class . '</option>';
		}
		echo "</select>";


		echo "<input type=submit name=submitSearch value=search>";
	}

	echo "</form>";

	if (isset($_POST['submitSearch'])) {
		echo "<form method='POST' action='print.php' id='form_display' target='_blank'>";
		$subjectid = $_POST['subject'];
		echo "<input type='hidden' name='subject' id='form_display' value='".$subjectid."'>";
		$class = $_POST['class'];
		echo "<input type='hidden' name='class' id='form_display' value='".$class."'>";

		$searchsql = "SELECT studentid,datetime,attend FROM attendance WHERE subjectid LIKE '%$subjectid%' AND class LIKE '%$class%'";
		if ($result = mysqli_query($conn, $searchsql)) {
			if (mysqli_num_rows($result) > 0) {
				
				echo "<table id='form_display'>";
				echo "<thead>";
				echo "<tr class=table100-head>";
				echo "<th></th>";
				echo "<th class=column1>Student</th>";
				echo "<th class=column2>Date Time</th>";
				echo "<th class=column3>Attendance</th>";
				echo "</tr>";
				echo "</thead>";
				while ($data = mysqli_fetch_assoc($result)) {
					echo "<tbody>";
					echo "<tr>";
					echo "<td>" . "<input type='checkbox' name='selectStudent[]' value='".$data['studentid']."' checked /></td>";
					echo "<td class=column1>" . $data['studentid'] . "</td>";
					echo "<td class=column2>" . $data['datetime'] . "</td>";
					echo '<td class=column3>';

					if ($data['attend'] == '1') {

						echo 'Attendance';
					} else {
						echo 'Not Attendance';
					}
					echo "</td>";
					echo "</tr>";
					echo "</tbody>";
				}
				echo "</table>";

				mysqli_free_result($result);
			} else {
				echo "No record";
			}
		} else {
			echo "ERROR: $sql." . mysqli_error($conn);
		}
		mysqli_close($conn);
		echo "</div>";
		echo "</div>";
		echo "</div>";

		echo '<input type="submit" id=form_display name="submitPrint" value="Print">';
		echo "</form>";
	}
	
	
	?>


</body>

</html>