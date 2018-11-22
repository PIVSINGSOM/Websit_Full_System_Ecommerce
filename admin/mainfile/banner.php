<?php
$sql =  "SELECT * FROM banner ";
$result = $con->query($sql);

?>
<div class="container">
	<form action="mainfile/addbanner.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="exampleInputFile">เลือก Banner</label>
			<input type="file"  name="pic">

		</div>
		<button type="submit" class="btn btn-success">เพิ่ม</button>
	</form>
	<br>
	<table class="table">
		<tr>
			<th>#ID</th>
			<th>Image</th>
			<th>แก้ไข</th>
			<th><th>
		</tr>
		<?php 
		while($row = mysqli_fetch_assoc($result)){
		?>
		<tr>
			<td><?php echo $row['ID'];?></td>
			<td><img src="../images/<?php echo $row['Image'];?>" style="width: 300px;height: 100px;" ></td>
			<td>
			<form action="mainfile/updatebanner.php" method="post" enctype="multipart/form-data" >
				<input type="file"  name="pic">
				<br>
				<input type="hidden" name="id" value="<?php echo $row['ID'];?>">
				<button type="submit" class="btn btn-warning">แก้ไข</button>
			</form>
			</td>
			<td>
				<form action="mainfile/deletebanner.php" method="post" >
					<input type="hidden" name="id" value="<?php echo $row['ID'];?>">
				<button type="submit" class="btn btn-danger">ลบ</button>
			</form>
			</td>
		</tr>
		<?php }?>
		
	</table>
</div>
