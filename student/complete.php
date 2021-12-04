<!DOCTYPE html>
<html>
<head>
  <title>Thanks for your order!</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <section>
    <?php
    include('../config.php');
    session_start();
    if(!isset($_COOKIE['UNAME'])){
      header('location:login.php');
      die();
    }
    $_SESSION['UNAME']=$_COOKIE['UNAME'];

    
    $payday = date("j F Y");
    $query = mysqli_query($conn,"UPDATE enroll SET payday='".$payday."' WHERE studentid='".$_SESSION['UNAME']."'");
    ?>
    <p>
      We appreciate your business! If you have any questions, please email
      <a href="mailto:orders@example.com">testwithphp88@gmail.com</a>.
	  
    </p>
  </section>
  <?php
  header("refresh:5;url=index.php");
  ?>
</body>
</html>