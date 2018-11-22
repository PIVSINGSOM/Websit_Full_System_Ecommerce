<?php
$dashboard="";
$info ="";
$pay ="";
$review ="";
$cart = "";

if(empty($menu)){
	$dashboard = 'class="active"';
}
if(!empty($menu)){
	if($menu=="info"){
		$info  = 'class="active"';
	}
	if($menu=="pay"){
		$pay  = 'class="active"';
	}
	if($menu=="review"){
		$review  = 'class="active"';
	}
	if($menu=="cart"){
		$cart  = 'class="active"';
	}
}

?>

<h4 style="border-bottom: 0.5px solid #bfbfbf; margin-top:30px;width: 250px;">เมนูสมาชิก <br><br></h4>
<ul class="nav nav-pills nav-stacked dashboard">
	<li <?php echo $dashboard;?> ><a href="index.php?pagemenu=dashboard">
		<i class="fa fa-dashboard item-icon"></i> &nbsp;หน้าหลัก</a>
	</li>

	<li <?php echo $info;?> ><a href="index.php?pagemenu=dashboard&menu=info">
		<i class="fa fa-user item-icon"></i> &nbsp;ข้อมูลส่วนตัว</a>
	</li>

	<li <?php echo $cart ;?> ><a href="index.php?pagemenu=dashboard&menu=cart">
		<i class="fa fa-cart-plus item-icon"></i> &nbsp;ตะกร้าสินค้า</a>
	</li>

	<li <?php echo $pay ;?> ><a href="index.php?pagemenu=dashboard&menu=pay">
		<i class="fa fa-credit-card item-icon"></i> &nbsp;แจ้งชำระเงิน</a>
	</li>

	<li <?php echo $review;?> ><a  href="index.php?pagemenu=dashboard&menu=review">
		<i class="fa fa-pencil-square-o item-icon"></i> &nbsp;รีวิว</a>
	</li>

	<li ><a  href="index.php?pagemenu=logout">
		<i class="fa fa-power-off item-icon"></i> &nbsp;ออกจากระบบ</a>
	</li>

</ul>