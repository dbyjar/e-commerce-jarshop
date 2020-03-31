<?php
	if ($user_id) {
		header("location: ".BASE_URL);
	}
?>
<div id="container_user_daftar">
	<form action="<?php echo BASE_URL.'proses_masuk.php'; ?>" method="POST">
		<?php
			$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
			$email = isset($_GET['email']) ? $_GET['email'] : false;

			if ($notif == "daftar") {
				echo "<div class='notif'> 'Selamat anda telah terdaftar, silahkan masuk untuk mengakses web kami' kata sistemnya Fajar :)</div>";
			}
			elseif ($notif == "true") {
				echo "<div class='notif'> 'Maaf, E-mail dan Password yang anda masukkan tidak cocok' kata sistemnya Fajar :(</div>";
			}
			elseif ($notif == "keluar") {
				echo "<div class='notif'> 'Yey, anda berhasil keluar, mau masuk lagi?' kata sistemnya Fajar :P</div>";
			}
		?>
		<div class="element-form">
			<label>E-mail</label>
			<span><input type="text" name="email"></span>
		</div>
		<div class="element-form">
			<label>Password</label>
			<span><input type="password" name="password"></span>
		</div>
		<div class="element-form">
			<span><input type="submit" name="masuk" value="Masuk"></span>
		</div>
		<div class="element-form">
			<span>
				<a href="<?php echo BASE_URL.'index.php?page=daftar'; ?>">
					< Buat akun
				</a>
			</span>
		</div>
	</form>
</div>