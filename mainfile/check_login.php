	<?php
	session_start();
	include('../condb.php');
	if(isset($_POST['login'])){
		
		if($_POST['username']!=""&&$_POST['password']!=""){
			$sql = "SELECT * FROM member_user where User='".$_POST['username']."' and Pass = '".md5($_POST['password'])."' ";
			$result = $con->query($sql);
			$row = mysqli_fetch_assoc($result);
			if(empty($row)){
				echo "<script type='text/javascript'>alert('Username และ Password ไม่ถูกต้อง');</script>";
				echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php?pagemenu=login';}, 1);</script>";
			}
			else{
				if($row['Status']=="U"){

				$_SESSION["UserID"] = $row['UserID'];
				$_SESSION["User"] = $row['User'];
				session_write_close();
				echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php';}, 1);</script>";

				}
				else if($row['Status']=="A"){
				$_SESSION["UserID"] = $row['UserID'];
				$_SESSION["User"] = $row['User'];
				session_write_close();
				echo "<script type='text/javascript'>setTimeout(function(){window.location = '../admin/index.php';}, 1);</script>";
				}
			}
			
			
		}
	}

	?>