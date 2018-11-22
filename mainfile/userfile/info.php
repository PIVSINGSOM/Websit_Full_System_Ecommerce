<?php
$sql = "SELECT *FROM member_user WHERE UserID = '".$_SESSION['UserID']."' ";
$result = $con->query($sql);
$row = mysqli_fetch_assoc($result);
?>


<div class="container">
	
	<div class="row">

		<div class="col-sm-3 col-md-3">
			<?php include('menu.php');?>
		</div>
		<div class="col-sm-4 col-md-4">
			<br><br>
			<h3>แก้ไขข้อมูลส่วนตัว</h3>
			<div class="jumbotron" style="padding: 30px;">
				<form action="index.php?pagemenu=dashboard&menu=info-update" method="post">
					<div class="form-group ">
						<label >ชื่อ-นามสกุล:<span class="required" style="color: red"> *</span></label>
						<input type="text" class="form-control" name="name" value="<?php echo $row['Name'];?>" />
					</div>
					<div class="form-group">
						<label for="pwd">ที่อยู่:<span class="required" style="color: red"> *</span></label>
						<textarea class="form-control" name="address" ><?php echo $row['Address'];?></textarea>  
					</div>
					<div class="form-group">
						<label> เบอร์โทรศัพท์:<span class="required" style="color: red"> *</span></label>
						<input type="text" class="form-control" name="tel" value="<?php echo $row['Tel'];?>">
					</div>
					<div class="form-group">
						<label >อีเมลล์:<span class="required" style="color: red"> *</span></label>
						<input type="text" class="form-control" name="email" value="<?php echo $row['Email'];?>">
					</div>
					<button type="submit" name="info" class="btn btn-danger">บันทึก</button>
				</form>
			</div>
		</div>
		<div class="col-sm-4 col-md-4">
			<br><br>
			<h3>เปลี่ยนรหัสผ่าน</h3>
			<div class="jumbotron" style="padding: 30px;">
				<form action="index.php?pagemenu=dashboard&menu=info-update" method="post">
					<div class="form-group">
						<label >รหัสผ่านปัจจุบัน:<span class="required" style="color: red"> *</span></label>
						<input type="password" class="form-control" name="oldpass" >
					</div>
					<div class="form-group">
						<label >รหัสผ่านใหม่:<span class="required" style="color: red"> *</span></label>
						<input type="password" class="form-control" name="newpass1" >
					</div>
					<div class="form-group">
						<label >ยืนยันรหัสผ่าน:<span class="required" style="color: red"> *</span></label>
						<input type="password" class="form-control" name="newpass2" >
					</div>
					<button type="submit" name="pass" class="btn btn-danger">บันทึก</button>
				</form>
			</div>
		</div>
		
	</div>
</div>
