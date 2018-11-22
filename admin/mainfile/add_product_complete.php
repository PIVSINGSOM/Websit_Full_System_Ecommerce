<?php
include('../../condb.php');
if(isset($_POST['add'])){
  $Name    = $_POST['Product_Name'];
  $Sex     = $_POST['Product_Sex'];
  $Size    = $_POST['Product_Size'];
  $Age   = $_POST['Product_Age'];
  $Cate    = $_POST['Product_Category'];
  $Content = $_POST['Product_Content'];
  $Price   = $_POST['Product_Price'];
  $Video   = $_POST['Product_Video'];

  $sql = "SELECT ProductID FROM product   ";
  $result = $con->query($sql);
  $row = mysqli_fetch_assoc($result);

  $sqlcate = "SELECT ID_Category FROM category where Product_Category = '".$Cate."' ";
  $resultcate = $con->query($sqlcate);
  $rowcate = mysqli_fetch_assoc($resultcate);

  if($_FILES["image_file"]["name"] !=''){
    $allowed_ext = array('jpg','png');
    $tmp = explode('.',$_FILES["image_file"]["name"]);
    $ext = end($tmp);
    if (in_array($ext,$allowed_ext)) {

      if($_FILES["image_file"]["size"] < 200000){
        $name = $row['ProductID']+1 . '.' .$ext;
        $path = "../../images/" . $name;
        move_uploaded_file($_FILES["image_file"]["tmp_name"],$path);

        $sql = "INSERT INTO product( ProductID,Product_Name, Product_Sex, Product_Size, Product_Age, ID_Category, Product_Content, Product_Price,Product_Image,Product_Video,Status) VALUES (NULL,'".$Name."','".$Sex."','".$Size."','".$Age."','".$rowcate['ID_Category']."','".$Content."','".$Price."','".$name."','".$Video."',1) ";

        if ($con->query($sql) === TRUE) {
         echo "<script type='text/javascript'>alert('เพิ่มสินค้าเรียบร้อย');</script>";
         echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php';}, 1);</script>";
       } else {
        echo "<script type='text/javascript'>alert('ข้อมูลบางอย่างไม่ถูกต้อง');</script>";
         echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php';}, 1);</script>";
      }



    }else{
      echo "<script type='text/javascript'>alert('ไฟล์ใหญ่เกินไป')</script>";
      echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php';}, 1);</script>";
    }

  }else{
    echo "<script type='text/javascript'>alert('นามสกุลไฟล์ผิดพลาด')</script>";
    echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php';}, 1);</script>";
  }

}else 
{
  echo "<script type='text/javascript'>alert('ไม่ได้เลือกไฟล์')</script>";
  echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php';}, 1);</script>";
}

}
?>