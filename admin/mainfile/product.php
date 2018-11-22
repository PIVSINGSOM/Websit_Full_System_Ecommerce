<div class="container">
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#ProductID">เรียงตาม ID</a></li>
    <li><a data-toggle="pill" href="#ProductName">เรียงตามชื่อ</a></li>
    <li><a data-toggle="pill" href="#Male">เพศผู้</a></li>
    <li><a data-toggle="pill" href="#Fmale">เพศเมีย</a></li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="">หมวดหมู่<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <?php
        $sql = "SELECT * FROM category ";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
           ?>
           <li><a data-toggle="pill" href="#cate<?php echo $row['ID_Category'];?>"><?php echo $row['Product_Category'];?></a></li>
           <?php } }?>                        
         </ul>
       </li>
       <br>
       <br>
       <br>
       <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
     </ul>
   </div>
   <br>
   <!--tab-content -->
   <div class="container">
     <div class="tab-content">

      <div id="ProductID" class="tab-pane fade in active">
        <div class="table-responsive ">          
          <table class="table table-bordered table-hover" id="myTable">
            <thead>
              <tr class="active">
                <th>ID</th>
                <th>ชื่อสินค้า</th>
                <th>เพศ</th>
                <th>รายละเอียด</th>
                <th>ภาพ</th>
                <th colspan="2">จัดการรายละเอียด</th>
              </tr>
            </thead>
            <tbody >
              <?php
              $sql = "SELECT * FROM product order by ProductID asc";
              $result = $con->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  ?>
                  <tr>
                    <td ><?php echo $row['ProductID'];?></td>
                    <td><?php echo $row['Product_Name'];?></td>
                    <td><?php echo $row['Product_Sex'];?></td>
                    <td><?php echo $row['Product_Content'];?></td>
                    <td><img src="../images/<?php echo $row['Product_Image'];?>" width="100" height="100" ></td>
                    <td >
                      <a type="button" class="btn btn-warning" href="index.php?pagemenu=editproduct&&ID=<?php echo $row['ProductID'];?>">แก้ไข</a>
                    </td>
                    <td>
                      <a type="button" class="btn btn-danger" href="mainfile/delete_product.php?ID=<?php echo $row['ProductID'];?>" onclick="return confirm('ต้องการลบสินค้าชิ้นนี้?');">ลบ</a>
                    </td>
                  </tr>
                  <?php } }?>
                </tbody>
              </table>
            </div>
          </div>

          <div id="ProductName" class="tab-pane fade in ">
            <div class="table-responsive ">          
              <table class="table table-bordered table-hover" id="myTable2">
                <thead>
                  <tr class="active">
                    <th>ID</th>
                    <th>ชื่อสินค้า</th>
                    <th>เพศ</th>
                    <th>รายละเอียด</th>
                    <th>ภาพ</th>
                    <th  colspan="2">จัดการรายละเอียด</th>
                  </tr>
                </thead>
                <tbody >
                  <?php
                  $sql = "SELECT * FROM product order by Product_Name asc";
                  $result = $con->query($sql);
                  if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                        <td ><?php echo $row['ProductID'];?></td>
                        <td><?php echo $row['Product_Name'];?></td>
                        <td><?php echo $row['Product_Sex'];?></td>
                        <td><?php echo $row['Product_Content'];?></td>
                        <td ><img src="../images/<?php echo $row['Product_Image'];?>" width="100" height="100" ></td>
                        <td >
                          <a type="button" class="btn btn-warning" href="index.php?pagemenu=editproduct&&ID=<?php echo $row['ProductID'];?>" >แก้ไข</a>
                        </td>
                        <td>
                          <a type="button" class="btn btn-danger" href="mainfile/delete_product.php?ID=<?php echo $row['ProductID'];?>" onclick="return confirm('ต้องการลบสินค้าชิ้นนี้?');">ลบ</a>
                        </td>
                      </tr>
                      <?php } }?>
                    </tbody>
                  </table>
                </div>

              </div>

              <div id="Male" class="tab-pane fade in ">
                <div class="table-responsive ">          
                  <table class="table table-bordered table-hover" id="myTable3">
                    <thead>
                      <tr class="active">
                        <th>ID</th>
                        <th>ชื่อสินค้า</th>
                        <th>เพศ</th>
                        <th>รายละเอียด</th>
                        <th>ภาพ</th>
                        <th  colspan="2">จัดการรายละเอียด</th>
                      </tr>
                    </thead>
                    <tbody >
                      <?php
                      $sql = "SELECT * FROM product where Product_Sex = 'ผู้' ";
                      $result = $con->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          ?>
                          <tr>
                            <td ><?php echo $row['ProductID'];?></td>
                            <td><?php echo $row['Product_Name'];?></td>
                            <td><?php echo $row['Product_Sex'];?></td>
                            <td><?php echo $row['Product_Content'];?></td>
                            <td><img src="../images/<?php echo $row['Product_Image'];?>" width="100" height="100" ></td>
                            <td >
                              <a type="button" class="btn btn-warning" href="index.php?pagemenu=editproduct&&ID=<?php echo $row['ProductID'];?>" >แก้ไข</a>
                            </td>
                            <td>
                              <a type="button" class="btn btn-danger" href="mainfile/delete_product.php?ID=<?php echo $row['ProductID'];?>" onclick="return confirm('ต้องการลบสินค้าชิ้นนี้?');">ลบ</a>
                            </td>
                          </tr>
                          <?php } }?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div id="Fmale" class="tab-pane fade in ">
                    <div class="table-responsive ">          
                      <table class="table table-bordered table-hover" id="myTable4">
                        <thead>
                          <tr class="active">
                            <th>ID</th>
                            <th>ชื่อสินค้า</th>
                            <th>เพศ</th>
                            <th>รายละเอียด</th>
                            <th>ภาพ</th>
                            <th  colspan="2">จัดการรายละเอียด</th>
                          </tr>
                        </thead>
                        <tbody >
                          <?php
                          $sql = "SELECT * FROM product where Product_Sex = 'เมีย' ";
                          $result = $con->query($sql);
                          if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                              ?>
                              <tr>
                                <td ><?php echo $row['ProductID'];?></td>
                                <td><?php echo $row['Product_Name'];?></td>
                                <td><?php echo $row['Product_Sex'];?></td>
                                <td><?php echo $row['Product_Content'];?></td>
                                <td><img src="../images/<?php echo $row['Product_Image'];?>" width="100" height="100" ></td>
                                <td >
                                  <a type="button" class="btn btn-warning" href="index.php?pagemenu=editproduct&&ID=<?php echo $row['ProductID'];?>" >แก้ไข</a>
                                </td>
                                <td>
                                  <a type="button" class="btn btn-danger" href="mainfile/delete_product.php?ID=<?php echo $row['ProductID'];?>" onclick="return confirm('ต้องการลบสินค้าชิ้นนี้?');">ลบ</a>
                                </td>
                              </tr>
                              <?php } }?>
                            </tbody>
                          </table>
                        </div>
                      </div>


                      <?php
                      $sql = "SELECT * FROM category ";
                      $result = $con->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          ?>
                          <div id="cate<?php echo $row['ID_Category'];?>" class="tab-pane fade in ">
                            <div class="table-responsive ">          
                              <table class="table table-bordered table-hover" >
                                <thead>
                                  <tr class="active" >
                                    <th>ID</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>เพศ</th>
                                    <th>รายละเอียด</th>
                                    <th>ภาพ</th>
                                    <th  colspan="2">จัดการรายละเอียด</th>
                                  </tr>
                                </thead>
                                <tbody >
                                  <?php
                                  $sql2 = "SELECT * FROM product where ID_Category = '".$row['ID_Category']."' ";
                                  $result2 = $con->query($sql2);
                                  if ($result2->num_rows > 0) {
                                    while($row2 = $result2->fetch_assoc()) {
                                      ?>
                                      <tr>
                                        <td ><?php echo $row2['ProductID'];?></td>
                                        <td><?php echo $row2['Product_Name'];?></td>
                                        <td><?php echo $row2['Product_Sex'];?></td>
                                        <td><?php echo $row2['Product_Content'];?></td>
                                        <td><img src="../images/<?php echo $row2['Product_Image'];?>" width="100" height="100" ></td>
                                        <td >
                                          <a type="button" class="btn btn-warning" href="index.php?pagemenu=editproduct&&ID=<?php echo $row2['ProductID'];?>" >แก้ไข</a>
                                        </td>
                                        <td>
                                          <a type="button" class="btn btn-danger" href="mainfile/delete_product.php?ID=<?php echo $row2['ProductID'];?>" onclick="return confirm('ต้องการลบสินค้าชิ้นนี้?');">ลบ</a>
                                        </td>
                                      </tr>
                                      <?php } }?>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <?php } }?>




                            </div><!--tab-content -->
                          </div>
                          <script>
                            function myFunction() {
                              var input, filter, table, tr, td, i;
                              input = document.getElementById("myInput");
                              filter = input.value.toUpperCase();
                              table = document.getElementById("myTable");
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
                              table = document.getElementById("myTable2");
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
                              table = document.getElementById("myTable3");
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
                              table = document.getElementById("myTable4");
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


