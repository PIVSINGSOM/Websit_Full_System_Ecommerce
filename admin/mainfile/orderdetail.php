<?php
if(isset($_GET['OrderID'])){ ?>
<div class="container-fluid">
  <h1>OrderID :<?php echo $_GET['OrderID'];?> </h1>
  <div class="table-responsive ">          
    <table width="400" class="table table-bordered" id="TableOrder" >
     <?php
     $ID = $_GET['OrderID'];
     $sql = "SELECT * FROM product WHERE ProductID in (SELECT ProductID FROM orders_detail WHERE OrderID = $ID )";
     $result = $con->query($sql);
     $total = 0;
     while($row = $result->fetch_assoc()) {
      $sqlcate = "SELECT * FROM category WHERE ID_Category = '" . $row['ID_Category'] . "' ";
      $resultcate = $con->query($sqlcate);
      $rowcate = mysqli_fetch_assoc($resultcate);
      $total = $total + $row['Product_Price'];
      ?>
      <table class="table table-bordered table-hover">

        <tr class="danger">
          <th style="width: 100px;">ชื่อ</th>
          <td><?php echo $row['Product_Name']?></td>
        </tr>

        <tr class="success">
          <th>เพศ</th>
          <td><?php echo $row['Product_Sex']?></td>
        </tr>

        <tr class="info">
          <th>ขนาด</th>
          <td><?php echo $row['Product_Size']?> นิ้ว</td>
        </tr>

        <tr class="warning">
          <th>อายุ</th>
          <td><?php echo $row['Product_Age']?> เดือน</td>
        </tr>

        <tr class="danger">
          <th>หมวดหมู่</th>
          <td><?php echo $rowcate['Product_Category']?></td>
        </tr>

        <tr class="success">
          <th>รายละเอียด</th>
          <td><?php echo $row['Product_Content']?></td>
        </tr>

        <tr class="info">
          <th>ภาพปลา</th>
          <td><img src="../images/<?php echo $row['Product_Image']?>" width="150" height="100" ></td>
        </tr>

        <tr class="active">
          <th>ราคา :</th>
          <td><?php echo $row['Product_Price']?> บาท </td>
        </tr>

      </table>
      <?php }?>
      <table class="table table-hover">
        <tr >
          <th style="width: 100px;"><b>ราคารวม</b></th>
          <td><?php echo number_format($total,2);?> บาท + ค่าส่ง 80 บาท = <?php echo number_format($total+80,2);?> </td>

        </tr>
      </table>
    </div>
    <a type="button" style="width: 20%;" class="btn  btn-info" href="index.php" >กลับ</a>
  </div>



  <?php } else { ?>
  <div class="container">
    <br>
    <div class="table-responsive ">          
      <table width="400" class="table table-bordered" id="TableOrder" >
        <thead>
          <tr style="background-color: grey;color: white; ">
            <th>Order_ID</th>
            <th>รายละเอียด</th>

          </tr>
        </thead>
        <tbody >
          <?php
          $sql = "SELECT DISTINCT OrderID FROM orders_detail";
          $result = $con->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              ?>
              <tr>
                <td ><?php echo $row['OrderID'];?></td>
                <td width="30%">

                  <a type="button" class="btn btn-warning" href="index.php?pagemenu=checkorder&OrderID=<?php echo $row['OrderID'];?>" >ดูรายละเอียด</a>

                </td>
              </tr>
              <?php } }?>
            </tbody>
          </table>
        </div>
      </div>
      <?php  } ?>
