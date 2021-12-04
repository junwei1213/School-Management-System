<?php
include ('../config.php');
session_start();
if(isset($_SESSION['UNAME']) || isset($_COOKIE['UNAME'])){
	header('location:index.php');
	die();
}



if(isset ($_POST['submit'])){
	
	$studentida =$_POST['studentid'];
	$passwordhash=$_POST['password'];	
	
	$studentida=stripcslashes($studentida);
	$passwordhash=stripcslashes($password);	
	
	$studentida = mysqli_real_escape_string($conn, $studentida);  
	$passwordhash = mysqli_real_escape_string($conn, $passwordhash);  
	
	
	if ($stmt = $conn->prepare('SELECT studentid, password FROM student WHERE studentid = ?')) {
		
		$stmt->bind_param('s', $_POST['studentid']);
		$stmt->execute();
		$stmt->store_result();
		$passwordhash = $_POST['password'];
		
		$hashed_password=hash('sha1',$passwordhash);
	}

	if ($stmt->num_rows > 0) {
		$stmt->bind_result($studentida, $passwordhash);
		$stmt->fetch();
		
		if ($hashed_password===$passwordhash) {
			// Verification success! User has loggedin!
			echo "<center><h2>Login successful</h2></center>";
			$_SESSION['UNAME']=$_POST['studentid'];
			setcookie('UNAME',$_POST['studentid'],time()+60*60*24*30);
			
			header('location:index.php');
			//header('Location: index.php');
		} else {
			echo "<center><h2> Login failed. Invalid studentid or password.</h2></center>"; 
	  }
	
	}
	$stmt->close();
$sql = "SELECT * FROM student";
 $query = mysqli_query($conn, $sql);
 $res = mysqli_fetch_assoc($query);
 if($res)
 {
 if(!empty($_POST["remember"]))
 {
 setcookie ("user", $_POST["studentid"], time() + (60*60*24));
 setcookie ("pass", $_POST["password"], time() + (60*60*24));
 }
else
 {
 if(isset($_COOKIE["user"]))
 {
 setcookie ("user", "");
 }
 if(isset($_COOKIE["pass"]))
 {
 setcookie ("pass", "");
 }
 }
 header("Location:index.php");
 }
 else
 {
 $msg = "Invalid Username or Password";
 }
 
 }

	?>





<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>



<body>

	     
    

     <img class="wave" src="../img/wave1.png">
	<div class="container">
		<div class="img">
			<img src="../img/bg.svg">
		</div>
		<div class="login-content"> 
	<form action="login.php" method="post">
	<img src="../img/avatar.svg">
	<h2 class="title">Welcome</h2>
	<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		
           		   		<input type="text"   id="studentid" name="studentid" placeholder="Student ID" class="input" required value="<?php if(isset($_COOKIE["user"])) {echo $_COOKIE["user"];} ?>"><br>
           		   </div>
           		</div>
	<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	
           		    	<input type="password" class="input"  name="password" placeholder="Password" required value="<?php if(isset($_COOKIE["pass"])) {echo $_COOKIE["pass"];}?>"><br><br>
		
            	   </div>
            	</div>
				
	<input type="checkbox" name="remember" color="#999" <?php if(isset($_COOKIE["user"])) { ?> checked <?php }?>/>
		<label >Remember me</label><br/><br/>
		
		<button type="submit"  name="submit"  class="btn">Login</button><br>
	
		<a>Forgot Password?</a>
		<a href="../admin/index.php">Admin</a>
		
	
	</form>
 </div>
    </div>
	
</body>
</html>
