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

$sql = "delete from banner where ID = '".$_POST['id']."'";
 $con->query($sql);

header('location: ../index.php');
?>