<?php
	
	session_start();
	
	include_once ("function/pembantu.php");
	include_once ("function/koneksi.php");

	$barang_id = $_GET['barang_id'];
	$user_id = $_SESSION['user_id'];
	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : false;

	$query=mysqli_query($koneksi, "SELECT nama_barang, gambar, harga FROM barang WHERE barang_id='$barang_id'");
	$row = mysqli_fetch_assoc($query);

	$keranjang[$barang_id] = array("user_id" => $_SESSION['user_id'],
									"nama_barang" => $row["nama_barang"],
									"gambar" => $row["gambar"],
									"harga" => $row["harga"],
									"kuantiti" => 1 );

	$_SESSION["keranjang"] = $keranjang;

	/*echo "<pre>";
	print_r($keranjang);
	echo "</pre>";*/
	header("location:".BASE_URL);
?>