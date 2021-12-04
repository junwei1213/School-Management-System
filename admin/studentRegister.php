<?php
include('../config.php');
	include('admininterface.php');
if(isset ($_POST['submit'])){
	$id = $_POST['id'];
	$name=$_POST['name'];
	$ic=$_POST['ic'];
	$mos=$_POST['mos'];
	$session=$_POST['session'];
	$program=$_POST['program'];
	$level=$_POST['level'];
	$school = $_POST['school'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$passwordhash=$_POST['password'];
	$phone=$_POST['phone'];
	$password = $_POST['password'];
	$hashed_password=hash('sha1',$password);
	$useridcheck=mysqli_query($conn,"SELECT studentid FROM student WHERE studentid='$id'");
	$count=mysqli_num_rows($useridcheck);
		if($count>=1){
			echo "<center><h2>".$userid." is already taken</h2></center><br>";
		}
		else
		{
		$hashed_password=hash('sha1',$passwordhash);
		$query= "insert into student(studentid,studentname,studentic,modeofstudy,session,program,school,level,address,phone,email,password) 
		values('$id','$name','$ic','$mos','$session','$program','$school','$level','$address','$phone','$email','$hashed_password')";
		$run= mysqli_query($conn,$query) or die(mysqli_error());
	
			if($run){
				echo "<center><h2>Userdata submittion successfully</h2></center>";
				header('location:index.php');

			}else{
				echo "<center><h2>Userdata submittion failed</h2></center>";
			}
		}
		
	}
?>


<html>
<head>

	<title>Register Form</title>
	<link rel="stylesheet" type="text/css" href="../css/interface.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
 <br><br><br><br>
	<center>

			<h3><strong>Student Register</strong></h3>
			<div class="input-field">
				
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
					<table style="border: 0px;">
					<div class="form-group">
					
					<tr style="border: 0px;">
						<th style="border: 0px;"><label>Student ID</label></th>
						<td style="border: 0px;"><input type="text" class="form-control" name="id" style="width:20em;" placeholder="Student ID"  required  /></td>
					</tr>
					</div>
					<div class="form-group">
						<tr>
						<th style="border: 0px;"><label>Student Name</label></th>
						<td style="border: 0px;"><input type="text" class="form-control" name="name" style="width:20em;" placeholder="Student Name"  required  /></td>
					</tr>
					</div>
					<div class="form-group">
						<tr>
						<th style="border: 0px;"><label>Student IC</label></th>
						<td style="border: 0px;"><input type="text" class="form-control" name="ic" style="width:20em;" placeholder="Student IC"  required  /></td>
					</tr>
					</div>
					<div class="form-group">
						<tr><th style="border: 0px;"><label>Mode of Study	</label></th>
						<td style="border: 0px;"><select name="mos" required>
												<option value="full time">Full Time</option>
												<option value="part time">Part Time</option>
												</select></td>
					</tr>
					</div>
					<div class="form-group">
						<tr><th style="border: 0px;"><label>Session	</label></th>
						<td style="border: 0px;"><select name="session" required>
												<option value="JUN2021">JUN2021</option>
												<option value="MAY2021">MAY2021</option>
												<option value="AUG2021">AUG2021</option>
												</select></td>
					</tr>
					</div>
					<div class="form-group">
						<tr><th style="border: 0px;"><label>Program	</label></th>
						<td style="border: 0px;"><select name="program" required>
												<option value="Information Technology">Information Technology</option>
												
												</select></td>
					</tr>
					</div>
					<div class="form-group">
						<tr><th style="border: 0px;"><label>School</label></th>
						<td style="border: 0px;"><select name="school" required>
												<option value="INTI NILAI">INTI NILAI</option>
												<option value="INTI SUBANG">INTI SUBANG</option>
												</select></td>
					</tr>
					</div>
					<div class="form-group">
						<tr><th style="border: 0px;"><label>Level	</label></th>
						<td style="border: 0px;"><select name="level" required>
												<option value="DIPLOMA">DIPLOMA</option>
												<option value="DEGREE">DEGREE</option>
												</select></td>
					</tr>
					</div>
					
	<div class="form-group">
					<tr>
						<th style="border: 0px;">	<label>Address</label><br></th>
					<td style="border: 0px;">	<input type="text" class="form-control" name="address" style="width:20em;" placeholder="Address"  required  />
					</td></div>
		<div class="form-group">
					<tr>
						<th style="border: 0px;">	<label>Phone</label><br></th>
					<td style="border: 0px;">	<input type="text" class="form-control" name="phone" style="width:20em;" placeholder="Phone"  required  />
					</td></div>			
				
		<div class="form-group">
					<tr>
						<th style="border: 0px;">	<label>Email</label><br></th>
					<td style="border: 0px;">	<input type="text" class="form-control" name="email" style="width:20em;" placeholder="Email"  required  />
					</td></div>		
		<div class="form-group">
					<tr>
						<th style="border: 0px;">	<label>Password</label><br></th>
					<td style="border: 0px;">	<input type="password" name="password" placeholder="Password" class="input" required><br>	
					</td></div>	
		
		<div class="form-group">
		
		<tr style="border: 0px;">
		
				<td ColSpan=2 style="border: 0px;">	<center>	
						<input type="submit" name="submit" class="btn btn-danger submitBtn" value="Add" style="width:20em; margin:0;" />
					<center>
					</td>
					</tr>
					</div>
		</div>
		</table>
		</form>
	<center>
	</body>
</html>

