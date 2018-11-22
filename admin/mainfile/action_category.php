<?php


if(isset($_POST['add'])){
	include('../../condb.php');
	$sql = "INSERT INTO category (ID_Category,Product_Category) VALUES (Null,'".$_POST['Product_Category']."')";

	if ($con->query($sql) === TRUE) {
		echo "<script type='text/javascript'>alert('เพิ่มหมวดหมู่เรียบร้อย');</script>";
		echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php';}, 1);</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

else if(isset($_POST['update'])){
	include('../../condb.php');
	$pd = $_POST['Product_Category'];
	$idc =$_POST['ID_Category'];

	$sql = "UPDATE category SET Product_Category= '$pd' WHERE ID_Category = $idc  ";

	if ($con->query($sql) === TRUE) {
		echo "<script type='text/javascript'>alert('อัพเดตหมวดหมู่เรียบร้อย');</script>";
		echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php';}, 1);</script>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
else if(isset($_GET['IDchange'])){
	include('../condb.php');
	$IDchange=$_GET['IDchange']; 
	$sql = "SELECT * FROM category where ID_Category = '".$IDchange."' ";
	$result = $con->query($sql);
	$row = mysqli_fetch_assoc($result);
	?>

	<div class="container">
		<h3>แก้ไขชื่อหมวดหมู่</h3>
		<form action="mainfile/action_category.php" method="POST">
			<div class="form-group">
				<input type="hidden" name="ID_Category" value="<?php echo $row['ID_Category'];?>">
			</div>
			<div class="form-group">
				<label >ชื่อหมวดหมู่:</label>
				<input type="text" class="form-control"   name="Product_Category" value="<?php echo $row['Product_Category'];?>">
			</div>
			<button type="submit" name="update" class="btn btn-warning" >อัพเดต</button>
			<a type="button" href="index.php" class="btn btn-danger" >ยกเลิก</a>
		</form>
	</div>

	<?php }


	else{
		include('../condb.php');
		if(isset($_GET['ID'])){
			$ID=$_GET['ID'];
		}


		$sql = "DELETE FROM category WHERE ID_Category = $ID ";
		$sql2 = "DELETE FROM product WHERE ID_Category = $ID ";

		if ($con->query($sql) === TRUE) {
			if ($con->query($sql2) === TRUE) {
			} else {
				echo "Error deleting record: " . $conn->error;
			}
			echo "<script type='text/javascript'>alert('ลบเรียบร้อย');</script>";
			echo "<script type='text/javascript'>setTimeout(function(){window.location = 'index.php';}, 1);</script>";
		} else {
			echo "Error deleting record: " . $conn->error;
		}

		$con->close();

	}

	?>