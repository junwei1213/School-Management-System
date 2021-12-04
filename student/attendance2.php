<?php
session_start();
if(!isset($_COOKIE['UNAME'])){
	header('location:login.php');
	die();
}
$_SESSION['UNAME']=$_COOKIE['UNAME'];
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>


<script src="html5-qrcode.min.js"></script>
<style>
  .result{
    background-color: green;
    color:#fff;
    padding:20px;
  }
  .row{
    display:flex;
  }
</style>
<body>
<center>
<div >
  <div >
    <div style="width:500px;" id="reader"></div>
  </div>
  <form  method="post" action="atttake.php" >
  <div class="col" style="padding:30px;">
   
    <div ><input type="hidden" name="text"  id="text"></div>
	</div>
  </form>
</div>
	</center>
	</body>
	
	
			
		
	
  
<script type="text/javascript">
function onScanSuccess(qrCodeMessage) {
    document.getElementById('text').value = qrCodeMessage;
	document.forms[0].submit();
}
function onScanError(errorMessage) {
  //handle scan error
}
var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess, onScanError);


</script>