<?php

	$pesanan_id = $_GET["pesanan_id"];

	$query = mysqli_query($koneksi, "SELECT status FROM pesanan WHERE pesanan_id='$pesanan_id'");
	$row=mysqli_fetch_assoc($query);
	$status = $row['status'];
	
?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href='<?= BASE_URL ?>'><i class="fa fa-home"></i> Home</a>
					<a href="<?= BASE_URL."index.php?page=menu&module=pesanan&action=list" ?>">Order </a>
					<span>Update Status</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<div class="container my-5">
	<div class="row">	
		<div class="col-md-12">
			<form action="<?php echo BASE_URL."module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST" style="width: 21rem;">
		<div class="form-group">
			<label>Order ID</label>
			<input type="text" class="form-control" value="<?php echo $pesanan_id; ?>" name="pesanan_id" readonly />
		</div>
		<div class="form-group">
			<label>Status</label>
			<select class="form-control" name="status">
				<?php
						
					foreach($arrayStatusPesanan AS $key => $value){
						if($status == $key){
							echo "<option value='$key' selected='true'>$value</option>";
						} else {
							echo "<option value='$key'>$value</option>";
						}
					}
				
				?>
			</select>
		</div>
		<button type="submit" type="submit" value="Edit Status" name="button" class="btn btn-primary">Submit</button>
	</form>
		</div>
	</div>
	
</div>