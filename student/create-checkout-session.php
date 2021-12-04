<?php
include('../config.php');
session_start();
if(!isset($_COOKIE['UNAME'])){
	header('location:login.php');
	die();
}
$_SESSION['UNAME']=$_COOKIE['UNAME'];


require 'vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51HOh0NH0lUyfa9zz58wGSew3qOpqf45zNbQhuVNuFCoy9z2x7W2Fh975DWwuvBfskyF3PkMCfRSmAyMscwEgT5kU00SxjnxMYK');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/ass/student';

$sqlif = mysqli_query($conn,"SELECT total, semester FROM enroll WHERE studentid='".$_SESSION['UNAME']."' ");
		while($data = mysqli_fetch_assoc($sqlif)){
			$total = $data['total'];
      $semester = $data['semester'];
		}



    if ($semester == 1){
      $price = "price_1JyuPUH0lUyfa9zzfKxqXSej";
	  }
      else if ($semester == 2){
        $price = "price_1Jyw3VH0lUyfa9zzoJvaHoWg";
      }else if ($semester == 3){
        $price = "price_1JzArsH0lUyfa9zz4XIryt2q";
	  }
	  else if ($semester == 4){
        $price = "price_1JzArsH0lUyfa9zzbyzpvkiF";
	  }else if ($semester == 5){
        $price = "price_1Jyw3VH0lUyfa9zzoJvaHoWg";
	  }else if ($semester == 6){
        $price = "price_1Jyw3VH0lUyfa9zzoJvaHoWg";
	  }else{
		  echo "Error";
	  }

      $checkout_session = \Stripe\Checkout\Session::create([
        'line_items' => [[
          # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
          'price' => $price,
          'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => $YOUR_DOMAIN . '/complete.php',
        'cancel_url' => $YOUR_DOMAIN . '/cancel.php',
      ]);
      
      header("HTTP/1.1 303 See Other");
      header("Location: " . $checkout_session->url);