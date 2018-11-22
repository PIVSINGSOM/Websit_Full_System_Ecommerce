<?php
$sql =  "SELECT * FROM banner ";
$result = $con->query($sql);
$numrow = $result->num_rows;
$row = mysqli_fetch_assoc($result);
?>
<!-- slide -->
<div class="container-fuild">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <?php for($i=1;$i<$numrow;$i++){?>
      <li data-target="#myCarousel" data-slide-to="<?php echo $i ;?>"></li>
        <?php }?>

    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="images/<?php echo $row['Image'];?>" alt="Los Angeles" style="width:100%;max-height: 600px;height: auto;">
      </div>

      <?php while($row = mysqli_fetch_assoc($result)){?>
      <div class="item ">
        <img src="images/<?php echo $row['Image'];?>" alt="Los Angeles" style="width:100%;max-height: 600px;height: auto;">
      </div>
      <?php }?>

    
      


    </div>
  </div>
</div>
<!-- end slide -->
