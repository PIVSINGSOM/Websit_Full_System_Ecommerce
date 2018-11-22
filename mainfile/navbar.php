
<nav class="navbar navbar-default navbar-fixed-top" style="background-color: white;box-shadow: 0 2px 2px -2px gray;">
  <div class="container">
    <div class="navbar-header " style="padding-top: 20px;">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="index.php" ><img src="images/LOGO.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">




      <ul class="nav navbar-nav navbar-right" style="padding-top: 20px;">
        <li><a href="">หน้าแรก</a></li>
        <li><a href="index.php?pagemenu=product">สั่งสินค้า</a></li>
        <li><a href="index.php?pagemenu=review">รีวิว</a></li>
        <li><a href="index.php?pagemenu=payment">การชำระเงิน</a></li>
        <li><a href="index.php?pagemenu=contact">ติดต่อเรา</a></li>

        <?php if(isset($_SESSION['UserID'])){ 

          if(!empty($_SESSION['UserID'])){  


            ?>
            <li><a href="index.php?pagemenu=dashboard" ><span class="glyphicon glyphicon-user"></span> ระบบสมาชิก</a></li>
            <?php if(isset($_SESSION['ProductID'])){
              if(count($_SESSION['ProductID'])!=0){ 
                ?>
                <li ><a href="index.php?pagemenu=dashboard&menu=cart">
                  <span class="glyphicon glyphicon-shopping-cart"></span> ตะกร้าสินค้า 
                  <span class="badge"><?php echo count($_SESSION['ProductID']);?></span>  
                </a>
              </li>
              <?php } ?>
              <?php } }?>

              <?php } 
              else{ ?>

              <li><a href="index.php?pagemenu=login"><span class="glyphicon glyphicon-log-in"></span> เข้าสู่ระบบ</a></li>

              <?php } ?>

            </ul>
          </div>
        </div>
      </nav>