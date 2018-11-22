<?php
if(isset($_POST['info'])){

	$name = $_POST['name'];
	$address = $_POST['address'];
	$tel = $_POST['tel'];
	$email = $_POST['email'];

	if($name==""||$address==""||$tel==""||$email==""){ ?>

	<br><br><br><br>
	<div class="container">
		<h3 style="text-align:center;">" <b>การอัพเดตล้มเหลว กรุณาตรวจเช็คข้อมูลอีกครั้ง</b> "</h3>
		<div class="progress">
			<div  class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%;height:30px;" >
			</div>
		</div>
		<h5 style="text-align:center;" >ระบบกำลังพาท่านไปยังหน้าก่อนหน้า</h5>
	</div>
	<br><br><br><br>
	<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=dashboard&menu=info';}, 3000);</script>

	<?php } else{
		$sql = " UPDATE  member_user  SET Name='".$name."',Address='".$address."',Tel='".$tel."',Email='".$email."' WHERE UserID = '".$_SESSION['UserID']."' ";
		$con->query($sql); ?>

		<br><br><br><br>
		<div class="container">
			<h3 style="text-align:center;">" <b>อัพเดตข้อมูลเรียบร้อยแล้วค่ะ</b> "</h3>
			<div class="progress">
				<div  class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%;height:30px;" >
				</div>
			</div>
			<h5 style="text-align:center;" >ระบบกำลังพาท่านไปยังหน้าก่อนหน้า</h5>
		</div>
		<br><br><br><br>
		<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=dashboard';}, 3000);</script>
		<?php } 

	}

	else if(isset($_POST['pass'])){

		$oldpass = $_POST['oldpass'];
		$newpass1 = $_POST['newpass1'];
		$newpass2 = $_POST['newpass2'];
		if($oldpass==""||$newpass1==""||$newpass2==""){?>

		<br><br><br><br>
		<div class="container">
			<h3 style="text-align:center;">" <b>การอัพเดตล้มเหลว กรุณาตรวจเช็คข้อมูลอีกครั้ง</b> "</h3>
			<div class="progress">
				<div  class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%;height:30px;" >
				</div>
			</div>
			<h5 style="text-align:center;" >ระบบกำลังพาท่านไปยังหน้าก่อนหน้า</h5>
		</div>
		<br><br><br><br>
		<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=dashboard&menu=info';}, 3000);</script>

		<?php }else{
			$sql = "SELECT * FROM member_user WHERE UserID = '".$_SESSION['UserID']."' ";
			$result = $con->query($sql);
			$row = mysqli_fetch_assoc($result);
			if($newpass1!=$newpass2){ ?>
			<br><br><br><br>
			<div class="container">
				<h3 style="text-align:center;">" <b>รหัสผ่านใหม่ ไม่ตรงกัน</b> "</h3>
				<div class="progress">
					<div  class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%;height:30px;" >
					</div>
				</div>
				<h5 style="text-align:center;" >ระบบกำลังพาท่านไปยังหน้าก่อนหน้า</h5>
			</div>
			<br><br><br><br>
			<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=dashboard&menu=info';}, 3000);</script>

			<?php }else{
				if($row['Pass']!=$oldpass){ ?>

				<br><br><br><br>
				<div class="container">
					<h3 style="text-align:center;">" <b>รหัสผ่านปัจจุบันผิด</b> "</h3>
					<div class="progress">
						<div  class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%;height:30px;" >
						</div>
					</div>
					<h5 style="text-align:center;" >ระบบกำลังพาท่านไปยังหน้าก่อนหน้า</h5>
				</div>
				<br><br><br><br>
				<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=dashboard&menu=info';}, 3000);</script>

				<?php }else{ 
					$sql = "UPDATE member_user SET Pass = '".$newpass1."' WHERE UserID = '".$_SESSION['UserID']."' ";
					$con->query($sql);
					?>
					<br><br><br><br>
					<div class="container">
						<h3 style="text-align:center;">" <b>อัพเดตรหัสผ่านเสร็จเรียบร้อย</b> "</h3>
						<div class="progress">
							<div  class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%;height:30px;" >
							</div>
						</div>
						<h5 style="text-align:center;" >ระบบกำลังพาท่านไปยังหน้าก่อนหน้า</h5>
					</div>
					<br><br><br><br>
					<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=dashboard&menu=info';}, 3000);</script>
					<?php


				}
			}

		}
	}else{ ?>
<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=dashboard&menu=info';}, 1);</script>
	<?php }

	?>