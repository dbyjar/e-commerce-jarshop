<?php
	if ($user_id) {
		header("location: ".BASE_URL);
	}
?>

<!-- <div class="container"> -->
<div class="card">
	<article class="card-body mx-auto" style="max-width: 400px;">
		<h4 class="card-title mt-3 text-center">Login</h4>
		<?php
			$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
			$email = isset($_GET['email']) ? $_GET['email'] : false;

			if ($notif == "daftar") {
				echo "<p class='notif text-center'>Selamat anda telah terdaftar, silahkan masuk untuk mengakses web kami</p>";
			} elseif ($notif == "true") {
				echo "<p class='notif text-center'>Maaf, E-mail dan Password yang anda masukkan tidak cocok</p>";
			} elseif ($notif == "keluar") {
				echo "<p class='notif text-center'>Yey, anda berhasil keluar, mau masuk lagi?</p>";
			} else {
				echo "<p class='text-center'>Get started with your account</p>";
			}
		?>
		
		<form action="<?php echo BASE_URL.'proses_masuk.php'; ?>" method="POST">
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fa fa-user"></i> </span>
				</div>
				<input name="email" class="form-control" placeholder="Email address" type="email">
			</div> <!-- form-group// -->
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
				</div>
				<input class="form-control" placeholder="Create password" type="password" name="password">
			</div> <!-- form-group// -->                                     
			<div class="form-group">
				<button type="submit" name="masuk" value="Masuk" class="btn btn-primary btn-block"> Login </button>
			</div> <!-- form-group// -->      
			<p class="text-center">Create account here <a href='<?= BASE_URL."index.php?page=daftar" ?>'>Sign Up</a> </p>                                                                 
		</form>
	</article>
</div>
<!-- card.// -->

<!-- </div>  -->