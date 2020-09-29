<?php
	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href='<?= BASE_URL ?>'><i class="fa fa-home"></i> Home</a>
					<a href="<?= BASE_URL."index.php?page=menu&module=kategori&action=list" ?>">Category </a>
					<span>
						<?= isset($_GET['kategori_id']) ? 'Edit' : 'Add'; ?>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<?php
	$kategori ="";
	$status ="";
	$button ="+ Tambah";

	if ($kategori_id) {
		$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori_id='$kategori_id'");
		$row = mysqli_fetch_assoc($queryKategori);

		$kategori = $row['kategori'];
		$status = $row['status'];
		$button = "Update";
	}

?>

<form action="<?php echo BASE_URL."module/kategori/aksi.php?kategori_id=$kategori_id"; ?>" method="POST" class="mt-5">
	<div class="form-group">
		<label>Category</label>
		<input type="etextmail" name="kategori" value="<?php echo($kategori); ?>" class="form-control" placeholder="Enter category">
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