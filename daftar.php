<?php
	if ($user_id) {
		header("location: ".BASE_URL);
	}
?>

<!-- <div class="container"> -->
<div class="card">
	<article class="card-body mx-auto" style="max-width: 400px;">
		<h4 class="card-title mt-3 text-center">Create Account</h4>
		<?php
			$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
			$nm_lgkp = isset($_GET['nm_lgkp']) ? $_GET['nm_lgkp'] : false;
			$email = isset($_GET['email']) ? $_GET['email'] : false;
			$hp = isset($_GET['hp']) ? $_GET['hp'] : false;
			$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;

			if ($notif == "require") {
				echo "<p class='notif text-center'>Maaf, anda belum bisa melanjutkan pendaftaran, karena data yang anda masukkan tidak lengkap</p>";
			} elseif ($notif == "password") {
				echo "<p class='notif text-center'>Maaf, Password yang anda masukkan tidak sama</p>";
			} elseif ($notif == "email") {
				echo "<p class='notif text-center'>Maaf, E-mail yang anda masukkan sudah terdaftar</p>";
			} else {
				echo "<p class='text-center'>Get started with your account</p>";
			}

		?>
		
		<form action="<?php echo BASE_URL.'proses_daftar.php'; ?>" method="POST">
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fa fa-user"></i> </span>
				</div>
				<input name="nm_lgkp" class="form-control" placeholder="Full name" type="text" value="<?php echo $nm_lgkp; ?>">
			</div> <!-- form-group// -->
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
				</div>
				<input name="email" class="form-control" placeholder="Email address" type="email" value="<?php echo $email; ?>">
			</div> <!-- form-group// -->
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
				</div>
				<input name="hp" class="form-control" placeholder="Phone number" type="text" value="<?php echo $hp; ?>">
			</div> <!-- form-group// -->
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fa fa-building"></i> </span>
				</div>
				
				<input class="form-control" name="alamat" value="<?php echo $alamat; ?>" placeholder="Address" type="text">
			</div> <!-- form-group end.// -->
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
				</div>
				<input class="form-control" placeholder="Create password" type="password" name="password">
			</div> <!-- form-group// -->
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
				</div>
				<input class="form-control" placeholder="Repeat password" type="password" name="retype">
			</div> <!-- form-group// -->                                      
			<div class="form-group">
				<button type="submit" name="proses" value="Daftar" class="btn btn-primary btn-block"> Create Account </button>
			</div> <!-- form-group// -->      
			<p class="text-center">Have an account? <a href='<?= BASE_URL."index.php?page=masuk" ?>'>Log In</a> </p>                                                                 
		</form>
	</article>
</div>
<!-- card.// -->

<!-- </div>  -->