<?php

if(isset($_SESSION["UserID"])){


	if($_SESSION["UserID"]==""){
		echo "<script type='text/javascript'>alert('กรุณา login ก่อนค่ะ');</script>";
		echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php?pagemenu=login';}, 1);</script>";
	}
	else{ ?>
		<br>
		<br>
		<div class="container">
			<div class="row">

				<div class="col-sm-3 col-md-3">
					<?php include('menu.php');?>
				</div>
				<div class="col-sm-9 col-md-9">
					<?php include('dashboard-detail.php');?>
				</div>
			</div>
		</div>


	<?php }
}


?>
