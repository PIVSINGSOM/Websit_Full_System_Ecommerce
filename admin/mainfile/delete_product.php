<?php
if(isset($_GET['ID'])){
	$ID=$_GET['ID'];
}
include('../../condb.php');

$sql = "DELETE FROM product WHERE ProductID = $ID";

if ($con->query($sql) === TRUE) {
	echo "<script type='text/javascript'>alert('ลบเรียบร้อย');</script>";
	echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php';}, 1);</script>";
} else {
	echo "Error deleting record: " . $conn->error;
}

$con->close();



?>