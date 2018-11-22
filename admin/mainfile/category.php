
<div class="container">

  <form action="mainfile/action_category.php" method="post">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <input type="text" class="form-control" name="Product_Category" placeholder="เพิ่มหวมดหมู่" >
        </div>
      </div>
      <!-- col-md-6 -->
      <div class="col-md-6">
        <button type="submit" name="add" class="btn btn-success" >เพิ่ม</button>
      </div>
      <!-- col-md-6 -->
    </div>
  </form>

  <div class="table-responsive ">          
    <table class="table table-bordered">
      <thead>
        <tr style="background-color: red;color: white;">
          <th>ID</th>
          <th>หมวดหมู่สินค้า</th>
          <th>จัดการ</th>
        </tr>
      </thead>
      <tbody >
        <?php
        $sql = "SELECT * FROM category";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            ?>
            <tr>
              <td ><?php echo $row['ID_Category'];?></td>
              <td><?php echo $row['Product_Category'];?></td>
              <td ><a type="button" class="btn btn-warning" href="index.php?pagemenu=actioncate&IDchange=<?php echo $row['ID_Category'];?>">แก้ไข</a>&nbsp;<a type="button" href="index.php?pagemenu=actioncate&ID=<?php echo $row['ID_Category'];?>" class="btn btn-danger" onclick="return confirm('หากทำการลบหมวดหมู่ จะทำการลบสินค้าในหมวดหมู่นั้นไปด้วย!!');">ลบ</a></td>
            </tr>
            <?php } }?>
          </tbody>
        </table>
      </div>

    </div>