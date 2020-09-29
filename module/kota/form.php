<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href='<?= BASE_URL ?>'><i class="fa fa-home"></i> Home</a>
					<a href="<?= BASE_URL."index.php?page=menu&module=kategori&action=list" ?>">Shipping </a>
					<span>
						<?= isset($_GET['kota_id']) ? 'Edit' : 'Add'; ?>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<?php

	$kota_id = isset($_GET['kota_id']) ? $_GET['kota_id'] : false;
	
	$kota = "";
	$tarif = "";
	$status = "";
	$button = "Add";

	if($kota_id){
		$queryKota = mysqli_query($koneksi, "SELECT * FROM kota WHERE kota_id='$kota_id'");
		$row=mysqli_fetch_assoc($queryKota);
		
		$kota = $row['kota'];
		$tarif = $row['tarif'];
		$status = $row['status'];
		
		$button = "Update";
	}
		
?>

<form action="<?php echo BASE_URL."module/kota/action.php?kota_id=$kota_id"?>" method="POST" class="mt-5">
	<div class="form-group">
		<label>City</label>
		<input type="text" name="kota" value="<?= $kota ?>" class="form-control" placeholder="Enter city">
	</div>
	<div class="form-group">
		<label>Cost</label>
		<input type="text" name="tarif" value="<?= $tarif ?>" class="form-control" placeholder="Enter city">
	</div>
	<label>Status</label>
	<div class="form-group">
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="status" value="on"
				<?php if ($status == 'on') { echo "checked='true'";} ?> />
			<label class="form-check-label" for="inlineRadio1">ON</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="status" value="off"
				<?php if ($status == 'off') { echo "checked='true'";} ?> />
			<label class="form-check-label" for="inlineRadio2">OFF</label>
		</div>
	</div>
	<button type="submit" class="btn btn-primary" name="button" value="<?php echo($button); ?>" >Submit</button>
</form>