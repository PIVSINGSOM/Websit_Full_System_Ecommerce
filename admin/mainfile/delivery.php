<?php 
if(isset($_POST['add'])){
	include('../../condb.php');

	if($_POST['code']==""){
		echo "<script type='text/javascript'>alert('กรุณาใส่รหัสไปรษณีย์!!');</script>";
		echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php?pagemenu=delivery&ID=".$_POST['OrderID']."';}, 1);</script>";
	}
	else{
		

		
		$sql = "INSERT INTO zipcode (OrderID,Code) VALUES ('".$_POST['OrderID']."','".$_POST['code']."')";

		if ($con->query($sql) === TRUE) {
			$update = "UPDATE orders SET Delivery = 'Yes' Where OrderID = '".$_POST['OrderID']."' ";

			if ($con->query($update) === TRUE) {
				echo "<script type='text/javascript'>alert('อัพเดตสถานะเรียบร้อยแล้วค่ะ');</script>";
				echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php';}, 1);</script>";
			}else {
				echo "Error: " . $update . "<br>" . $con->error;
			}

		} else {
			echo "Error: " . $sql . "<br>" . $con->error;
		}
	}
}

if(isset($_GET['ID'])){ ?>

<div class="container" style="padding-top: 30px;">
	<h1>รายการสินค้า ID : <?php echo $_GET['ID'];?></h1>
	<form action="mainfile/delivery.php" method="post">    
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" class="form-control" name="code" placeholder="รหัสไปรษณีย์" >
					<input type="hidden" class="form-control" name="OrderID" value="<?php echo $_GET['ID'];?>" >
				</div>
			</div>
			<div class="col-md-6">
				<button type="submit" name="add" class="btn btn-success" >ยืนยันการส่งสินค้า</button>
			</div>
		</form>
	</div>

	<?php } 

	if(isset($_GET['OrderID'])){ 

		$sql = "SELECT * FROM zipcode Where OrderID = '".$_GET['OrderID']."' ";
		$result = $con->query($sql);
		$row = mysqli_fetch_assoc($result);	?>


		<div class="container" style="padding-top: 50px;">
			<div class="table-responsive ">          
				<table class="table table-bordered">
					<thead>
						<tr style="background-color: orange;color: black;">
							<th>OrderID</th>
							<th>รหัสไปรษณีย์</th>
							<th>แก้ไข</th>

						</tr>
					</thead>
					<tbody >

						<tr>
							<td ><?php echo $_GET['OrderID'];?></td>
							<td ><?php echo $row['Code'];?></td>
							<td ><a type="button" class="btn btn-info" href="index.php?pagemenu=delivery&updateOrderID=<?php echo $_GET['OrderID']; ?>" >แก้ไขรหัสไปรษณีย์</a></td>

						</tr>
					</tbody>
				</table>
			</div>
			<br>
			<a type="button" class="btn btn-default" href="index.php" style="width: 100px;">กลับ</a>
		</div>


		<?php } 

		if(isset($_GET['updateOrderID'])){ ?>
		<div class="container" style="padding-top: 50px;">
			<form action="mainfile/delivery.php" method="post">    
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" class="form-control" name="code" placeholder="รหัสไปรษณีย์" >
							<input type="hidden" class="form-control" name="OrderID" value="<?php echo $_GET['updateOrderID'];?>" >
						</div>
					</div>
					<div class="col-md-6">
						<button type="submit" name="update" class="btn btn-success" >อัพเดตรหัสไปรษณีย์</button>
					</div>
				</form>
			</div>

			<?php } 

			if(isset($_POST['update'])){ 
				include('../../condb.php');
				if($_POST['code']==""){
					echo "<script type='text/javascript'>alert('กรุณาใส่รหัสไปรษณีย์!!');</script>";
					echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php?pagemenu=delivery&updateOrderID=".$_POST['OrderID']."';}, 1);</script>";
				}
				else{



					$sql = "UPDATE zipcode SET Code = '".$_POST['code']."' where OrderID = '".$_POST['OrderID']."' ";

					if ($con->query($sql) === TRUE) {
						echo "<script type='text/javascript'>alert('อัพเดตเรียบร้อยแล้วค่ะ!!');</script>";
						echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php?pagemenu=delivery&OrderID=".$_POST['OrderID']."';}, 1);</script>";

					} else {
						echo "Error: " . $sql . "<br>" . $con->error;
					}
				}


			}


			?>

