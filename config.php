<?php

$conn= new mysqli("localhost","root","","project_ass");
if($conn->connect_error){
	die("Connection faild"/$conn->connect_error);
}
?>