<?php
session_start();
//error_reporting(0);
//ini_set('display_errors', 0);
if(isset($_GET['pagemenu'])){
	$pagemenu=$_GET['pagemenu'];
}
if(isset($_GET['menu'])){
	$menu=$_GET['menu'];
}
//check ตะกร้าสินค้า
include('mainfile/session.php');
//connect database
include('condb.php');

//header
include('mainfile/header.php');
include('mainfile/navbar.php');
include('mainfile/carousel.php');
//body
if(empty($pagemenu)){
	include('mainfile/main.php');
	//delete order auto follow date time 
	include('mainfile/autodelete.php');
}
if(!empty($pagemenu)){

	if($pagemenu=='product'){
		include('mainfile/product.php');
	}
	else if($pagemenu=='login'){
		include('mainfile/login.php');
	}
	else if($pagemenu=='review'){
		include('mainfile/allreview.php');
	}
	else if($pagemenu=='payment'){
		include('mainfile/payment.php');
	}
	else if($pagemenu=='contact'){
		include('mainfile/contact.php');
	}
	else if($pagemenu=='reset-password'){
		include('mainfile/reset_pass.php');
	}
	else if($pagemenu=='dashboard'){

		if(empty($menu)){
			include('mainfile/userfile/dashboard.php');
		}
		if(!empty($menu)){
			if($menu=='info'){
				include('mainfile/userfile/info.php');
			}
			if($menu=='pay'){
				include('mainfile/userfile/payment.php');
			}
			if($menu=='review'){
				include('mainfile/userfile/review.php');
			}
			if($menu=='cart'){
				include('mainfile/userfile/cart.php');
			}
			if($menu=='addcart'){
				include('mainfile/userfile/addcart.php');
			}
			if($menu=='checkpayment'){
				include('mainfile/userfile/checkpayment.php');
			}
			if($menu=='order-detail'){
				include('mainfile/userfile/order-detail.php');
			}
			if($menu=='info-update'){
				include('mainfile/userfile/check_update.php');
			}
			if($menu=='order-cancel'){
				include('mainfile/userfile/order-cancel.php');
			}
			if($menu=='save-review'){
				include('mainfile/userfile/save-review.php');
			}
			if($menu=='checkout'){
				include('mainfile/userfile/checkout.php');
			}

		}

	}
	else if($pagemenu=='logout'){
		include('mainfile/check_logout.php');
	}
	else {
		include('mainfile/main.php');
	}

}

//footer
include('mainfile/footer.php');
?>
