<?php 
if(isset($_GET['id'])){
	$id = $_GET['id'];
}
if(isset($_GET['total'])){
	$total = $_GET['total'];
}

$sql = "INSERT INTO payment (OrderID,UserID,Bank,Amount,Date_transfer,Confirm) VALUES('".$id."','".$_SESSION["UserID"]."','PAYPAL','".$total."',Now(),'No');";
if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$sql2 = "UPDATE orders SET Paid='Checking' WHERE OrderID='".$id."' ";
$con->query($sql2);


//header('Location: index.php?pagemenu=dashboard');
?>