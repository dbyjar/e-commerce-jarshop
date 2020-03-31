<?php
	include_once ("function/pembantu.php");
	include_once ("function/koneksi.php");

	$queryfact = mysqli_query($koneksi, "SELECT * FROM barang WHERE status='on'
					AND barang_id='15'");
	$row = mysqli_fetch_assoc($queryfact);
					
	echo "<li>
			<p class='price'>".rupiah($row['harga'])."</p>
			<div class='keterangan-gambar'>
				<p><a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>$row[nama_barang]</a></p>
				<span>Stok : $row[stok]</span>
			</div>
			";
				
?>

<?php

	$querySession = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");
	$rowSession = mysqli_fetch_assoc($querySession);
	$nama = $rowSession['nama'];
	$level = $rowSession['level'];
	$email = $rowSession['email'];
	$phone = $rowSession['phone'];
	$alamat = $rowSession['alamat'];
?>

<!-- ".$rowSession['nama']." -->