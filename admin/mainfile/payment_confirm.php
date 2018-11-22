<?php 
if(isset($_GET['ID'])){
	$ID=$_GET['ID'];
	$OrderID=$_GET['OrderID'];
	echo $ID;
	$sql = "UPDATE payment SET Confirm='Yes' WHERE Pay_ID='".$ID."' ";

	if ($con->query($sql) === TRUE) {
		$update = "UPDATE orders SET Paid = 'Yes' WHERE OrderID = '".$OrderID."' ";
		$con->query($update);
		echo "<script type='text/javascript'>alert('"."ยืนยันการโอนเงิน  ของ OrderID $OrderID  เรียบร้อยแล้ว"."');</script>";
		echo "<script type='text/javascript'>setTimeout(function(){window.location = 'index.php';}, 1);</script>";
	} else {
		echo "Error updating record: " . $con->error;
	}

	$con->close();
}

?>