<?php
include ('../config.php');
include('studentinterface.php');
session_start();
if(!isset($_COOKIE['UNAME'])){
	header('location:login.php');
	die();
}
$_SESSION['UNAME']=$_COOKIE['UNAME'];
$student =$_SESSION['UNAME'];
$sqlstudent = mysqli_query($conn,"SELECT * FROM student WHERE studentid='$student'");
$data = mysqli_fetch_array($sqlstudent);
$sql1 = mysqli_query($conn,"SELECT * FROM enroll where studentid='".$student."'");
$row = mysqli_fetch_array($sql1);
$semester = $row['semester'];

$sql = mysqli_query($conn,"SELECT * FROM enroll where studentid='".$student."' AND semester='".$semester."'");
$row1 = mysqli_fetch_assoc($sql);
$subject = $row1['subjectid'];
$subjec = explode(",",$subject);
	$sub1 = $subjec[0];
	$sub2 = $subjec[1];
	$sub3 = $subjec[2];
	



	

?>

<head>
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
<link rel="stylesheet" type="text/css" href="../css/interface.css">
</head>
<body>
<?php

?>
<br><br><br><br>
<center>
<h2>Time Table For Semester <?php echo $semester ?></h2>
<div>
<?php
echo "<form method='POST' action='printtimetable.php' >";
echo '<input type="submit" id=form_display name="submitPrint" value="Print">';
?>
</div>
<hr>
<br>
<div>
<center>
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
	

	</center>
	</div>
	<br><br><br>
	<div>
	<?php
		$sqlsubject = mysqli_query($conn,"SELECT * FROM subject WHERE semester='$semester'");
	
	?>
	<table style="border: 0px;">
		<tr style="border: 0px;">
			<td style="border: 0px;"><h4><b><u>Subject Code</u></b></h4></td>
			<td style="border: 0px;"><h4><b><u>Subject Name</u></b></h4></td>
			<td style="border: 0px;"><h4><b><u>LEcturer</u></b></h4></td>
			<td style="border: 0px;"><h4><b><u>Credit Hours</u></b></h4></td>
			
			<br>
		</tr>
		
		<?php
		
		
		while($data = mysqli_fetch_array($sqlsubject)){
		?>
		<tr style="border: 0px;">
		
			<td style="border: 0px;"><?php echo $data['subjectid']; ?></td>
			<td style="border: 0px;"><?php echo $data['subjectname']; ?></td>
			<td style="border: 0px;"><?php echo $data['adminid']; ?></td>
			<td style="border: 0px;"><?php echo $data['credithours']; ?></td>
			
			<?php
		}
		?>
		
		</tr>
		<tr style="border: 0px;">
			<td style="border: 0px;"></td>
			<td style="border: 0px;"></td>
			<th style="border: 0px;">Total</th>
			
		<td style="border: 0px;">12</td>
		</tr>
		
	</table>
	</div>
	<br><br><br>
	</center>
<?php

if($semester == 1){
	?>
	<center>
	
<div class="container">
                <div class="timetable-img text-center">
                    <img src="img/content/timetable.png" alt="">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr class="bg-light-gray">
                                <th class="text-uppercase">Time
                                </th>
                                <th class="text-uppercase">0800</th>
                               <th class="text-uppercase">0900</th>
							   <th class="text-uppercase">1000</th>
							    <th class="text-uppercase">1100</th>
								 <th class="text-uppercase">1200</th>
								  <th class="text-uppercase">1300</th>
								   <th class="text-uppercase">1400</th>
								    <th class="text-uppercase">1500</th>
									 <th class="text-uppercase">1600</th>
									  <th class="text-uppercase">1700</th>
									   
									   
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">MON</td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
								   <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>

								   </td>
								   <td>
								   <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>
                                   </td>
								   
								   <td>
								  
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
<tr>
                                <td class="align-middle">TUE</td>
                                <td>
                                    <center><?php echo $sub2 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
                                    <center><?php echo $sub2 ?><br>
											[LECTURE]</center>
                                </td>

                                <td>
                                   <center><?php echo $sub1 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
                                   <center><?php echo $sub1 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
								
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
								  
                                   </td>
								   
								   <td>
								   
                                   </td>
								   <td>
                                   </td>
								   
								   
                            </tr>
							<tr>
                                <td class="align-middle">WED</td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   <center><?php echo $sub3 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
								<center><?php echo $sub3 ?><br>
											[LECTURE]</center>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">THU</td>
                                <td>
                                    <center><?php echo $sub3 ?><br>
											[TUTORIAL]</center>
                                </td>
                                <td>
                                    <center><?php echo $sub3 ?><br>
											[TUTORIAL]</center>
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">FRI</td>
                                <td>
                                    <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>
                                </td>
                                <td>
                                    <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
								   
                                   </td>
								   <td>
								   
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">SAT</td>
                                <td>
                                    
                                </td>
                                <td>
                                   </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">SUN</td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td class="bg-light-gray">

                                </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
								   
                            </tr>
							
                        </tbody>
                    </table>
                </div>
            </div>
			</center>
			<?php
}else if($semester == 2){
	?>
<center>
	
<div class="container">
                <div class="timetable-img text-center">
                    <img src="img/content/timetable.png" alt="">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr class="bg-light-gray">
                                <th class="text-uppercase">Time
                                </th>
                                <th class="text-uppercase">0800</th>
                               <th class="text-uppercase">0900</th>
							   <th class="text-uppercase">1000</th>
							    <th class="text-uppercase">1100</th>
								 <th class="text-uppercase">1200</th>
								  <th class="text-uppercase">1300</th>
								   <th class="text-uppercase">1400</th>
								    <th class="text-uppercase">1500</th>
									 <th class="text-uppercase">1600</th>
									  <th class="text-uppercase">1700</th>
									   
									   
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">MON</td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
								   <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>

								   </td>
								   <td>
								   <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>
                                   </td>
								   
								   <td>
								  
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
<tr>
                                <td class="align-middle">TUE</td>
                                <td>
                                    <center><?php echo $sub2 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
                                    <center><?php echo $sub2 ?><br>
											[LECTURE]</center>
                                </td>

                                <td>
                                   <center><?php echo $sub1 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
                                   <center><?php echo $sub1 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
								
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
								  
                                   </td>
								   
								   <td>
								   
                                   </td>
								   <td>
                                   </td>
								   
								   
                            </tr>
							<tr>
                                <td class="align-middle">WED</td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   <center><?php echo $sub3 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
								<center><?php echo $sub3 ?><br>
											[LECTURE]</center>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">THU</td>
                                <td>
                                    <center><?php echo $sub3 ?><br>
											[TUTORIAL]</center>
                                </td>
                                <td>
                                    <center><?php echo $sub3 ?><br>
											[TUTORIAL]</center>
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">FRI</td>
                                <td>
                                    <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>
                                </td>
                                <td>
                                    <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
								   
                                   </td>
								   <td>
								   
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">SAT</td>
                                <td>
                                    
                                </td>
                                <td>
                                   </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">SUN</td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td class="bg-light-gray">

                                </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
								   
                            </tr>
							
                        </tbody>
                    </table>
                </div>
            </div>
			</center>
			<?php
}else if($semester == 3){
	?>
<center>
	
<div class="container">
                <div class="timetable-img text-center">
                    <img src="img/content/timetable.png" alt="">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr class="bg-light-gray">
                                <th class="text-uppercase">Time
                                </th>
                                <th class="text-uppercase">0800</th>
                               <th class="text-uppercase">0900</th>
							   <th class="text-uppercase">1000</th>
							    <th class="text-uppercase">1100</th>
								 <th class="text-uppercase">1200</th>
								  <th class="text-uppercase">1300</th>
								   <th class="text-uppercase">1400</th>
								    <th class="text-uppercase">1500</th>
									 <th class="text-uppercase">1600</th>
									  <th class="text-uppercase">1700</th>
									   
									   
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">MON</td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
								   <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>

								   </td>
								   <td>
								   <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>
                                   </td>
								   
								   <td>
								  
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
<tr>
                                <td class="align-middle">TUE</td>
                                <td>
                                    <center><?php echo $sub2 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
                                    <center><?php echo $sub2 ?><br>
											[LECTURE]</center>
                                </td>

                                <td>
                                   <center><?php echo $sub1 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
                                   <center><?php echo $sub1 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
								
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
								  
                                   </td>
								   
								   <td>
								   
                                   </td>
								   <td>
                                   </td>
								   
								   
                            </tr>
							<tr>
                                <td class="align-middle">WED</td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   <center><?php echo $sub3 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
								<center><?php echo $sub3 ?><br>
											[LECTURE]</center>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">THU</td>
                                <td>
                                    <center><?php echo $sub3 ?><br>
											[TUTORIAL]</center>
                                </td>
                                <td>
                                    <center><?php echo $sub3 ?><br>
											[TUTORIAL]</center>
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">FRI</td>
                                <td>
                                    <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>
                                </td>
                                <td>
                                    <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
								   
                                   </td>
								   <td>
								   
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">SAT</td>
                                <td>
                                    
                                </td>
                                <td>
                                   </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">SUN</td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td class="bg-light-gray">

                                </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
								   
                            </tr>
							
                        </tbody>
                    </table>
                </div>
            </div>
			</center>
			<?php
}else if($semester == 4){
	?>
<center>
	
<div class="container">
                <div class="timetable-img text-center">
                    <img src="img/content/timetable.png" alt="">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr class="bg-light-gray">
                                <th class="text-uppercase">Time
                                </th>
                                <th class="text-uppercase">0800</th>
                               <th class="text-uppercase">0900</th>
							   <th class="text-uppercase">1000</th>
							    <th class="text-uppercase">1100</th>
								 <th class="text-uppercase">1200</th>
								  <th class="text-uppercase">1300</th>
								   <th class="text-uppercase">1400</th>
								    <th class="text-uppercase">1500</th>
									 <th class="text-uppercase">1600</th>
									  <th class="text-uppercase">1700</th>
									   
									   
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">MON</td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
								   <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>

								   </td>
								   <td>
								   <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>
                                   </td>
								   
								   <td>
								  
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
<tr>
                                <td class="align-middle">TUE</td>
                                <td>
                                    <center><?php echo $sub2 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
                                    <center><?php echo $sub2 ?><br>
											[LECTURE]</center>
                                </td>

                                <td>
                                   <center><?php echo $sub1 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
                                   <center><?php echo $sub1 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
								
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
								  
                                   </td>
								   
								   <td>
								   
                                   </td>
								   <td>
                                   </td>
								   
								   
                            </tr>
							<tr>
                                <td class="align-middle">WED</td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   <center><?php echo $sub3 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
								<center><?php echo $sub3 ?><br>
											[LECTURE]</center>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">THU</td>
                                <td>
                                    <center><?php echo $sub3 ?><br>
											[TUTORIAL]</center>
                                </td>
                                <td>
                                    <center><?php echo $sub3 ?><br>
											[TUTORIAL]</center>
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">FRI</td>
                                <td>
                                    <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>
                                </td>
                                <td>
                                    <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
								   
                                   </td>
								   <td>
								   
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">SAT</td>
                                <td>
                                    
                                </td>
                                <td>
                                   </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">SUN</td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td class="bg-light-gray">

                                </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
								   
                            </tr>
							
                        </tbody>
                    </table>
                </div>
            </div>
			</center>
			<?php
}else if($semester == 5){
	?>
<center>
	
<div class="container">
                <div class="timetable-img text-center">
                    <img src="img/content/timetable.png" alt="">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr class="bg-light-gray">
                                <th class="text-uppercase">Time
                                </th>
                                <th class="text-uppercase">0800</th>
                               <th class="text-uppercase">0900</th>
							   <th class="text-uppercase">1000</th>
							    <th class="text-uppercase">1100</th>
								 <th class="text-uppercase">1200</th>
								  <th class="text-uppercase">1300</th>
								   <th class="text-uppercase">1400</th>
								    <th class="text-uppercase">1500</th>
									 <th class="text-uppercase">1600</th>
									  <th class="text-uppercase">1700</th>
									   
									   
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">MON</td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
								   <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>

								   </td>
								   <td>
								   <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>
                                   </td>
								   
								   <td>
								  
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
<tr>
                                <td class="align-middle">TUE</td>
                                <td>
                                    <center><?php echo $sub2 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
                                    <center><?php echo $sub2 ?><br>
											[LECTURE]</center>
                                </td>

                                <td>
                                   <center><?php echo $sub1 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
                                   <center><?php echo $sub1 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
								
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
								  
                                   </td>
								   
								   <td>
								   
                                   </td>
								   <td>
                                   </td>
								   
								   
                            </tr>
							<tr>
                                <td class="align-middle">WED</td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   <center><?php echo $sub3 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
								<center><?php echo $sub3 ?><br>
											[LECTURE]</center>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">THU</td>
                                <td>
                                    <center><?php echo $sub3 ?><br>
											[TUTORIAL]</center>
                                </td>
                                <td>
                                    <center><?php echo $sub3 ?><br>
											[TUTORIAL]</center>
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">FRI</td>
                                <td>
                                    <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>
                                </td>
                                <td>
                                    <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
								   
                                   </td>
								   <td>
								   
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">SAT</td>
                                <td>
                                    
                                </td>
                                <td>
                                   </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">SUN</td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td class="bg-light-gray">

                                </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
								   
                            </tr>
							
                        </tbody>
                    </table>
                </div>
            </div>
			</center>
			<?php
}else if($semester == 6){
	?>
<center>
	
<div class="container">
                <div class="timetable-img text-center">
                    <img src="img/content/timetable.png" alt="">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr class="bg-light-gray">
                                <th class="text-uppercase">Time
                                </th>
                                <th class="text-uppercase">0800</th>
                               <th class="text-uppercase">0900</th>
							   <th class="text-uppercase">1000</th>
							    <th class="text-uppercase">1100</th>
								 <th class="text-uppercase">1200</th>
								  <th class="text-uppercase">1300</th>
								   <th class="text-uppercase">1400</th>
								    <th class="text-uppercase">1500</th>
									 <th class="text-uppercase">1600</th>
									  <th class="text-uppercase">1700</th>
									   
									   
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">MON</td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
								   <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>

								   </td>
								   <td>
								   <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>
                                   </td>
								   
								   <td>
								  
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
<tr>
                                <td class="align-middle">TUE</td>
                                <td>
                                    <center><?php echo $sub2 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
                                    <center><?php echo $sub2 ?><br>
											[LECTURE]</center>
                                </td>

                                <td>
                                   <center><?php echo $sub1 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
                                   <center><?php echo $sub1 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
								
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
								  
                                   </td>
								   
								   <td>
								   
                                   </td>
								   <td>
                                   </td>
								   
								   
                            </tr>
							<tr>
                                <td class="align-middle">WED</td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   <center><?php echo $sub3 ?><br>
											[LECTURE]</center>
                                </td>
                                <td>
								<center><?php echo $sub3 ?><br>
											[LECTURE]</center>
                                    </td>
                                <td>
								 <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>
                                   </td>
								   <td>
								   <center><?php echo $sub1 ?><br>
											[TUTORIAL]</center>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">THU</td>
                                <td>
                                    <center><?php echo $sub3 ?><br>
											[TUTORIAL]</center>
                                </td>
                                <td>
                                    <center><?php echo $sub3 ?><br>
											[TUTORIAL]</center>
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">FRI</td>
                                <td>
                                   
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
								   
                                   </td>
								   <td>
								   
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">SAT</td>
                                <td>
                                    
                                </td>
                                <td>
                                   </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
                            </tr>
							<tr>
                                <td class="align-middle">SUN</td>
                                <td>
                                    
                                </td>
                                <td>
                                    
                                </td>

                                <td>
                                   
                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    </td>
                                <td>
                                   </td>
								   <td class="bg-light-gray">

                                </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   <td>
                                   </td>
								   
								   
                            </tr>
							
                        </tbody>
                    </table>
                </div>
            </div>
			</center>
			<?php
}

		echo "</form>";
?>
			</body>