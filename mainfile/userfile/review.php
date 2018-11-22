<?php
$sql = "SELECT *FROM member_user WHERE UserID = '".$_SESSION['UserID']."' ";
$result = $con->query($sql);
$row = mysqli_fetch_assoc($result);

$sqlorder = "SELECT *FROM orders WHERE UserID = '".$_SESSION['UserID']."' and Paid ='Yes' and Delivery = 'Yes' ";
$resultorder = $con->query($sqlorder);
$count=1;
?>


<div class="container">

	<div class="row">

		<div class="col-sm-3 col-md-3">
			<?php include('menu.php');?>
		</div>
		<div class="col-sm-9 col-md-9">
			<br><br>
			<h3>รีวิวสินค้า</h3>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>วันที่</th>
						<th>รายละเอียด</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php while($roworder = $resultorder->fetch_assoc()) { 
						
						$review = "SELECT * FROM review WHERE OrderID = '".$roworder['OrderID']."' ";
						$reviewresult = $con->query($review);
						$reviewrow = mysqli_fetch_assoc($reviewresult);
						?>
						<tr>
							<td><?php echo $roworder['OrderID'] ?></td>
							<td><?php echo $roworder['OrderDate'] ?></td>
							<td>
								<form action="index.php?pagemenu=dashboard&menu=order-detail" method="post">
									<input type="hidden" name="OrderID" value="<?php echo $roworder['OrderID'];?>" >
									<button type="submit" name="detail-order" class="btn btn-info" >รายละเอียด</button>
								</form>
							</td>
							<td>
								<?php if(empty($reviewrow['Detail'])){?>
								<a href="" class="btn btn-warning" role="button" data-toggle="modal" data-target="#review<?php echo $count;?>"  >รีวิว</a>
								<?php }?>
								<?php if(!empty($reviewrow['Detail'])){?>
								<a class="btn btn-warning" disabled>รีวิวเรียบร้อยแล้ว</a>
								<?php }?>
							</td>
							<div class="modal fade" id="review<?php echo $count;?>" role="dialog">
								<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h3 class="modal-title">รีวิวรายการที่: <?php echo $roworder['OrderID']?></h3>
										</div>
										<div class="modal-body" >
											<form action="index.php?pagemenu=dashboard&menu=save-review" method="post">
												<div class="form-group">
													<label >รายละเอียด:</label>
													<textarea name="detail" class="form-control"></textarea>
												</div>
												<div class="form-group">
													<label >คะแนน (ดาว):</label>
													<select class="form-control" name="star">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													</select>
												</div>
												<input type="hidden" name="OrderID" value="<?php echo $roworder['OrderID']; ?>">
												<button type="submit" name="add" class="btn btn-danger">บันทึกการรีวิว</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</tr>
						<?php $count++; }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>