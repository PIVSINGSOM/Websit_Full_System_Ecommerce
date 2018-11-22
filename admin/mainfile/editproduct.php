<?php

if(isset($_POST['update'])){

  $ID      = $_POST['ProductID'];
  $Name    = $_POST['Product_Name'];
  $Sex     = $_POST['Product_Sex'];
  $Size    = $_POST['Product_Size'];
  $Age     = $_POST['Product_Age'];
  $Cate    = $_POST['Product_Category'];
  $Content = $_POST['Product_Content'];
  $Price   = $_POST['Product_Price'];
  $Video   = $_POST['Product_Video'];

  $sqlcate = "SELECT * FROM category where Product_Category = '".$Cate ."' ";
  $resultcate = $con->query($sqlcate);
  $rowcate = mysqli_fetch_assoc($resultcate);


  $sql = "UPDATE `product` SET `Product_Name`='".$Name."',`Product_Sex`='".$Sex."',`Product_Size`='".$Size."',`Product_Age`='".$Age."',`ID_Category`='".$rowcate['ID_Category']."',`Product_Content`='".$Content."',`Product_Price`='".$Price."',`Product_Video`='".$Video."' WHERE `ProductID` = $ID ";

  if ($con->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('อัพเดตเสร็จเรียบร้อย');</script>";
    echo "<script type='text/javascript'>setTimeout(function(){window.location = 'index.php';}, 1);</script>";
  } else {
    echo "Error updating record: " . $con->error;
  }

}

if (isset($_POST['updatepic']))
{

 if($_FILES["image_file"]["name"] !=''){
  $allowed_ext = array('jpg','png');
  $tmp = explode('.',$_FILES["image_file"]["name"]);
  $ext = end($tmp);
  if (in_array($ext,$allowed_ext)) {
    if($_FILES["image_file"]["size"] < 200000){
      $name = $_POST['ProductID'] . '.' .$ext;
      $path = "../images/" . $name;
      move_uploaded_file($_FILES["image_file"]["tmp_name"],$path);
      $sql = "UPDATE product SET Product_Image = '$name' WHERE ProductID = '".$_POST['ProductID']."'  ";

      if ($con->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('อัพเดตเสร็จเรียบร้อย');</script>";
        echo "<script type='text/javascript'>setTimeout(function(){window.location = 'index.php';}, 1);</script>";

      } 
      
    }else{echo "big file";}

  }else{echo "invalid file";}

}else {echo "invalid file";}

}

else {


  if(isset($_GET['ID'])){
    $ID=$_GET['ID'];
  }

  $sql = "SELECT * FROM product where ProductID = '".$ID."' ";
  $result = $con->query($sql);
  $row = mysqli_fetch_assoc($result);

  $sqlcate = "SELECT * FROM category  ";
  $resultcate = $con->query($sqlcate);

  $sqlsex = "SELECT DISTINCT Product_Sex FROM product   ";
  $resultsex = $con->query($sqlsex);
  ?>

  <div class="container">
    <h2>สินค้า ID :<?php echo $row['ProductID'];?></h2>
    <div class="row">
      <form action="index.php?pagemenu=editproduct" method="post">

        <div class="col-md-6">
          <div class="form-group">
            <label >ชื่อสินค้า:</label>
            <input type="text" class="form-control"   name="Product_Name" value="<?php echo $row['Product_Name'];?>">
          </div>
          <div class="form-group">
            <label >เพศ:</label>
            <select class="form-control" name="Product_Sex">
              <?php if (mysqli_num_rows($resultsex) > 0) {
               while($rowsex= mysqli_fetch_assoc($resultsex)) {
                 ?>
                 <option><?php echo $rowsex['Product_Sex'];?></option>
                 <?php }}?>
               </select>
             </div>

             <div class="form-group">
               <label >ขนาด/นิ้ว:</label>
               <input type="text" class="form-control"   name="Product_Size" value="<?php echo $row['Product_Size'];?>">
             </div>
           </div><!-- col-md-6 -->


           <div class="col-md-6">
             <div class="form-group" >
               <label >อายุ/เดือน:</label>
               <input type="text" class="form-control"   name="Product_Age" value="<?php echo $row['Product_Age'];?>">
             </div>
             <div class="form-group">
               <label >หมวดหมู่ปลากัด:</label>
               <select class="form-control" name="Product_Category">
                 <?php
                 if (mysqli_num_rows($resultcate) > 0) {
                   while($rowcate = mysqli_fetch_assoc($resultcate)) {
                     ?>
                     <option><?php echo $rowcate['Product_Category'];?></option>
                     <?php } }?>
                   </select>
                 </div>
                 <div class="form-group">
                   <label >ราคา:</label>
                   <input type="text" class="form-control"   name="Product_Price" value="<?php echo $row['Product_Price'];?>">
                 </div>
               </div><!-- col-md-6 -->
             </div><!-- row -->

             <div class="row">

               <div class="col-md-6">
                 <div class="form-group">
                   <label >Video Link:</label>
                   <input type="text" class="form-control"   name="Product_Video" value='<?php echo $row['Product_Video'];?>'>
                 </div>
                 <div class="form-group">
                   <label >รายละเอียดสินค้า:</label>
                   <textarea  class="form-control" style=" width: 100%;
                   height: 125px;
                   padding: 12px 20px;
                   box-sizing: border-box;
                   border: 2px solid #ccc;
                   border-radius: 4px;
                   background-color: #f8f8f8;
                   font-size: 16px;
                   resize: none;"  name="Product_Content" ><?php echo $row['Product_Content'];?></textarea>
                 </div>
                 <div class="form-group">
                   <input type="hidden" name="ProductID" value="<?php echo $row['ProductID'];?>">
                 </div>
               </div><!-- col-md-6 -->
               <div class="col-md-6" style="text-align: center;">
                 <img src="../images/<?php echo $row['Product_Image'];?>" style="width: 65%;max-height: 250px;height: auto;padding: 10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
               </div><!-- col-md-6 -->
             </div><!-- row -->

             <br>
             <div class="row">
               <div class="col-md-6">
                 <button type="submit" name="update" class="btn btn-success" style="width: 100%">อัพเดต</button>
               </div>
               <div class="col-md-6">
                 <a type="button" class="btn btn-danger" style="width: 100%" href="index.php">ยกเลิก</a>
               </div>
             </div>

           </form>
           <br>

           <div class="container">
             <h3>แก้ไขเฉพาะรูปภาพ ID : <?php echo $row['ProductID'];?></h3>
             <form action="index.php?pagemenu=editproduct" method="post" enctype="multipart/form-data">
              <div class="form-group">
               <input type="hidden" name="ProductID" value="<?php echo $row['ProductID'];?>">
             </div>
             <input  type="file" name="image_file"  />
             <br>
             <button type="submit" name="updatepic" class="btn btn-warning" >อัพเดตรูปภาพ</button>
           </form>
         </div>



       </div>

       <?php }?>