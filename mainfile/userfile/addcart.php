<?php
if(isset($_SESSION['ProductID'])){

	foreach ($_SESSION['ProductID'] as $key => $value) {
		$check = "SELECT Status FROM product WHERE ProductID = '".$value['item_id']."' ";
		$resultcheck = $con->query($check); 
		$rowcheck = mysqli_fetch_assoc($resultcheck);
		if($rowcheck['Status'] == 0){
			unset($_SESSION['ProductID'][$key]);
		}
	}
	$sql = "SELECT * FROM member_user WHERE UserID = '".$_SESSION['UserID']."' ";
	$result = $con->query($sql);
	$row = mysqli_fetch_assoc($result);
	$sqlinsert = "INSERT INTO orders (orderDate,UserID,Name,Address,Tel,Paid,Delivery) VALUES(NOW(),'".$row['UserID']."','".$row['Name']."','".$row['Address']."','".$row['Tel']."','No','No') ";

	if ($con->query($sqlinsert) === TRUE) {
		foreach ($_SESSION['ProductID'] as $key => $value) {
			$sqlorder = "SELECT * FROM orders order by OrderID desc ";
			$resultorder = $con->query($sqlorder);
			$roworder = mysqli_fetch_assoc($resultorder);
			$sqldetail = "INSERT INTO orders_detail (OrderID,ProductID) VALUES('".$roworder['OrderID']."','".$value['item_id']."') ";
			if ($con->query($sqldetail) === TRUE) {
			} else {
				echo "Error: " . $sqldetail . "<br>" . $con->error;
			}
			$update = "UPDATE product SET Status = 0 WHERE ProductID = '".$value['item_id']."' ";
			$con->query($update);
		}
	} else {
		echo "Error: " . $sql . "<br>" . $con->error;

	}
	unset($_SESSION['ProductID']);
	?>

	<br><br><br><br>
	<div class="container">
		<div class="progress">
			<div id="myBar" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:1%;height:30px;" >
			</div>
		</div>
		<h3 style="text-align:center;">" <b id="demo">กรุณารอสักครู่</b> "</h3>
		<h5 style="text-align:center;" id="status">ระบบกำลังทำการยืนยันการสั่งซื้อ</h5>
	</div>
	<br><br><br><br>

	<?php }else{ ?>


	<br><br><br><br>
	<div class="container">
		<div class="progress">
			<div id="myBar" class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:1%;height:30px;" >
			</div>
		</div>
		<h3 style="text-align:center;">" <b>ไม่สามารถทำการยืนยันการสั่งซื้อได้เนื่องจากท่านยังไม่ได้เลือกสินค้า</b> "</h3>
		<h5 style="text-align:center;" >ระบบกำลังพาท่านไปยังหน้าแรก</h5>
	</div>
	<br><br><br><br><br>

	<?php echo "<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=dashboard&menu=cart';}, 3000);</script>"; } ?>


	<script>
		function move() {
			var elem = document.getElementById("myBar");
			var width = 1;
			var id = setInterval(frame, 20);
			var delayInMilliseconds = 1000;
			function frame() {
				if (width >= 100) {
					clearInterval(id);
					setTimeout(function() {
						myFunction()
					}, delayInMilliseconds);
					setTimeout(function() {
						window.location = 'index.php?pagemenu=dashboard&menu=pay';
					}, 2000);

				} else {
					width++;
					elem.style.width = width + '%';

				}
			}
		}
		function myFunction() {
			document.getElementById("demo").innerHTML = "เสร็จเรียบร้อย";
			document.getElementById("status").innerHTML = "ระบบกำลังพาคุณไปหน้าชำระเงิน";
		}
		move();
	</script>
