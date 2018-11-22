<?php
$sql = "SELECT * FROM question ";
$result = $con->query($sql);
$num = 1;
?>
<br><br><br>
<div class="container-fuild" >
  <div class="container">
    <h3 style="border-bottom: 0.5px solid #bfbfbf; margin-top:30px;color: grey;">คำถามที่พบบ่อย <br><br></h3>

    <div class="row">


      <div class="col-md-6">

        <div class="panel-group" id="accordion">

          <?php while ($row = $result->fetch_assoc()) {  ?>
          <div class="panel panel-default ">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a class="hide-content<?php echo $num;?>" style="text-decoration: none;" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $num;?>">
                  <?php if($num==1){?>
                  <span class=" glyphicon glyphicon-minus">
                    <?php }else{?>
                    <span class=" glyphicon glyphicon-plus">
                      <?php }?>
                    </span><?php echo $row['Question'];?>
                  </a>
                </h4>
              </div>
              <div id="collapse<?php echo $num;?>" class="panel-collapse collapse  <?php if($num==1){ echo "in" ; }else{}?>">
                <div class="panel-body"><?php echo $row['Answer'];?></div>
              </div>
            </div>
            <?php $num++; }?>


          </div>

        </div>
        <div class="col-md-6" style="text-align: center;">
          <h3 >หากมีข้อสังสัยสามารถเข้ามา ถาม-ตอบ ได้ที่</h3>   
          <b>Facebook : https://www.facebook.com/Sunaibah/</b><br>
          <a href="https://www.facebook.com/Sunaibah/" target="_blank"><img src="images/facebook.png"></a><b><br>กดเลยออเจ้า!</b>

        </div>
      </div>


    </div>
  </div>
  
  <script type="text/javascript">
    $(document).ready(function(){
      <?php $sql = "SELECT * FROM question ";
      $result = $con->query($sql);
      $num = 1; 
      while ($row = $result->fetch_assoc()) { ?>
        $("#collapse<?php echo $num; ?>").on("hide.bs.collapse", function(){
          $(".hide-content<?php echo $num; ?>").html('<span class=" glyphicon glyphicon-plus"></span> <?php echo $row['Question'];?>');
        });
        $("#collapse<?php echo $num; ?>").on("show.bs.collapse", function(){
          $(".hide-content<?php echo $num; ?>").html('<span class=" glyphicon glyphicon-minus"></span> <?php echo $row['Question'];?>');
        });
        <?php $num++; }?>
      });
    </script>

