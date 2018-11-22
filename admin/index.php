<?php include('../condb.php');?>
<?php
if(isset($_GET['pagemenu'])){
  $pagemenu=$_GET['pagemenu'];
}
include('../condb.php');
include('mainfile/header.php');



if(empty($pagemenu)){
  include('mainfile/main.php');
}
if(!empty($pagemenu)){
  if($pagemenu=='editproduct'){
    include('mainfile/editproduct.php');
  }
  if($pagemenu=='actioncate'){
    include('mainfile/action_category.php');
  }
  if($pagemenu=='checkorder'){
    include('mainfile/orderdetail.php');
  }
  if($pagemenu=='payment'){
    include('mainfile/payment_confirm.php');
  }

  if($pagemenu=='delivery'){
    include('mainfile/delivery.php');
  }

}

include('mainfile/footer.php');
?>
