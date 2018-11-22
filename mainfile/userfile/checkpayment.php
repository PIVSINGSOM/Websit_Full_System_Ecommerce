
<?php
if(isset($_POST['submit'])){

  if($_POST['date']==""||$_POST['bank']==""||$_POST['amount']==""||$_POST['UserID']==""||$_POST['UserID']==""||$_POST['OrderID']==""){ ?>

    <br><br>
    <div class="container">
      <h3 style="text-align:center;">" <b id="demo">ข้อมูลผิดพลาด</b> "</h3>
      <div class="progress">
        <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
        </div>
      </div>
      <h5 style="text-align:center;" id="status">โปรดตรวจสอบข้อมูลอีกครั้ง</h5>
    </div>
    <br><br><br><br><br>
    <?php echo "<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=dashboard';}, 2000);</script>";
  } else {

    $sql = "INSERT INTO payment (OrderID,UserID,Bank,Amount,Date_transfer,Confirm) VALUES('".$_POST['OrderID']."','".$_POST['UserID']."','".$_POST['bank']."','".$_POST['amount']."','".$_POST['date']."','No');";

    if ($con->query($sql) === TRUE) {

      $sql2 = "UPDATE orders SET Paid='Checking' WHERE OrderID='".$_POST['OrderID']."' ";

      if ($con->query($sql2) === TRUE) {
        ?>

        <br><br>
        <div class="container">
          <h3 style="text-align:center;">" <b id="demo">กำลังบันทึกรายการ</b> "</h3>
          <div class="progress">
            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
            </div>
          </div>
          <h5 style="text-align:center;" id="status">กรุณารอสักครู่</h5>
        </div>
        <br><br><br><br><br>
        <?php echo "<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=dashboard';}, 2000);</script>" ?>

      <?php } } else {
        echo "Error: " . $sql . "<br>" . $conn->error;?>

        <br><br>
        <div class="container">
          <h3 style="text-align:center;">" <b id="demo">ข้อมูลผิดพลาด</b> "</h3>
          <div class="progress">
            <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
            </div>
          </div>
          <h5 style="text-align:center;" id="status">โปรดตรวจสอบข้อมูลอีกครั้ง</h5>
        </div>
        <br><br><br><br><br>

      <?php  } }

    }else{
      ?>

      <br><br>
      <div class="container">
        <h3 style="text-align:center;">" <b id="demo">ข้อมูลผิดพลาด</b> "</h3>
        <div class="progress">
          <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
          </div>
        </div>
        <h5 style="text-align:center;" id="status">โปรดตรวจสอบข้อมูลอีกครั้ง</h5>
      </div>
      <br><br><br><br><br>

      <?php echo "<script type='text/javascript'>setTimeout(function(){window.location = 'index.php?pagemenu=dashboard';}, 2000);</script>"; } ?>
