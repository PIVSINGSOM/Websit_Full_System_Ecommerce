<?php
if(isset($_POST['add'])){

	$detail =  $_POST['detail'];
	$star = $_POST['star'];
	$id = $_POST['OrderID'];

	if($detail ==""||$star==""||$id=="" ){ ?>

	<br><br><br><br>
	<div class="container">
		<h3 style="text-align:center;">" <b>เกิดข้อผิดพลาด</b> "</h3>
		<div class="progress">
			<div  class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%;height:30px;" >
			</div>
		</div>
		<h5 style="text-align:center;" >ระบบกำลังพาท่านไปยังหน้าก่อนหน้า</h5>
	</div>
	<br><br><br><br>

	<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=dashboard';}, 3000);</script>



	<?php } 
	else{ 


		$sql = "INSERT INTO review(UserID,OrderID,Detail,Star,Date) VALUES('".$_SESSION['UserID']."','".$id."','".$detail."','".$star."',NOW())";
		$con->query($sql);
		?>
		<br><br><br><br>
		<div class="container">
			<h3 style="text-align:center;">" <b>กำลังบันทึกรีวิว</b> "</h3>
			<div class="progress">
				<div  class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:100%;height:30px;" >
				</div>
			</div>
		</div>
		<br><br><br><br>
		<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=reivew';}, 2000);</script>
		<?php }

	}
	else{ ?>
	<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=dashboard';}, 1);</script>
	<?php }
	?>
