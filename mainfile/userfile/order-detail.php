<?php if(isset($_POST['detail-order'])){?>
<div class="container">
  <div class="row">

    <div class="col-sm-3 col-md-3">
      <?php include('menu.php');?>
    </div>
    <div class="col-sm-9 col-md-9">
      <br><br>
      <h1>รายการสั่งซื้อที่: <?php echo $_POST['OrderID'];?></h1>
      <div class="table-responsive">

        <?php
        $ID = $_POST['OrderID'];
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
              <td><img src="images/<?php echo $row['Product_Image']?>" width="150" height="100" ></td>
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
              <td><?php echo number_format($total,2);?> บาท </td>
            </tr>
          </table>
          <a class="btn btn-danger" style="float: right;" href="http://localhost/website/index.php?pagemenu=dashboard">กลับ</a>
        </div>
      </div>

    </div>
  </div>
  <?php }else if(isset($_POST['detail-product'])){?>
  <div class="container">
    <div class="row">

      <div class="col-sm-3 col-md-3">
        <?php include('menu.php');?>
      </div>
      <div class="col-sm-9 col-md-9">
        <br><br>
        <h1>สินค้าไอดี: <?php echo $_POST['ProductID'];?></h1>
        <div class="table-responsive">

          <?php
          $sql = "SELECT * FROM product WHERE ProductID = '".$_POST['ProductID']."' ";
          $result = $con->query($sql);
          while($row = $result->fetch_assoc()) {
            $sqlcate = "SELECT * FROM category WHERE ID_Category = '" . $row['ID_Category'] . "' ";
            $resultcate = $con->query($sqlcate);
            $rowcate = mysqli_fetch_assoc($resultcate);
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
                <td><img src="images/<?php echo $row['Product_Image']?>" width="150" height="100" ></td>
              </tr>

              <tr class="active">
                <th>ราคา :</th>
                <td><?php echo $row['Product_Price']?> บาท </td>
              </tr>

            </table>
            <?php }?>

            <a class="btn btn-danger" style="float: right;" href="http://localhost/website/index.php?pagemenu=dashboard">กลับ</a>
          </div>
        </div>

      </div>
    </div>
    <?php }?>
