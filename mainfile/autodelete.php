<?php 

$sql = "SELECT * FROM orders WHERE Paid = 'No' ";
$result = $con->query($sql);

while($row =  $result->fetch_assoc()){

	$datetime1 = new DateTime();
	$datetime2 = new DateTime($row['OrderDate']);
	$interval = $datetime1->diff($datetime2);
	//$elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
	$elapsed = $interval->format('%h');
	
	if($elapsed>=48){
		$update = "UPDATE product SET Status = 1 WHERE ProductID in (SELECT ProductID FROM orders_detail WHERE OrderID = '".$row['OrderID']."' ) ";
		$con->query($update);
		$del = "DELETE FROM orders WHERE OrderID = '".$row['OrderID']."' ";
		$con->query($del);

	}


}

?>