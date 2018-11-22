<?php 
if(isset($_POST['confirm'])){

	$email = $_POST['email'];

	if(empty($email)){
		echo "<script type='text/javascript'>alert('กรุณากรอกอีเมล์');</script>";
		echo "<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=reset-password';}, 1);</script>";
	}
	else if(!empty($email)){
		$sql = " SELECT * FROM member_user WHERE Email = '".$email."' ";
		$result = $con->query($sql);
		$row  = mysqli_fetch_assoc($result);
		if(empty($row['Email'])){
			echo "<script type='text/javascript'>alert('ไม่มี อีเมลล์ ดังกล่าว');</script>";
			echo "<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=reset-password';}, 1);</script>";
		}
		else{ ?>

		<br><br><br>
		<div class="container" >
			<div class="jumbotron" >
				<h2 class="title" style="text-align: center;">กรุณากรอกรหัสผ่านใหม่</h2>
				<form  action="index.php?pagemenu=reset-password" method="post">
					<div class="form-group" >
						<label>รหัสผ่านใหม่<span class="required" style="color: red"> *</span></label>
						<input type="password" class="form-control"  name="pwd" style="text-align:center;">
					</div>
					<div class="form-group" >
						<label>ยืนยันรหัสผ่านใหม่<span class="required" style="color: red"> *</span></label>
						<input type="password" class="form-control"  name="pwd2" style="text-align:center;">
					</div>
					<input type="hidden" name="email" value="<?php echo $email; ?>">
					<button style="width: 100%" type="submit" name="confirmpass" class="btn btn-danger">ยืนยัน</button>
				</form>
			</div>
		</div>

		<?php 	}
	}

}
else if(isset($_POST['confirmpass'])){
	$pass = $_POST['pwd'];
	$pass2 = $_POST['pwd2'];
	$email = $_POST['email'];
	if(empty($pass)||empty($pass2)){
		echo "<script type='text/javascript'>alert(' ตรวจสอบข้อมูลอีกครั้ง');</script>";
		echo "<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=reset-password';}, 1);</script>";
	}else{
		if($pass!=$pass2){
			echo "<script type='text/javascript'>alert(' Password ไม่ตรงกัน');</script>";
			echo "<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=reset-password';}, 1);</script>";
		}
		else if($pass==$pass2){
			$sql = "UPDATE member_user SET Pass = '".md5($pass)."' WHERE Email = '".$email."' ";
			$con->query($sql); ?>
			<br><br><br>
			<div class="container" style="text-align: center;">
				<img src="images/complete.png" style="width: 150px;height: 150px;">
				<h2 class="title" style="text-align: center;">เสร็จเรียบร้อย</h2>
			</div>
			<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=login';}, 3000);</script>

			<?php	}
		}

	}else {

		?>
		<br><br><br>
		<div class="container" >
			<div class="jumbotron" >
				<h2 class="title" style="text-align: center;">กรุณากรอกอีเมล์ของท่าน</h2>
				<form  action="index.php?pagemenu=reset-password" method="post">
					<div class="form-group" >
						<input type="text" class="form-control"  name="email" style="text-align:center;">
					</div>
					<button style="width: 100%" type="submit" name="confirm" class="btn btn-danger">ยืนยัน</button>
				</form>
			</div>
		</div>
		<?php } ?>