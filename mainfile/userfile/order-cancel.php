<?php
if(isset($_POST['del'])){
	$id =  $_POST['OrderID'];

	$update = "UPDATE product SET Status = 1 WHERE ProductID in (SELECT ProductID FROM orders_detail WHERE OrderID = '".$id."' ) ";
	$con->query($update);

	$sql = "DELETE FROM orders WHERE OrderID = '".$id."' ";
	$con->query($sql);
	
	$sql2 = "DELETE FROM orders_detail WHERE OrderID = '".$id."' ";
	$con->query($sql2);

	?>

	<br><br><br><br>
	<div class="container">
		<h3 style="text-align:center;">" <b id="demo">ลบรายการเรียบร้อย</b> "</h3>
		<div class="progress">
			<div id="myBar" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%;height:30px;" >
			</div>
		</div>
	</div>
	<br><br><br><br><br>
	<?php echo "<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=dashboard';}, 2000);</script>"; 

}else{ ?>
<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=dashboard';}, 1);</script>
<?php } ?>