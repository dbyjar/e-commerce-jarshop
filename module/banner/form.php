<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href='<?= BASE_URL ?>'><i class="fa fa-home"></i> Home</a>
					<a href="<?= BASE_URL."index.php?page=menu&module=banner&action=list" ?>">Banner </a>
					<span>
						<?= isset($_GET['banner_id']) ? 'Edit' : 'Add'; ?>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<?php
       
    $banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : "";
       
    $banner = "";
    $link = "";
    $gambar = "";
	$keterangan_gambar = "";
    $status = "";
       
    $button = "Add";
       
    if($banner_id != "")
    {
        $button = "Update";
		
        $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE banner_id='$banner_id'");
        $row=mysqli_fetch_array($queryBanner);
           
		$banner = $row["banner"];
		$link = $row["link"];
		$gambar = "<img src='". BASE_URL."images/banner/$row[gambar]' style='width: 700px;vertical-align: middle;' />";
		$keterangan_gambar = "* Choose File for update your item picture";
		$status = $row["status"];
    }   
?>

<form action="<?php echo BASE_URL."module/banner/action.php?banner_id=$banner_id"?>" method="post" enctype="multipart/form-data" class="mt-5">
	<div class="form-row">
		<div class="form-group col-md-4">
			<label>Name Banner</label>
			<input type="text" class="form-control" name="banner" value="<?php echo $banner; ?>" />
		</div>
		<div class="form-group col-md-8">
			<label>Link</label>
			<input type="text" class="form-control" name="link" value="<?php echo $link; ?>" />
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-8">
		<label>Photo Product</label>
		<div class="custom-file">
			<input type="file" class="custom-file-input" name="file" />
			<label class="custom-file-label" for="customFile">Choose file</label>
		</div>
		<small><?php echo $keterangan_gambar; ?></small>
		</div>
		<div class="form-group col-md-4 d-flex justify-content-center">
		<?php echo $gambar; ?>
		</div>
	</div>	  
	<div class="form-group">
		<label>Status</label>
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
	<button type="submit" class="btn btn-primary" name="button" value="<?php echo($button); ?>" >
		Submit
	</button>	
</form>