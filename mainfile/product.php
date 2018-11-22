<?php
$start = 0;
$limit = 3;
$num = 0;
?>
<!-- Product -->
<div class="container-fuild">
  <div class="container">
    <h1  class="title">สินค้าของเรา</h1>

    <?php for($i=0;$i<3;$i++){
      $sql = "SELECT * FROM product WHERE Status = 1 order by ProductID asc limit $start,$limit";
      $result=$con->query($sql);
      ?>
      <div class="row">
        <?php while($row = $result->fetch_assoc()) {
          $sqlcate = "SELECT * FROM category WHERE ID_Category = '".$row['ID_Category']."' ";
          $resultcate=$con->query($sqlcate);
          $rowcate = mysqli_fetch_assoc($resultcate);
          ?>
          <div class="col-md-4 a">
            <div class="item-box thumbnail">
              <img class="item-img" src="images/<?php echo $row['Product_Image']?>" >
              <div class="caption">
                <h3><?php echo $row['Product_Name']?></h3>
                <p><?php echo $row['Product_Content'];?></p>
                <div class="button-choose">
                  <a href="index.php?pagemenu=product&cart=add&id=<?php echo $row['ProductID']?>" class="btn btn-danger" role="button" >
                    <span class="glyphicon glyphicon-shopping-cart"></span> หยิบใส่ตะกร้า
                  </a> 
                  <a class="btn btn-warning" role="button" data-toggle="modal" data-target="#detail<?php echo $num;?>">
                    <span class="glyphicon glyphicon-list-alt"></span> รายละเอียด</a>
                    <a class="btn btn-info" role="button" data-toggle="modal" data-target="#myModal<?php echo $num;?>">
                      <span class="glyphicon glyphicon-play-circle"></span> ดูวิดีโอ</a>
                    </div>

                  </div>
                </div>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="myModal<?php echo $num;?>" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><?php echo $row['Product_Name']?></h4>
                    </div>
                    <div class="modal-body">
                      <?php echo $row['Product_Video']?>
                    </div>
                  </div>

                </div>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="detail<?php echo $num;?>" role="dialog">
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
            <?php 
            $start=$start+3;
          }
          ?>

        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
              <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
