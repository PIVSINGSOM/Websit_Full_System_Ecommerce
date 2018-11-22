<br><br>

<h1>รายการสั่งซื้อ</h1>
<div class="table-responsive">
  <table class="table table-bordered " >
    <thead>
      <tr>
        <th>#</th>
        <th>วันที่</th>
        <th>ยอดรวม</th>
        <th>สถานะ</th>
        <th>เลขพัสดุ</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <?php
    $sqlorder = "SELECT * FROM orders WHERE UserID = '".$_SESSION['UserID']."'  ";
    $resultorder = $con->query($sqlorder);
    ?>
    <?php while($roworder = $resultorder->fetch_assoc()) {  $total = 80; ?>
    <tbody>
      <tr>
        <td><?php echo $roworder['OrderID']; ;?></td>
        <td><?php echo $roworder['OrderDate'] ;?></td>
        <td>
          <?php
          $sqldetail = "SELECT *FROM orders_detail WHERE OrderID = '".$roworder['OrderID']."'  ";
          $resultdetail = $con->query($sqldetail);
          while($rowdetail = $resultdetail->fetch_assoc()) {
            $sqlpro = "SELECT * FROM product where ProductID = '".$rowdetail['ProductID']."' ";
            $resultpro = $con->query($sqlpro);
            $rowpro = mysqli_fetch_assoc($resultpro);
            $total =  $total + $rowpro['Product_Price'];
          }
          echo number_format($total,2)." บาท";
          ?>
        </td>


        <?php if($roworder['Paid']=="Checking"){ ?>

        <td><a style="text-decoration:none;color:#ff9900;" ><i>กำลังดำเนินการ</i></a></td>
        <td><a style="text-decoration:none;color:#c10841;" > - </a></td>

        <?php }if($roworder['Paid']=="Yes"&&$roworder['Delivery']=="No"){?>

        <td><a style="text-decoration:none;color:#ff9900;" ><i>รอจัดส่ง</i></a></td>
        <td><a style="text-decoration:none;color:#c10841;" > - </a></td>

        <?php }if($roworder['Paid']=="Yes"&&$roworder['Delivery']=="Yes"){
          $sqlcode = "SELECT * FROM zipcode WHERE OrderID = '".$roworder['OrderID']."' ";
          $resultcode = $con->query($sqlcode);
          $rowcode = mysqli_fetch_assoc($resultcode);
          ?>

          <td><a style="text-decoration:none;color:#43d220;" ><i>สำเร็จ</i></a></td>
          <td><a style="text-decoration:none;color:#c10841;" ><?php echo $rowcode['Code'];?></a></td>

          <?php } if($roworder['Paid']=="No"&&$roworder['Delivery']=="No"){?>

          <td><a style="text-decoration:none;color:red;" ><i>รอการแจ้งโอนเงิน</i></a></td>
          <td><a style="text-decoration:none;color:#c10841;" > - </a></td>

          <?php }?>
          <td>




            

            <form action="index.php?pagemenu=dashboard&menu=order-detail" method="post">
              <input type="hidden" name="OrderID" value="<?php echo $roworder['OrderID'];?>" >
              <button type="submit" name="detail-order" class="btn btn-info" >รายละเอียด</button>
            </form>
          </td>
          <?php if($roworder['Paid']=="Yes"||$roworder['Paid']=="Checking"){?>
          <td>
              <button type="submit" class="btn  btn-danger"  disabled>ยกเลิกรายการ</
          </td>
          <?php }?>
          <?php if($roworder['Paid']=="No"){?>
          <td>
            <form action="index.php?pagemenu=dashboard&menu=order-cancel" method="post">
              <input type="hidden" name="OrderID" value="<?php echo $roworder['OrderID'];?>" >
              <button type="submit" class="btn  btn-danger" name="del"  onclick="return confirm('ต้องการยกเลิกรายการนี้?');" >ยกเลิกรายการ</button>
            </form>
          </td>
          <?php }?>

        </tr>
      </tbody>
      <?php }?>
    </table>
  </div>
