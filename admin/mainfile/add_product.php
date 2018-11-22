<?php 

$sqlcate = "SELECT * FROM category  ";
$resultcate = $con->query($sqlcate);

$sqlsex = "SELECT DISTINCT Product_Sex FROM product   ";
$resultsex = $con->query($sqlsex);
?>
<div class="container">
  <div class="row">
    <form action="mainfile/add_product_complete.php" method="post" enctype="multipart/form-data">

      <div class="col-md-6">
        <div class="form-group">
          <label >ชื่อสินค้า:</label>
          <input type="text" class="form-control"   name="Product_Name" >
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
             <input type="text" class="form-control"   name="Product_Size" >
           </div>
         </div><!-- col-md-6 -->


         <div class="col-md-6">
           <div class="form-group" >
             <label >อายุ/เดือน:</label>
             <input type="text" class="form-control"   name="Product_Age" >
           </div>
           <div class="form-group">
             <label >หมวดหมู่ปลา:</label>
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
                 <input type="text" class="form-control"   name="Product_Price" >
               </div>
             </div><!-- col-md-6 -->
           </div><!-- row -->

           <div class="row">

             <div class="col-md-6">
               <div class="form-group">
                 <label >Video Link:</label>
                 <input type="text" class="form-control"   name="Product_Video" >
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
                 resize: none;"  name="Product_Content" ></textarea>
               </div>

             </div><!-- col-md-6 -->

             <div class="col-md-6" style="text-align: center;">
              <h2>เลือกรูปภาพ</h2>
              <input  type="file" name="image_file"  />
              
            </div><!-- col-md-6 -->

          </div><!-- row -->

          <br>

          <button type="submit" name="add" class="btn btn-success" style="width: 100%">เพิ่มสินค้า</button>


        </form>
        <br>





      </div>