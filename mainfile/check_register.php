<?php
include('../condb.php');
$name = $_POST['name'];
$address =  $_POST['address'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$reset = md5(md5($pass));
if(empty($name)||empty($address)||empty($tel)||empty($email)||empty($user)||empty($pass)){
	echo "<script type='text/javascript'>alert('กรุณากรอกข้อมูลให้ครบ');</script>";
	echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php?pagemenu=login';}, 1);</script>";

}else{

	$checkuser = "SELECT * FROM member_user WHERE User = '".$user."' ";
	$resultuser = $con->query($checkuser);
	$rowuser = mysqli_fetch_assoc($resultuser);

	$checkemail = "SELECT * FROM member_user WHERE Email = '".$email."' ";
	$resultemail = $con->query($checkemail);
	$rowemail = mysqli_fetch_assoc($resultemail);

	if($rowuser['User']==$user){
		echo "<script type='text/javascript'>alert('มีชื่อผู้ใช้นี้แล้ว');</script>";
		echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php?pagemenu=login';}, 1);</script>";
	}

	else if($rowemail['Email']==$email){
		echo "<script type='text/javascript'>alert('มีผู้ใช้ Email นี้แล้ว ');</script>";
		echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php?pagemenu=login';}, 1);</script>";
	}

	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo "<script type='text/javascript'>alert('Email ไม่ถูกต้อง');</script>";
		echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php?pagemenu=login';}, 1);</script>";
	}

	else{

		$sql = "INSERT INTO member_user (Name,Address,Tel,Email,User,Pass,Status) VALUES ('".$name."','".$address."','".$tel."','".$email."','".$user."','".md5($pass)."','U')";
		if ($con->query($sql) === TRUE) {
			echo "<script type='text/javascript'>alert('ลงทะเบียนเสร็จเรียบร้อย');</script>";
			echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php?pagemenu=login';}, 1);</script>";
		}

		else {
			echo "Error: " . $sql . "<br>" . $con->error;
			//echo "<script type='text/javascript'>alert('กรุณาตรวจสอบข้อมูล');</script>";
			//echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php?pagemenu=login';}, 1);</script>";
		}
	}
}

?>