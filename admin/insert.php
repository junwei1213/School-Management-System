<?php
include('../libs/phpqrcode/qrlib.php');
include('../config.php');
include('admininterface.php');
session_start();
if(!isset($_COOKIE['UNAME'])){
	header('location:login.php');
	die();

}
$adminid=$_COOKIE['UNAME'];



	if(isset($_POST['submit']) ) {
	$tempDir = '../temp/'; 
	$subject = $_POST['subject'];
	$venue = $_POST['venue'];
	$description = $_POST['description'];
	$dtstart = $_POST['dtstart'];
	$dtend = $_POST['dtend'];
	$class = $_POST['week'];
	$adminid=$_COOKIE['UNAME'];
	
	$filename = $subject.".".$class;
	$codeContents = $subject.".".$class;
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
	
	$file = "../temp/".$filename.".png";
	$sqlinset = "INSERT INTO class_list(description, venue, datetime_start, datetime_end, subjectid,qrcode,class,adminid) VALUES 
									('$description','$venue','$dtstart','$dtend','$subject','$file','$class','$adminid')";
	
	if(mysqli_query($conn, $sqlinset)){
		header('location:view.php');
		} else{
    echo "ERROR: Could not able to execute $sqlinset. " . mysqli_error($conn);
	echo "<br/>";
		}
		$sqlstuednt = "SELECT studentid FROM student WHERE subjectid LIKE'%$subject%'";
			
			
			$resultstudenid = mysqli_query($conn,$sqlstuednt);
			$rows = array();
				while($row = mysqli_fetch_assoc($resultstudenid)){
					
					$rows[] = $row;
					foreach($rows as $row){
						$row['studentid'];
							}
							$sql = "INSERT INTO attendance(subjectid,class,studentid,attend) VALUES
					('$subject','$class','".$row['studentid']."','0')";
					
	
				if(mysqli_query($conn, $sql)){
		
					}else{
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
					echo "<br/>";
					}
							
					
						
						
						
					
			}
	}

			
	
?>

<!DOCTYPE html>
<html>
	<head>
	<title>QR code genaral</title>
    <link rel="stylesheet" href="../libs/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../css/interface.css">
    </head>
	<body>
	<center>
	

			<h3><strong>QR code</strong></h3>
			<div class="input-field">
				<h3>New Class</h3>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
					<div class="form-group">
						
							<?php
					
						$sql="SELECT subjectid FROM subject WHERE adminid='".$adminid."'";
						$result=mysqli_query($conn,$sql);
							if($result !== 0){
							echo "<label>Assign To</label><br />";
							echo '<td><select name="subject">';
							echo '<option value=""></option>';
							$num_results = mysqli_num_rows($result);
								for ($i=0;$i<$num_results;$i++) {
								$row=mysqli_fetch_array($result);
								$subjectcode = $row['subjectid'];
								
								echo '<option value="'.$subjectcode .'">'.$subjectcode.'</option>';
								}
							echo "</select>";
		
								}
							
						?>
					</div>
					<div class="form-group">
						<?php
					
						$sql1="SELECT week FROM week";
						$result1=mysqli_query($conn,$sql1);
							if($result1 !== 0){
							echo "<label>Week</label><br />";
							echo '<td><select name="week">';
							echo '<option value=""></option>';
							$num_results1 = mysqli_num_rows($result1);
								for ($i=0;$i<$num_results1;$i++) {
								$row1=mysqli_fetch_array($result1);
								$week = $row1['week'];
								
								echo '<option value="'.$week .'">'.$week.'</option>';
								}
							echo "</select>";
		
								}
							
						?>
		
					</div>
					<div class="form-group">
						<label>Venue</label><br>
						<input type="text" class="form-control" name="venue" style="width:20em;" placeholder="Venue"  required  />
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea rows="10" cols="10" type="text"  name="description" style="width:20em;"  required  placeholder="Description"></textarea>
					</div>
					<div class="form-group">
						<label>DateTime Start</label>
						<input type="datetime-local" class="form-control" name="dtstart" style="width:20em;"   required value="<?php echo isset($datetime_start) ? date("Y-m-d\\TH:i",strtotime($datetime_start)) : '' ?>"  />
					</div>
					<div class="form-group">
						<label>DateTime End</label>
						<input type="datetime-local" class="form-control" name="dtend" style="width:20em;"   required value="<?php echo isset($datetime_start) ? date("Y-m-d\\TH:i",strtotime($datetime_start)) : '' ?>"  />
					</div>
					
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-danger submitBtn" style="width:20em; margin:0;" />
					</div>
					
					
				</form>
			</div>
			
		</center>	
	
	</body>

</html>