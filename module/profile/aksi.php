<?php

	include_once("../../function/koneksi.php");
	include_once("../../function/pembantu.php");

	$user_id = $_POST['user_id'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$alamat = $_POST['alamat'];
	$password = md5($_POST['password']);
	$status = "on";
	$level = "customer";
	$button = $_POST['button'];
	
	if($button == "Update")
	{
		mysqli_query($koneksi, "UPDATE user SET user_id='$user_id',
												  nama='$nama',
												  email='$email',
												  phone='$phone',
												  alamat='$alamat',
												  level='$level',
												  status='$status',
												  password='$password' WHERE user_id='$user_id'");
	}
	
	header("location: ".BASE_URL."keluar.php");