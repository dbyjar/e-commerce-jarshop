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

<form action="<?php echo BASE_URL."module/profile/aksi.php?user_id=$user_id"; ?>"
	method="POST" enctype="multipart/form-data">
	<div class="element-form">
		<label>Nama</label>
		<span>
			<input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
			<input type="text" name="nama" value="<?php echo $nama; ?>" />
		</span>
	</div>
	<div class="element-form">
		<label>E-mail</label>
		<span><input type="text" name="email" value="<?php echo $email; ?>" /></span>
	</div>
	<div class="element-form">
		<label>Phone</label>
		<span><input type="text" name="phone" value="<?php echo $phone; ?>" /></span>
	</div>
	<div class="element-form">
		<label>Alamat</label>
		<span><textarea name="alamat" id="editor"><?php echo $alamat; ?></textarea></span>
	</div>
	<div class="element-form">
		<label>Password</label>
		<placeholder>* Masukkan password anda untuk melanjutkan perubahan data anda</placeholder>
		<span><input type="password" name="password" /></span><br>
	</div>
	<!--div class="element-form">
		<label>Gambar Produk <?php //echo $keterangan_gambar; ?></label>
		<span>
			<input type="file" name="file" /> <?php //echo $gambar; ?>
		</span>
	</div-->	
	<div class="element-form">
		<span>
			<placeholder>* Kamu akan keluar untuk memperbarui data, lanjutkan? ></placeholder>
			<input type="submit" name="button" value="Update" />
		</span>
	</div>
</form>