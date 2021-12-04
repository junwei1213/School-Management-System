<?php
session_start();
if(!isset($_COOKIE['UNAME'])){
	header('location:login.php');
	die();
}
$_SESSION['UNAME']=$_COOKIE['UNAME'];



?>
<html>
<head>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<style>
#preview{
   width: 50% !important;
  height: auto !important;
  margin: 0 auto;
  display: block;
}

</style>
</head>
<body>
	
			
				<video id="preview" width="50%"></video>
			
			
			<form action="takeatt.php" method="post" class="form-horizontal">
				
				<input type="text" name="text" id="text" readonyy="" placeholder="scan qrcode" class="form-control">
				<input type="submit" name="submit" id="submit">
			</form>
			
		
<script src="<a class="vglnk" href="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" rel="nofollow"><span>https</span><span>://</span><span>rawgit</span><span>.</span><span>com</span><span>/</span><span>schmich</span><span>/</span><span>instascan</span><span>-</span><span>builds</span><span>/</span><span>master</span><span>/</span><span>instascan</span><span>.</span><span>min</span><span>.</span><span>js</span></a>"></script>
<script type="text/javascript">
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
    scanner.addListener('scan',function(c){
        document.getElementById('text').value=c;
		document.forms[0].submit();
        //window.location.href=content;
    });
    Instascan.Camera.getCameras().then(function (cameras){
        if(cameras.length>0){
            scanner.start(cameras[0]);
            
        }else{
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e){
        console.error(e);
        alert(e);
    });
	
	
</script>

</body>
</html>