<?php
include ('../config.php');

	
if(isset ($_POST['submit'])){
	$userid = $_POST['userid'];
	$username=$_POST['username'];
	$passwordhash=$_POST['password'];
	$phone=$_POST['phone'];
	$subject1 = $_POST['subject1'];
	$subject2 = $_POST['subject2'];
	$subject3 = $_POST['subject3'];
	
	$sub= "$subject1".","."$subject2".","."$subject3";
	
	$usernamecheck=mysqli_query($conn,"SELECT admin_name FROM admindata WHERE admin_name='$username'");
	$count=mysqli_num_rows($usernamecheck);
		if($count>=1){
			echo "<center><h2>".$username." is already taken</h2></center><br>";
		}
		else
		{
		$hashed_password=hash('sha1',$passwordhash);
		$query= "insert into admindata(adminid,admin_name,password,phone,subjectid) values('$userid','$username','$hashed_password','$phone','$sub')";
		$run= mysqli_query($conn,$query) or die(mysqli_error());
	
			if($run){
				echo "<center><h2>Userdata submittion successfully</h2></center>";
				header("location:index.php");

			}else{
				echo "<center><h2>Userdata submittion failed</h2></center>";
			}
		}
		$conn->close();
	}
?>


<html>
<head>

	<title>Register Form</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
 <img class="wave" src="../img/wave.png">
	<div class="container">
		<div class="img">
			<img src="../img/bg.svg">
		</div>
		<div class="login-content"> 
	<form action="register.php" method="post">
		<img src="../img/avatar.svg">
	<h2 class="title">Register here!</h2>
	<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		
						<input type="text" name="userid" placeholder="UserID" id="userid" class="input" required>           		   </div>
           		</div>
	<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		
						<input type="text" name="username" placeholder="Username" id="username" class="input" required>           		   </div>
           		</div>
	<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	
						<input type="password" name="password" placeholder="Password" class="input" required><br>		
            	   </div>
            	</div>
				<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-phone"></i>
           		   </div>
           		   <div class="div">
           		    	
				<input type="text" name="phone" placeholder="Phone" class="input" required><br><br>            	   </div>
            	</div>
		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-phone"></i>
           		   </div>
           		   <div class="div">
           		    	
						<?php
							$sqlsubject = "SELECT subjectid FROM subject ORDER BY semester";
							$result=mysqli_query($conn,$sqlsubject);
							echo '<select name="subject1">';
							echo '<option value=""></option>';
							$num_results = mysqli_num_rows($result);
								for ($i=0;$i<$num_results;$i++) {
								$row=mysqli_fetch_array($result);
								$subjectid = $row['subjectid'];
								$semester = $row['semester'];
								echo '<option value="'.$subjectid .'">'.$subjectid.'</option>';
								}
							echo "</select>";
						
						?>
				</div>
            	</div>
				<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-phone"></i>
           		   </div>
           		   <div class="div">
           		    	
						<?php
							$sqlsubject1 = "SELECT subjectid FROM subject ORDER BY semester";
							$result1=mysqli_query($conn,$sqlsubject1);
							echo '<select name="subject2">';
							echo '<option value=""></option>';
							$num_results1 = mysqli_num_rows($result1);
								for ($i=0;$i<$num_results1;$i++) {
								$row1=mysqli_fetch_array($result1);
								$subjectid1 = $row1['subjectid'];
								$semester1 = $row1['semester'];
								echo '<option value="'.$subjectid1 .'">'.$subjectid1.'</option>';
								}
							echo "</select>";
						
						?>
				</div>
            	</div>
			<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-phone"></i>
           		   </div>
           		   <div class="div">
           		    	
						<?php
							$sqlsubject2 = "SELECT subjectid FROM subject ORDER BY semester";
							$result2=mysqli_query($conn,$sqlsubject1);
							echo '<select name="subject3">';
							echo '<option value=""></option>';
							$num_results2 = mysqli_num_rows($result2);
								for ($i=0;$i<$num_results2;$i++) {
								$row2=mysqli_fetch_array($result2);
								$subjectid2 = $row2['subjectid'];
								$semester2 = $row2['semester'];
								echo '<option value="'.$subjectid2 .'">'.$subjectid2.'</option>';
								}
							echo "</select>";
						
						?>
				</div>
            	</div>	

		

		<button type="submit" name="submit" class="btn">Register</button><br>
		<a href="login.php">Already have a account?</a>
		
	</div>
	</form>
	 </div>
    </div>
	
</body>
</html>

