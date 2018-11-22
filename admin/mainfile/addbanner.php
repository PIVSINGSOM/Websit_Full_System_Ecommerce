<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "db2";
date_default_timezone_set("Asia/Bangkok");
// Create connection
$con = new mysqli($servername, $username, $password,$db);

// Check connection
if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
}
mysqli_set_charset($con,"utf8");


$image = $_FILES["pic"]["name"];

if(move_uploaded_file($_FILES["pic"]["tmp_name"],"../images/".$_FILES["pic"]["name"]))
	{
		$sql = "insert into banner (Image) values ('".$image."')";
		$con->query($sql);
	}
	header('location:../index.php');

?>