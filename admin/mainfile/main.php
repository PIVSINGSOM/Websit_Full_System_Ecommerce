<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a style="margin-right: 30px;" class="navbar-brand" href="">Clonglon Betta Shop</a>
    </div>
    <ul class="nav navbar-nav">

      <li class="active"><a data-toggle="tab" href="#home">สินค้าทั้งหมด</a></li>
      <li><a data-toggle="tab" href="#menu6">เพิ่มสินค้า</a></li>
      <li><a data-toggle="tab" href="#menu1">หมวดหมู่สินค้า</a></li>
      <li><a data-toggle="tab" href="#menu2">รายการสั่งซื้อ</a></li>
      <li><a data-toggle="tab" href="#menu5">ข้อมูลการสั่งซื้อ</a></li>
      <li><a data-toggle="tab" href="#menu4">แจ้งการโอนเงิน</a></li>
      <li><a data-toggle="tab" href="#menu7">แก้ไขbanner</a></li>
      <li><a  href="mainfile/logout.php">logout</a></li>
    </ul>
  </div>
</nav>


<div class="container-fluid" >





  <div class="tab-content">

    <div id="home" class="tab-pane fade in active">
      <br>
      <?php include('product.php');?>
    </div>

    <div id="menu1" class="tab-pane fade">
      <br>
      <?php include('category.php');?>
    </div>

    <div id="menu2" class="tab-pane fade">
      <br>
      <?php include('orders.php');?>
    </div>

    <div id="menu4" class="tab-pane fade">
      <br>
      <?php include('payment.php');?>
    </div>

    <div id="menu5" class="tab-pane fade">
      <br>
      <?php include('orderdetail.php');?>
    </div>

    <div id="menu6" class="tab-pane fade">
      <br>
      <?php include('add_product.php');?>
    </div>
    <div id="menu7" class="tab-pane fade">
      <br>
      <?php include('banner.php');?>
    </div>
   



  </div>
</div>
