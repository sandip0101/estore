<?php

$DBhost = "localhost";
$DBuser = "root";
$DBpassword ="";
$DBname="otp_varification_db";

$connection = mysqli_connect($DBhost, $DBuser, $DBpassword, $DBname); 

if(!$connection){
	die("Connection failed: " . mysqli_connect_error());
}

?> 