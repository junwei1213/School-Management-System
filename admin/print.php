<?php
include('../config.php');
session_start();
if (!isset($_COOKIE['UNAME'])) {
	header('location:login.php');
	die();
}
$adminid = $_COOKIE['UNAME'];
?>

<html>
<body onload="window.print()">    
<head>
	<title>QR code genaral</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
    $subjectid = $_POST['subject'] ?? "";
	$class = $_POST['class'] ?? "";

    $searchsql = "SELECT studentid,datetime,attend FROM attendance WHERE subjectid LIKE '%$subjectid%' AND class LIKE '%$class%'";
		if ($result = mysqli_query($conn, $searchsql)) {
			if (mysqli_num_rows($result) > 0) {
				echo "<div class=container-table100>";
				echo "<div class=wrap-table100>";
				echo "<div class=table100>";
				echo "<table>";
				echo "<thead>";
				echo "<tr class=table100-head>";
				echo "<th class=column1>Student</th>";
				echo "<th class=column2>Date Time</th>";
				echo "<th class=column3>Attendance</th>";
				echo "</tr>";
				echo "</thead>";
                $index = 0;
				while ($data = mysqli_fetch_assoc($result)) {
					echo "<tbody>";
                    if(isset($_POST['selectStudent'][$index])) //check box is ticked
                    {
                        echo "<tr>";
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
                        $index++;
                    }					
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
?>

    </body>
</html>