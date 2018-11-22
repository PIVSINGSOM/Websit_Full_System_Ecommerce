<?php

if(isset($_SESSION["UserID"])){


	if($_SESSION["UserID"]==""){
		echo "<script type='text/javascript'>alert('กรุณา login ก่อนค่ะ');</script>";
		echo "<script type='text/javascript'>setTimeout(function(){window.location = '../index.php?pagemenu=login';}, 1);</script>";
	}
	else{ ?>
	<br>
	<br>
	<div class="container">
		<div class="row">

			<div class="col-sm-3 col-md-3">
				<?php include('menu.php');?>
			</div>
			<div class="col-sm-9 col-md-9">
				<br><br>
				<h3>แจ้งการชะำระเงิน</h3>
				<h5>เมื่อทำการชำระเงินแล้ว ระบบจะแจ้งเตือนสถานะ ในหน้าหลัก</h5>
				<?php
				$sqlorder = "SELECT *FROM orders WHERE UserID = '".$_SESSION['UserID']."' and  Paid ='No' ";
				$resultorder = $con->query($sqlorder);
				$array = array('panel-info', 'panel-danger', 'panel-success','panel-warning');
				$count = 1;
				?>
				<?php while($roworder = $resultorder->fetch_assoc()) { $num = 1;$total = 80;?>
				<div class="panel <?php echo $array[rand(0, count($array) - 1)]; ?>">
					<div class="panel-heading">รายการที่ : <?php echo $roworder['OrderID'] ;?></div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-bordered" >
								<thead>
									<tr>
										<th>#</th>
										<th>วันที่</th>
										<th>ชื่อสินค้า</th>
										<th>ราคา</th>
									</tr>
								</thead>
								<tbody>
									<?php

									$sqldetail = "SELECT *FROM orders_detail WHERE OrderID = '".$roworder['OrderID']."'  ";
									$resultdetail = $con->query($sqldetail);

									while($rowdetail = $resultdetail->fetch_assoc()) {
										$sqlpro = "SELECT * FROM product where ProductID = '".$rowdetail['ProductID']."' ";
										$resultpro = $con->query($sqlpro);
										$rowpro = mysqli_fetch_assoc($resultpro);
										$sqlcate = "SELECT * FROM category WHERE ID_Category = '".$rowpro['ID_Category']."' ";
										$resultcate=$con->query($sqlcate);
										$rowcate = mysqli_fetch_assoc($resultcate);
										?>
										<tr>
											<td><?php echo $num ;?></td>
											<td><?php echo $roworder['OrderDate'] ;?></td>
											<td><?php echo $rowpro['Product_Name'] ;?></td>
											<td><?php echo $rowpro['Product_Price'] ;?></td>
										</tr>


										<?php $num++;
										$total =  $total + $rowpro['Product_Price'];

									}?>
									<tr>
										<td colspan="3" align="right"><b>ราคารวม+ค่าจัดส่ง</b></td>
										<td align="right"><b> <?php echo number_format($total,2) ;?> บาท</b></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="row">
							<div class="col-sm-10 col-md-10" style="padding-right: 2px;"">
								<div style="float: right;">
									<form action="index.php?pagemenu=dashboard&menu=order-detail" method="post">
										<input type="hidden" name="OrderID" value="<?php echo $roworder['OrderID'];?>" >
										<button type="submit" name="detail-order" class="btn btn-info" >รายละเอียด</button>
									</form>
								</div>
							</div>
							<div class="col-sm-2  col-md-2" style="padding-left: 2px;">
								<div style="float: right;">
									<form action="index.php?pagemenu=dashboard&menu=order-cancel" method="post">
										<input type="hidden" name="OrderID" value="<?php echo $roworder['OrderID'];?>" >
										<button type="submit" class="btn  btn-danger" name="del"  onclick="return confirm('ต้องการยกเลิกรายการนี้?');" >ยกเลิกรายการ</button>
									</form>
								</div>
							</div>
						</div>
						<br>
						<div >
							<div class="row">
								<div class="col-md-3">
									<a href="" class="btn btn-default" role="button" data-toggle="modal" data-target="#pay<?php echo $count;?>"  >แจ้งชำระเงินผ่านธนาคาร</a>
									
								</div>
								<div class="col-md-3">
									<?php include('button-paypal.php');?>
								</div>
							</div>

							

						</div>
					</div>
				</div>


				<div class="modal fade" id="pay<?php echo $count;?>" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h3 class="modal-title"><b>แจ้งการชำระเงินของรายการ: </b><?php echo $roworder['OrderID']?></h3>
							</div>
							<div class="modal-body" >
								<div class="row">
									<form action="index.php?pagemenu=dashboard&menu=checkpayment" method="post">
										<div class="col-md-6">
											<div class="form-group">
												<label for="sel1">ธนาคาร:</label>
												<select class="form-control" name="bank">
													<?php
													$bank = "SELECT * FROM bank ";
													$bankresult = $con->query($bank);
													while ($bankrow = mysqli_fetch_assoc($bankresult)){
														?>
														<option><?php echo $bankrow['Bank'];?></option>
														<?php }?>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="party">วันที่และเวลา:</label>
													<input type="text" name="date" value="" id="startdate"  class="form-control"/>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label >จำนวนเงินที่โอน (บาท) :</label>
													<input type="text" class="form-control" name="amount">
												</div>
											</div>
										</div>
										<input type="hidden" name="UserID" value="<?php echo $_SESSION['UserID']; ?>">
										<input type="hidden" name="OrderID" value="<?php echo $roworder['OrderID']; ?>">
										<input type="hidden" name="total" value="<?php echo $total; ?>">
										<button type="submit" name="submit" class="btn btn-danger">ยืนยัน</button>
									</form>

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-success" data-dismiss="modal">ยกเลิก</button>
								</div>
							</div>

						</div>
					</div>
					<?php $count++; } ?>

				</div>


			</div>
		</div>

		<?php }
	}


	?>
	<script type="text/javascript">
		jQuery('#startdate').datetimepicker();
	</script>
