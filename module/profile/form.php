<?php

	$user_id = $_SESSION['user_id'];
	$nama = $_SESSION['nama'];
	$email = $_SESSION['email'];
	$phone = $_SESSION['phone'];
	$alamat = $_SESSION['alamat'];

	$queryP = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");
	$row = mysqli_fetch_assoc($queryP);

	$status = $row['status'];

?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href='<?= BASE_URL ?>'><i class="fa fa-home"></i> Home</a>
					<a href='<?= BASE_URL."index.php?page=menu&module=profile&action=list" ?>'>Profile </a>
					<span>Update</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
	<div class="container">
		<form action="<?php echo BASE_URL."module/profile/aksi.php?user_id=$user_id"; ?>" method="POST" class="checkout__form">
			<div class="row">
				<div class="col-lg-12">
					<h5>Profile detail</h5>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="checkout__form__input">
								<p>Full Name <span>*</span></p>
								<input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
								<input type="text" name="nama" value="<?php echo $nama; ?>" />
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="checkout__form__input">
								<p>Email <span>*</span></p>
								<input type="text" name="email" value="<?php echo $email; ?>" />
							</div>
						</div>
						<div class="col-lg-12">
							<div class="checkout__form__input">
								<p>Address <span>*</span></p>
								<input type="text"name="alamat" value="<?php echo $alamat; ?>">
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="checkout__form__input">
								<p>Phone <span>*</span></p>
								<input type="text" name="phone" value="<?php echo $phone; ?>" />
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="checkout__form__input">
								<p>Password <span>*</span></p>
								<input type="password" name="password" placeholder="You should inpur your password for returning update data"/>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="checkout__form__input">
							<p><span>*</span> You'll signing out for update data</p>
							<input type="submit" name="button" value="Update"/>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
<!-- Checkout Section End -->