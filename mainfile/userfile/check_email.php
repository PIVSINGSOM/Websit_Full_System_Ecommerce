<?php
include('../condb.php');
$email = isset($_POST['email']) ? trim($_POST['email']) : "";
$Query = mysql_query("SELECT * FROM member_user WHERE Email='{$email}'");
$Rows = mysql_num_rows($Query);
if($Rows == 1){
	echo "1";
}
?>