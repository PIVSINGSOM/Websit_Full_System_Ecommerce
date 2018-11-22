<?php 
if(isset($_GET['cart'])){
	$cart=$_GET['cart'];

	if($cart=="add"){
		$id = $_GET['id'];

		if(isset($_SESSION['ProductID'])){
			$item_id = array_column($_SESSION['ProductID'], "item_id");

			if(!in_array($id, $item_id))
			{
				$count = count($_SESSION['ProductID']);
				$item_array = array(
					'item_id' => $id
				);
				$_SESSION['ProductID'][$count] = $item_array;
			}

			else{
				echo "<script type='text/javascript'>alert('สินค้าถูกเพิ่มแล้ว');</script>";
				echo "<script type='text/javascript'>setTimeout(function(){window.location = 'index.php';}, 1);</script>";
			}
		}

		else
		{
			$item_array = array(
				'item_id' => $id
			);
			$_SESSION['ProductID'][0] = $item_array;
		}
	}

	if($cart=="delete"){
		$id = $_GET['id'];

		foreach ($_SESSION['ProductID'] as $key => $value) {
			if($value['item_id']==$id){
				unset($_SESSION['ProductID'][$key]);
				echo "<script type='text/javascript'>alert('ลบสินค้าออกจากตะกร้าเรียบร้อยแล้ว');</script>";
				echo "<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=dashboard&menu=cart';}, 1);</script>";
			}
		}
	}

}

?>