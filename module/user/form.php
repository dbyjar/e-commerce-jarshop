<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href='<?= BASE_URL ?>'><i class="fa fa-home"></i> Home</a>
					<a href="<?= BASE_URL."index.php?page=menu&module=user&action=list" ?>">User </a>
					
						<?= isset($_GET['user_id']) ? 'Edit' : 'Add'; ?>
					
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<?php
      
    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : false;
	
	$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");
	
	$row = mysqli_fetch_array($queryUser);
	
	$nama = $row["nama"];
	$email = $row["email"];
	$phone = $row["phone"];
	$alamat = $row["alamat"];
	$status = $row["status"];
	$level = $row["level"];
	$button = "Update";
?>

<form action="<?= BASE_URL."module/user/action.php?user_id=$user_id"?>" method="POST" class="mt-5">
	<div class="form-group">
		<label>Nama Lengkap</label>	
		<input class="form-control" type="text" name="nama" value="<?= $nama; ?>" />
	</div>	
	<div class="form-group">
		<label>Email</label>	
		<input class="form-control" type="text" name="email" value="<?= $email; ?>" />
	</div>
	<div class="form-group">
		<label>Alamat</label>	
		<textarea name="alamat" class="form-control" rows="3"><?= $alamat; ?></textarea>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<div class="form-group">
				<label>Phone</label>	
				<input class="form-control" type="text" name="phone" value="<?= $phone; ?>" />
			</div>
		</div>
		<div class="form-group col-md-6">
			<div class="form-group">
				<label>Level</label>
			</div>
			<div class="form-group">
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="level" value="superadmin"
						<?php if($level == "superadmin"){ echo "checked"; } ?> />
					<label class="form-check-label" for="inlineRadio1">Superadmin</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="level" value="customer"
						<?php if($level == "customer"){ echo "checked"; } ?> />
					<label class="form-check-label" for="inlineRadio1">Customer</label>
				</div>
			</div>
		</div>
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