<?php
if(isset($_POST['add'])){
	include('../../condb.php');

	if(($_POST['Name']=="")||($_POST['Lname']=="")||($_POST['Username']=="")||($_POST['Password']=="")){
		echo "<script type='text/javascript'>alert('ข้อมูลไม่ครบ');</script>";
		echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php';}, 1);</script>";
	}
	else{
		

		
		$Staff = "INSERT INTO Staff (Fname,LName) VALUES ('".$_POST['Name']."','".$_POST['Lname']."')";

		if ($con->query($Staff) === TRUE) {
			$Staff = "SELECT * FROM staff where FName = '".$_POST['Name']."' and LName = '".$_POST['Lname']."'  ";
			$result = $con->query($Staff);
			$row = mysqli_fetch_assoc($result);

			$sql = "INSERT INTO member_login (Username,Password,Email,Status) VALUES ('".$_POST['Username']."','".$_POST['Password']."','".$row['StaffID']."','S')";
			if ($con->query($sql) === TRUE) {
				echo "<script type='text/javascript'>alert('เพิ่มพนักงานเรียบร้อย');</script>";
				echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php';}, 1);</script>";
			}else {
				echo "Error: " . $sql . "<br>" . $con->error;
			}

		} else {
			echo "Error: " . $Staff . "<br>" . $con->error;
		}
	}
}


else if(isset($_GET['IDdetail'])){
	include('../condb.php');
	$sql = "SELECT * FROM member_login where ID = '".$_GET['IDdetail']."' ";
	$result = $con->query($sql);
	$row = mysqli_fetch_assoc($result);

	$staff = "SELECT * FROM staff where StaffID = '".$row['Email']."' ";
	$resultstaff = $con->query($staff);
	$rowstaff = mysqli_fetch_assoc($resultstaff);
	?>

	<div class="container">
		<h3>แก้ไขชื่อหมวดหมู่</h3>
		<div class="table-responsive ">          
			<table class="table table-bordered">
				<thead>
					<tr style="background-color: orange;color: black;">
						<th>ID</th>
						<th>ชื่อ</th>
						<th>สกุล</th>
						<th>Username</th>
						<th>Password</th>
					</tr>
				</thead>
				<tbody >

					<tr>
						<td ><?php echo $row['ID'];?></td>
						<td ><?php echo $rowstaff['FName'];?></td>
						<td ><?php echo $rowstaff['LName'];?></td>
						<td><?php echo $row['Username'];?></td>
						<td ><?php echo $row['Password'];?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<br>
		<a type="button" class="btn btn-default" href="index.php" style="width: 100px;">กลับ</a>
	</div>

	<?php }


	else{
		include('../condb.php');
		if(isset($_GET['ID'])){
			$ID=$_GET['ID'];
		}

		

		

		$sql = "DELETE FROM staff WHERE StaffID = (SELECT Email FROM member_login where ID = '".$ID."') ";

		$sql2 = "DELETE FROM member_login WHERE ID = '".$ID."' ";
		

		if ($con->query($sql) === TRUE) {
			if ($con->query($sql2) === TRUE) {
			} else {
				echo "Error deleting record member :  " . $con->error;
			}
			echo "<script type='text/javascript'>alert('ลบเรียบร้อย');</script>";
			echo "<script type='text/javascript'>setTimeout(function(){window.location = 'index.php';}, 1);</script>";
		} else {
			echo "Error deleting record staff : " . $con->error;
		}

		$con->close();

	}


	?>