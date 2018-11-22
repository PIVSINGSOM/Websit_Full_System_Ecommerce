<div class="container">
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#ProductAll">ทั้งหมด</a></li>
    <li><a data-toggle="pill" href="#Nopay">ยังไม่จ่ายเงิน</a></li>
    <li><a data-toggle="pill" href="#Nodelivery">ยังไม่ส่งสินค้า</a></li>
    <li><a data-toggle="pill" href="#Complete">เสร็จเรียบร้อย</a></li>
  </ul>
  <br>

  <input type="text"  id="orders" onkeyup="myFunction2()" placeholder="Search for Names Customer" title="Type in a name">
  <div class="container-fluid" >




    <div class="tab-content">


      <div id="ProductAll" class="tab-pane fade in active">

        <div class="table-responsive ">          
          <table class="table table-bordered" id="TableOrder">
            <thead>
              <tr style="background-color: grey;color: white;">
                <th>ORDER_ID</th>
                <th>วันที่</th>
                <th>รหัสลูกค้า</th>
                <th>ชื่อลูกค้า</th>
                <th>ที่อยู่</th>
                <th>เบอร์โทร</th>
                <th>สถานะจ่ายเงิน</th>
                <th>ส่งสินค้า</th>
              </tr>
            </thead>
            <tbody >
              <?php
              $sql = "SELECT * FROM orders";
              $result = $con->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  ?>
                  <tr>
                    <td ><?php echo $row['OrderID'];?></td>
                    <td ><?php echo $row['OrderDate'];?></td>
                    <td ><?php echo $row['UserID'];?></td>
                    <td ><?php echo $row['Name'];?></td>
                    <td ><?php echo $row['Address'];?></td>
                    <td ><?php echo $row['Tel'];?></td>

                    <?php if($row['Paid']=="No"||$row['Paid']=="Checking"){?>
                    <td ><a type="button" style="width: 100%" class="btn btn-danger disabled"><?php echo $row['Paid'];?></a></td>
                    <?php } ?>
                    <?php if($row['Paid']=="Yes"){ ?>
                    <td ><a type="button" style="width: 100%" class="btn btn-success disabled"><?php echo $row['Paid'];?></a></td>
                    <?php } ?>
                    <?php if($row['Delivery']=="No"){?>
                    <td ><a type="button" style="width: 100%" class="btn btn-danger disabled"><?php echo $row['Delivery'];?></a></td>
                    <?php } ?>
                    <?php if($row['Delivery']=="Yes"){ ?>
                    <td ><a type="button" style="width: 100%" class="btn btn-success disabled"><?php echo $row['Delivery'];?></a></td>
                    <?php } ?>



                  </tr>
                  <?php } }?>
                </tbody>
              </table>
            </div>

          </div>

          <div id="Nodelivery" class="tab-pane fade in ">

            <div class="table-responsive ">          
              <table class="table table-bordered" id="TableOrder">
                <thead>
                  <tr style="background-color: grey;color: white;">
                    <th>ORDER_ID</th>
                    <th>วันที่</th>
                    <th>รหัสลูกค้า</th>
                    <th>ชื่อลูกค้า</th>
                    <th>ที่อยู่</th>
                    <th>เบอร์โทร</th>
                    <th>สถานะจ่ายเงิน</th>
                    <th>ส่งสินค้า</th>
                    <th>ยืนยันการส่งสินค้า</th>
                  </tr>
                </thead>
                <tbody >
                  <?php
                  $sql = "SELECT * FROM orders where Delivery ='No' and Paid = 'Yes' ";
                  $result = $con->query($sql);
                  if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                        <td ><?php echo $row['OrderID'];?></td>
                        <td ><?php echo $row['OrderDate'];?></td>
                        <td ><?php echo $row['UserID'];?></td>
                        <td ><?php echo $row['Name'];?></td>
                        <td ><?php echo $row['Address'];?></td>
                        <td ><?php echo $row['Tel'];?></td>

                        <?php if($row['Paid']=="No"){?>
                        <td ><a type="button" style="width: 100%" class="btn btn-danger disabled"><?php echo $row['Paid'];?></a></td>
                        <?php } ?>
                        <?php if($row['Paid']=="Yes"){ ?>
                        <td ><a type="button" style="width: 100%" class="btn btn-success disabled"><?php echo $row['Paid'];?></a></td>
                        <?php } ?>
                        <?php if($row['Delivery']=="No"){?>
                        <td ><a type="button" style="width: 100%" class="btn btn-danger disabled"><?php echo $row['Delivery'];?></a></td>
                        <?php } ?>
                        <?php if($row['Delivery']=="Yes"){ ?>
                        <td ><a type="button" style="width: 100%" class="btn btn-success disabled"><?php echo $row['Delivery'];?></a></td>
                        <?php } ?>
                        <td ><a type="button" style="width: 100%" class="btn btn-warning" href="index.php?pagemenu=delivery&ID=<?php echo $row['OrderID'];?>">ยืนยัน</a></td>



                      </tr>
                      <?php } }?>
                    </tbody>
                  </table>
                </div>
              </div>

              <div id="Nopay" class="tab-pane fade in ">

                <div class="table-responsive ">          
                  <table class="table table-bordered" id="TableOrder">
                    <thead>
                      <tr style="background-color: grey;color: white;">
                        <th>ORDER_ID</th>
                        <th>วันที่</th>
                        <th>รหัสลูกค้า</th>
                        <th>ชื่อลูกค้า</th>
                        <th>ที่อยู่</th>
                        <th>เบอร์โทร</th>
                        <th>สถานะจ่ายเงิน</th>
                        <th>ส่งสินค้า</th>
                      </tr>
                    </thead>
                    <tbody >
                      <?php
                      $sql = "SELECT * FROM orders where Paid ='No' ";
                      $result = $con->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          ?>
                          <tr>
                            <td ><?php echo $row['OrderID'];?></td>
                            <td ><?php echo $row['OrderDate'];?></td>
                            <td ><?php echo $row['UserID'];?></td>
                            <td ><?php echo $row['Name'];?></td>
                            <td ><?php echo $row['Address'];?></td>
                            <td ><?php echo $row['Tel'];?></td>

                            <?php if($row['Paid']=="No"){?>
                            <td ><a type="button" style="width: 100%" class="btn btn-danger disabled"><?php echo $row['Paid'];?></a></td>
                            <?php } ?>
                            <?php if($row['Paid']=="Yes"){ ?>
                            <td ><a type="button" style="width: 100%" class="btn btn-success disabled"><?php echo $row['Paid'];?></a></td>
                            <?php } ?>
                            <?php if($row['Delivery']=="No"){?>
                            <td ><a type="button" style="width: 100%" class="btn btn-danger disabled"><?php echo $row['Delivery'];?></a></td>
                            <?php } ?>
                            <?php if($row['Delivery']=="Yes"){ ?>
                            <td ><a type="button" style="width: 100%" class="btn btn-success disabled"><?php echo $row['Delivery'];?></a></td>
                            <?php } ?>



                          </tr>
                          <?php } }?>
                        </tbody>
                      </table>
                    </div>
                  </div>


                  <div id="Complete" class="tab-pane fade in ">

                    <div class="table-responsive ">          
                      <table class="table table-bordered" id="TableOrder">
                        <thead>
                          <tr style="background-color: grey;color: white;">
                            <th>ORDER_ID</th>
                            <th>วันที่</th>
                            <th>รหัสลูกค้า</th>
                            <th>ชื่อลูกค้า</th>
                            <th>ที่อยู่</th>
                            <th>เบอร์โทร</th>
                            <th>สถานะจ่ายเงิน</th>
                            <th>ส่งสินค้า</th>
                            <th>รหัสไปรษณีย์</th>
                          </tr>
                        </thead>
                        <tbody >
                          <?php
                          $sql = "SELECT * FROM orders where Paid ='Yes' and Delivery = 'Yes' ";
                          $result = $con->query($sql);
                          if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                              ?>
                              <tr>
                                <td ><?php echo $row['OrderID'];?></td>
                                <td ><?php echo $row['OrderDate'];?></td>
                                <td ><?php echo $row['UserID'];?></td>
                                <td ><?php echo $row['Name'];?></td>
                                <td ><?php echo $row['Address'];?></td>
                                <td ><?php echo $row['Tel'];?></td>

                                <?php if($row['Paid']=="No"){?>
                                <td ><a type="button" style="width: 100%" class="btn btn-danger disabled"><?php echo $row['Paid'];?></a></td>
                                <?php } ?>
                                <?php if($row['Paid']=="Yes"){ ?>
                                <td ><a type="button" style="width: 100%" class="btn btn-success disabled"><?php echo $row['Paid'];?></a></td>
                                <?php } ?>
                                <?php if($row['Delivery']=="No"){?>
                                <td ><a type="button" style="width: 100%" class="btn btn-danger disabled"><?php echo $row['Delivery'];?></a></td>
                                <?php } ?>
                                <?php if($row['Delivery']=="Yes"){ ?>
                                <td ><a type="button" style="width: 100%" class="btn btn-success disabled"><?php echo $row['Delivery'];?></a></td>
                                <?php } ?>
                                <td ><a type="button" style="width: 100%" class="btn btn-warning" href="index.php?pagemenu=delivery&OrderID=<?php echo $row['OrderID'];?>">ดู</a></td>


                              </tr>
                              <?php } }?>
                            </tbody>
                          </table>
                        </div>
                      </div>




                    </div>

                  </div>
                </div>

                <script>
                  function myFunction2() {
                    var input, filter, table, tr, td, i;
                    input = document.getElementById("orders");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("TableOrder");
                    tr = table.getElementsByTagName("tr");
                    for (i = 0; i < tr.length; i++) {
                      td = tr[i].getElementsByTagName("td")[3];
                      if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                          tr[i].style.display = "";
                        } else {
                          tr[i].style.display = "none";
                        }
                      }       
                    }
                  }
                </script>