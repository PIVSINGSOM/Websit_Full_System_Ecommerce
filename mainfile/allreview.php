<br><br>
<div class="container-fuild" style="background-color: #80808014;" >
  <div class="container">
    <h3 style="border-bottom: 0.5px solid black; margin-top:30px;color: black;">รีวิวจากลูกค้าทั้งหมด <br><br></h3>
    <br><br>
    <?php
    $check = 0;
    $class = "";
    $sql = "SELECT * FROM review order by ReviewID desc";
    $result = $con->query($sql);

    while($row = $result->fetch_assoc()) {
      $sqluser = "SELECT * FROM member_user where UserID = '".$row['UserID']."' ";
      $resultuser = $con->query($sqluser);
      $rowuser = mysqli_fetch_assoc($resultuser);
      if($check%2 == 0){
        $class = 'class="review-1"';
      }
      if($check%2 == 1){
        $class = 'class="review"';
      }
      ?>
      <div <?php echo $class; ?> >
        <div class="item-review">
          <i><b>" </b></i>
          <i><?php echo $row['Detail'];?></i>
          <i><b> "</b></i>
        </div>
      </div>
      <div class="user-review">
        <br>
        <img src="images/people.png" style="max-width: 50px;width: auto;max-height: 50px;">
        <b>คุณ, <?php echo $rowuser['Name']; ?> เมื่อวันที่ <?php echo $row['Date']; ?> </b>
        <?php
        $num = 5;
        if($row['Star'] != 5){
          $star = $num - $row['Star'];
          for($i=0;$i<$row['Star'];$i++){
            echo '<span class="fa fa-star checked"></span>';
          }
          for($i=0;$i<$star;$i++){
            echo '<span class="fa fa-star "></span>';
          }
        }
        else{
          for($i=0;$i<$row['Star'];$i++){
            echo '<span class="fa fa-star checked"></span>';
          }
        }
        ?>

      </div>
      <br><br>



      <?php $check++; }?>
    </div>
  </div>
