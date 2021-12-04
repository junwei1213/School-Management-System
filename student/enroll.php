<?php 
include('../config.php');
include('studentinterface.php');
session_start();
if(!isset($_COOKIE['UNAME'])){
	header('location:login.php');
	die();
}
$_SESSION['UNAME']=$_COOKIE['UNAME'];

	
?>


<html>
<head>
	<title>Enrolment</title>
	
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/interface.css">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

      <style>
body{
    margin-top:20px;
}
.bg-light-gray {
    background-color: #f7f7f7;
}
.table-bordered thead td, .table-bordered thead th {
    border-bottom-width: 2px;
}
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}
.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6;
}


table  {
  border: 2px ;
  width: 70%;
  mergin-left:auto;
  mergin-right:auto;
}

text-align: center;

.bg-sky.box-shadow {
    box-shadow: 0px 5px 0px 0px #00a2a7
}

.bg-orange.box-shadow {
    box-shadow: 0px 5px 0px 0px #af4305
}

.bg-green.box-shadow {
    box-shadow: 0px 5px 0px 0px #4ca520
}

.bg-yellow.box-shadow {
    box-shadow: 0px 5px 0px 0px #dcbf02
}

.bg-pink.box-shadow {
    box-shadow: 0px 5px 0px 0px #e82d8b
}

.bg-purple.box-shadow {
    box-shadow: 0px 5px 0px 0px #8343e8
}

.bg-lightred.box-shadow {
    box-shadow: 0px 5px 0px 0px #d84213
}


.bg-sky {
    background-color: #02c2c7
}

.bg-orange {
    background-color: #e95601
}

.bg-green {
    background-color: #5bbd2a
}

.bg-yellow {
    background-color: #f0d001
}

.bg-pink {
    background-color: #ff48a4
}

.bg-purple {
    background-color: #9d60ff
}

.bg-lightred {
    background-color: #ff5722
}

.padding-15px-lr {
    padding-left: 15px;
    padding-right: 15px;
}
.padding-5px-tb {
    padding-top: 5px;
    padding-bottom: 5px;
}
.margin-10px-bottom {
    margin-bottom: 10px;
}
.border-radius-5 {
    border-radius: 5px;
}

.margin-10px-top {
    margin-top: 10px;
}
.font-size14 {
    font-size: 14px;
}

.text-light-gray {
    color: #d6d5d5;
}
.font-size13 {
    font-size: 13px;
}

.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
</style>  
   
</head>
<body>
<br><br><br><br>
		<?php
				$sqlselect1 = "SELECT count(semester) as total FROM enroll WHERE studentid='".$_SESSION['UNAME']."'";
				$res = mysqli_query($conn,$sqlselect1);
				while($data = mysqli_fetch_assoc($res)){
					$total = $data['total'];
				}
				
		if($total < 1){
		?>
			<h1 >sTUDENT Information</h1>
			<?php
		$sqlselect = "SELECT * FROM student WHERE studentid='".$_SESSION['UNAME']."'";
		if($result = mysqli_query($conn,$sqlselect)){
			if(mysqli_num_rows($result)>0){
				$data = mysqli_fetch_assoc($result);
					
					?>

	<table  style="border: 0px;" >
		<tr style="border: 0px;" >
			<td style="border: 0px;">
			<table style="border: 0px;" >
				<tr style="border: 0px;">
					<td style="border: 0px;">Matriculation No</td>
					<td style="border: 0px;">: <?php echo  $data['studentid']?></td>
				</tr>
				<tr style="border: 0px;">
					<td style="border: 0px;">Student Name</td>
					<td style="border: 0px;">: <?php echo  $data['studentname']?></td>
				</tr>
				<tr>
					<td style="border: 0px;">Session</td>
					<td style="border: 0px;">: <?php echo  $data['session']?></td>
				</tr>
				<tr style="border: 0px;">
					<td style="border: 0px;">Mode Of Study</td>
					<td style="border: 0px;">: <?php echo  $data['modeofstudy']?></td>
				</tr>
				</table>
			</td>
			
				
			<td style="border: 0px;">
			<table style="border: 0px;">
				<tr style="border: 0px;">
					<td style="border: 0px;">School</td>
					<td style="border: 0px;">: <?php echo  $data['school']?></td>
				</tr>
				<tr style="border: 0px;">
					<td style="border: 0px;">Level</td>
					<td style="border: 0px;">: <?php echo  $data['level']?></td>
				</tr>
				<tr style="border: 0px;">
					<td style="border: 0px;">Program</td>
					<td style="border: 0px;">: <?php echo  $data['program']?></td>
				</tr>
				<tr style="border: 0px;">
					<td style="border: 0px;">Semester</td>
					<td style="border: 0px;">: <?php echo  $data['semester']?></td>
				</tr>
				</table>
			</td>
		</tr>
	
	</table>
	


	
					
					<?php
					
					
			}else{
				echo "no record";
			}
		}else{
	echo "ERROR: $sqlselect.".mysqli_error($conn);
		}
	?>
	<br><br><br>
	
	<h5>Course Enrolment</h5>
	<form method="post" action="" >
	<label>SELECT SEMESTER</label>
	<select name="semester" onchange='this.form.submit()' >
		<option></option>
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option>4</option>
		<option>5</option>
		<option>6</option>
	</select>

	</form>
	<?php
	if(isset($_POST['semester'])){
	$semester = $_POST['semester'];
	?>
	<form action="enroll2.php" method="post">
	<table border="1">
	<tr>
            <th>Semester</th>
            <th>Course ID</th>
			<th>Course Name</th>
			<th>Credit Hours</th>
			<th>Action</th>
        </tr>
<?php
	
		$query = mysqli_query($conn,"SELECT * FROM subject WHERE semester='$semester'");
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
				<td rowspan="<?php echo count($val)?>">
				
				<?php echo $v->semester ?>
				
				</td>
			
				<?php 
				endif ?>
				
				<td> <?php echo $v->subjectid ?></td>
				<td> <?php echo $v->subjectname ?></td>
				<td> <?php echo $v->credithours ?></td>
				
					<?php
			if($k == 0): ?>
			<td rowspan="<?php echo count($val)?>">
				<?php
				echo "<a href=enroll2.php?semester=".$v->semester.">Enroll</a>";
				?>
				</td>
			<?php 
				endif ?>
			<?php endforeach ?>
			
        <?php endforeach ?>
		</tr>
		</table>
		</form>
		<?php
	}
		}else {
			echo "You already Enroll !!!!";
		}
		
		?>
		

	
</body>
</html>