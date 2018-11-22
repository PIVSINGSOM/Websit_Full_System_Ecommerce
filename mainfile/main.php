<?php
$sql = "SELECT * FROM product WHERE Status = 1 order by ProductID asc limit 0,3";
$result = $con->query($sql);
$num = 0;
?>
<!-- Product -->
<div class="container-fuild">

  <div class="container">
    <div style="text-align: center;">
      <h1 class="title">สินค้าแนะนำ</h1>
    </div>
    <a style="float: right;" href="index.php?pagemenu=product" class="btn btn-success" role="button">
      <span class="glyphicon glyphicon-th"></span> ดูทั้งหมด
    </a>
    <br><br>
    <div class="row">

      <?php while ($row = $result->fetch_assoc()) {
        $sqlcate = "SELECT * FROM category WHERE ID_Category = '" . $row['ID_Category'] . "' ";
        $resultcate = $con->query($sqlcate);
        $rowcate = mysqli_fetch_assoc($resultcate);

        ?>
        <div class="col-md-4 a">
          <div class="item-box thumbnail">
            <img class="item-img" src="images/<?php echo $row['Product_Image'] ?>" >
            <div class="caption">
              <h3><?php echo $row['Product_Name'] ?></h3>
              <p><?php echo $row['Product_Content']; ?></p>
              <div class="button-choose">
                <a href="index.php?cart=add&id=<?php echo $row['ProductID'] ?>" class="btn btn-danger" role="button" >
                  <span class="glyphicon glyphicon-shopping-cart"></span> หยิบใส่ตะกร้า
                </a>
                <a class="btn btn-warning" role="button" data-toggle="modal" data-target="#detail<?php echo $num; ?>">
                  <span class="glyphicon glyphicon-list-alt"></span> รายละเอียด</a>
                  <a class="btn btn-info" role="button" data-toggle="modal" data-target="#myModal<?php echo $num; ?>">
                    <span class="glyphicon glyphicon-play-circle"></span> ดูวิดีโอ</a>
                  </div>

                </div>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal<?php echo $num; ?>" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?php echo $row['Product_Name'] ?></h4>
                  </div>
                  <div class="modal-body">
                    <?php echo $row['Product_Video'] ?>
                  </div>
                </div>

              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="detail<?php echo $num; ?>" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                 <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h3 class="modal-title">รายละเอียดสินค้าไอดี: <?php echo $row['ProductID']?></h3>
                    </div>
                    <div class="modal-body" >
                      <table class="table table-bordered">

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
                          <td><?php echo $row['Product_Size']?></td>
                        </tr>

                        <tr class="warning">
                          <th>อายุ</th>
                          <td><?php echo $row['Product_Age']?></td>
                        </tr>

                        <tr class="danger">
                          <th>หมวดหมู่</th>
                          <td><?php echo $rowcate['Product_Category']?></td>
                        </tr>

                        <tr class="success">
                          <th>รายละเอียด</th>
                          <td><?php echo $row['Product_Content']?></td>
                        </tr>

                        <tr class="active">
                          <th>ราคา</th>
                          <td><?php echo $row['Product_Price']?> บาท </td>
                        </tr>

                      </table>
                    </div>
                  </div>

              </div>
            </div>

            <?php $num++;}?>


          </div>


        </div>
      </div>
      <!-- End Product -->
      <br><br>
      <!-- Process -->
      <div class="container-fuild" >
        <div class="container">
          <h3 style="border-bottom: 0.5px solid #bfbfbf; margin-top:30px;color: grey;">ขั้นตอนการสั่งซื้อ <br><br></h3>
          <br>
          <div class="row">
            <div class="col-md-4">
              <div class="detail-process ">
                <img src="images/c4.png">
                <br>
                <br>
                <div>
                  <a>เลือกสินค้าที่ท่านต้องการสั่งซื้อผ่านหน้าเว็บไซต์
                    กดรูปตะกร้าสินค้าเพื่อไปยังหน้าประมาณราคา
                  ให้ท่านทำการตรวจสอบข้อมูลสินค้าก่อนทำรายการถัดไป</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="detail-process">
                <img src="images/cart-icon.png">
                <br>
                <br>
                <div>
                  <a>หลังจากนั้นหากยังไม่ได้สมัครสมาชิกให้สมัครสมาชิกให้เรียบร้อย และทำการกรอกชื่อที่อยู่สำหรับจัดส่งสินค้า
                  พร้อมแจ้งหลักฐานการโอนเงินให้เรียบร้อย</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="detail-process">
                <img src="images/icon-home.png">
                <br>
                <br>
                <div>
                  <a>เมื่อท่านทำตามขั้นตอนทุกอย่างแล้ว ทางเราจะทำการส่งสินค้าให้ท่าน
                  และท่านจะได้รับสินค้าภายในไม่เกิน3-7วันค่ะ</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Process -->
      <!-- Question -->

      <?php include 'mainfile/question.php';?>

      <!-- End Question -->
      <br><br>

      <!--  Review -->
      <?php include 'review.php';?>
      <!-- End Review -->















