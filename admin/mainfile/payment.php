<div class="container">
  <div class="container">
    <ul class="nav nav-pills">
      <li class="active"><a data-toggle="pill" href="#All">ทั้งหมด</a></li>
      <li><a data-toggle="pill" href="#nocomplete">ยังไม่ยืนยัน</a></li>
      <li><a data-toggle="pill" href="#complete">ยืนยันแล้ว</a></li>
      <br>
      <br>
      <br>
      <input type="text" id="payment" onkeyup="myFunction3()" placeholder="Search for Order_ID" title="Type in a name">
    </ul>
  </div>

  <div class="tab-content">


    <div id="All" class="tab-pane fade in active">
      <div class="table-responsive ">          
        <table class="table table-bordered" id="TablePayment">
          <thead>
            <tr style="background-color: grey;color: white;">
              <th>Pay_ID</th>
              <th>Order_ID</th>
              <th>รหัสลูกค้า</th>
              <th>ธนาคาร</th>
              <th>จำนวน</th>
              <th>วันที่</th>
              <th>ยืนยัน</th>
            </tr>
          </thead>
          <tbody >
            <?php
            $sql = "SELECT * FROM payment";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                  <td ><?php echo $row['Pay_ID'];?></td>
                  <td ><?php echo $row['OrderID'];?></td>
                  <td ><?php echo $row['UserID'];?></td>
                  <td ><?php echo $row['Bank'];?></td>
                  <td ><?php echo $row['Amount'];?></td>
                  <td ><?php echo $row['Date_transfer'];?></td>
                  <?php if($row['Confirm']=="No"){?>
                  <td ><a type="button" style="width: 100%" class="btn btn-danger"><?php echo $row['Confirm'];?></a></td>
                  <?php } ?>
                  <?php if($row['Confirm']=="Yes"){ ?>
                  <td ><a type="button" style="width: 100%" class="btn btn-success disabled"><?php echo $row['Confirm'];?></a></td>
                  <?php } ?>
                </tr>
                <?php } }?>
              </tbody>
            </table>
          </div>
        </div>

        <div id="nocomplete" class="tab-pane fade in ">
          <div class="table-responsive ">          
            <table class="table table-bordered" id="TablePayment2">
              <?php
              $sql = "SELECT * FROM payment where   Confirm = 'No' ";
              $result = $con->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  ?>
                  <thead>
                    <tr style="background-color: grey;color: white;">
                      <th>Pay_ID</th>
                      <th>Order_ID</th>
                      <th>รหัสลูกค้า</th>
                      <th>ธนาคาร</th>
                      <th>จำนวน</th>
                      <th>วันที่</th>
                      <th>ยืนยัน</th>
                      <?php if($row['Confirm']=="No"){?>
                      <th>ยืนยันการจ่ายเงิน</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody >
                    <tr>
                      <td ><?php echo $row['Pay_ID'];?></td>
                      <td ><?php echo $row['OrderID'];?></td>
                      <td ><?php echo $row['UserID'];?></td>
                      <td ><?php echo $row['Bank'];?></td>
                      <td ><?php echo $row['Amount'];?></td>
                      <td ><?php echo $row['Date_transfer'];?></td>
                      <?php if($row['Confirm']=="No"){?>
                      <td ><a type="button" style="width: 100%" class="btn btn-danger"><?php echo $row['Confirm'];?></a></td>
                      <td ><a type="button" style="width: 100%" class="btn btn-warning" href="index.php?pagemenu=payment&ID=<?php echo $row['Pay_ID'];?>&OrderID=<?php echo $row['OrderID'];?>">ยืนยัน</a></td>
                      <?php } ?>
                    </tr>
                    <?php } }?>
                  </tbody>
                </table>
              </div>
            </div>

            <div id="complete" class="tab-pane fade in ">
              <div class="table-responsive ">          
                <table class="table table-bordered" id="TablePayment3">
                  <thead>
                    <tr style="background-color: grey;color: white;">
                      <th>Pay_ID</th>
                      <th>Order_ID</th>
                      <th>รหัสลูกค้า</th>
                      <th>ธนาคาร</th>
                      <th>จำนวน</th>
                      <th>วันที่</th>
                      <th>ยืนยัน</th>
                    </tr>
                  </thead>
                  <tbody >
                    <?php
                    $sql = "SELECT * FROM payment where Confirm = 'Yes'";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                          <td ><?php echo $row['Pay_ID'];?></td>
                          <td ><?php echo $row['OrderID'];?></td>
                          <td ><?php echo $row['UserID'];?></td>
                          <td ><?php echo $row['Bank'];?></td>
                          <td ><?php echo $row['Amount'];?></td>
                          <td ><?php echo $row['Date_transfer'];?></td>
                          <?php if($row['Confirm']=="Yes"){ ?>
                          <td ><a type="button" style="width: 100%" class="btn btn-success disabled"><?php echo $row['Confirm'];?></a></td>
                          <?php } ?>

                        </tr>
                        <?php } }?>
                      </tbody>
                    </table>
                  </div>
                </div>



              </div>



            </div>

            <script>
        function myFunction3() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("payment");
          filter = input.value.toUpperCase();
          table = document.getElementById("TablePayment");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
          table = document.getElementById("TablePayment2");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
          table = document.getElementById("TablePayment3");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
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