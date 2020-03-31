<?php
	if ($user_id) {
		header("location: ".BASE_URL);
	}
?>
<div id="container_user_daftar">
	<form action="<?php echo BASE_URL.'proses_daftar.php'; ?>" method="POST">
		<?php
			$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
			$nm_lgkp = isset($_GET['nm_lgkp']) ? $_GET['nm_lgkp'] : false;
			$email = isset($_GET['email']) ? $_GET['email'] : false;
			$hp = isset($_GET['hp']) ? $_GET['hp'] : false;
			$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;

			if ($notif == "require") {
				echo "<div class='notif'> 'Maaf, anda belum bisa melanjutkan pendaftaran, karena data yang anda masukkan tidak lengkap' kata sistemnya Fajar :(</div>";
			}
			elseif ($notif == "password") {
				echo "<div class='notif'> 'Maaf, Password yang anda masukkan tidak sama' kata sistemnya Fajar :(</div>";
			}
			elseif ($notif == "email") {
				echo "<div class='notif'> 'Maaf, E-mail yang anda masukkan sudah terdaftar' kata sistemnya Fajar :(</div>";
			}
		?>
		<div class="element-form">
			<label>Nama Lengkap</label>
			<span>
				<input type="text" name="nm_lgkp" placeholder="Masukkan Nama" value="<?php echo $nm_lgkp; ?>">
			</span>
		</div>
		<div class="element-form">
			<label>E-Surat</label>
			<span>
				<input type="text" name="email" placeholder="Masukkan E-Surat" value="<?php echo $email; ?>">
			</span>
		</div>
		<div class="element-form">
			<label>Nomor Telphone/HP</label>
			<span><input type="text" name="hp" placeholder="Masukkan Nomor Telphone/HP" value="<?php echo $hp; ?>"></span>
		</div>
		<div class="element-form">
			<label>Alamat</label>
			<span><textarea name="alamat" placeholder="Masukkan Alamat" ><?php echo $alamat; ?></textarea></span>
		</div>
		<div class="element-form">
			<label>Kata Pas</label>
			<span><input type="password" name="password" placeholder="Masukkan Kata Pas"></span>
		</div>
		<div class="element-form">
			<label>Kata Pas Ulang</label>
			<span><input type="password" name="retype" placeholder="Masukkan Ulang Kata Pas"></span>
		</div>
		<div class="element-form">
			<span><input type="submit" name="proses" value="Daftar"></span>
		</div>
	</form>
</div>