<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-sm-3 col-md-3">
			<?php include('menu.php');?>
		</div>
		<div class="col-sm-9 col-md-9">
			<br><br>
			<h3>สินค้าในตะกร้า</h3>
			<h5><p>" การจัดส่งสินค้าจะจัดส่งตามที่อยู่ในโปรไฟล์ของท่าน กรุณาตรวจสอบข้อมูลก่อนที่จะกดยืนยัน "</p></h5>
			<div class="table-responsive">
				<table class="table table-bordered" >
					<thead>
						<tr>
							<th>#</th>
							<th>สินค้า</th>
							<th>ราคา</th>
							<th>รายละเอียด</th>
							<th>การดำเนินการ</th>
						</tr>
					</thead>
					<tbody>

						<?php

						if(!empty($_SESSION['ProductID'])){
							$total = 0;
							$num = 0;
							foreach ($_SESSION['ProductID'] as $key => $value) {
								$sql = "SELECT * FROM product where ProductID = '".$value['item_id']."' ";
								$result = $con->query($sql);
								$row = mysqli_fetch_assoc($result);
								$sqlcate = "SELECT * FROM category WHERE ID_Category = '".$row['ID_Category']."' ";
								$resultcate=$con->query($sqlcate);
								$rowcate = mysqli_fetch_assoc($resultcate);
								?>
								<tr>
									<td><?php echo $row['ProductID'];?></td>
									<td><?php echo $row['Product_Name'];?></td>
									<td><?php echo number_format($row['Product_Price']);?></td>
									<td>
										<form action="index.php?pagemenu=dashboard&menu=order-detail" method="post">
											<input type="hidden" name="ProductID" value="<?php echo $value['item_id'];?>" >
											<button type="submit" name="detail-product" class="btn btn-info"  >รายละเอียด</button>
										</form>
									</td>
									<td>
										<a href="index.php?pagemenu=dashboard&menu=cart&cart=delete&id=<?php echo $value['item_id'];?>" class="btn btn-danger">ลบ</a>
									</td>
								</tr>
								<?php $total = $total+$row['Product_Price']; 
								$num++;		
							} ?>
							<tr>
								<td colspan="4" align="right"><b>ราคารวม</b></td>
								<td align="right"><b> <?php echo number_format($total,2) ;?> บาท</b></td>
							</tr>
							<tr>
								<td colspan="4" align="right"><b>ค่าส่ง</b></td>
								<td align="right"><b>80 บาท</b></td>
							</tr>
							<tr>
								<td colspan="4" align="right"><b>ราคารวม</b></td>
								<td align="right"><b> <?php echo number_format($total+80,2) ;?> บาท</b></td>

							</tr>
							<?php } ?>


						</tbody>
					</table>

				</div>
				<?php if(!empty($_SESSION['ProductID'])){ ?>
				<a href="index.php?pagemenu=dashboard&menu=addcart" class="btn btn-danger" style="float: right;"  >ยืนยันการสั่งซื้อ</a>
				<?php } ?>
			</div>

		</div>
	</div>
