<?php

	include_once ("function/pembantu.php");
	include_once ("function/koneksi.php");

	$level = "customer";
	$nm_lgkp = $_POST['nm_lgkp'];
	$email = $_POST['email'];
	$hp = $_POST['hp'];
	$alamat = $_POST['alamat'];
	$password = $_POST['password'];
	$retype = $_POST['retype'];
	$status = "on";

	unset($_POST['password']);
	unset($_POST['retype']);
	$dataForm = http_build_query($_POST);
	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email'");

	if (empty($nm_lgkp) || empty($email) || empty($hp) || empty($hp) || empty($alamat) || empty($password) || empty($retype)) {
		header("location: ".BASE_URL."index.php?page=daftar&notif=require&$dataForm");
	}
	elseif ($password != $retype) {
		header("location: ".BASE_URL."index.php?page=daftar&notif=password&$dataForm");
	}
	elseif (mysqli_num_rows($query) == 1) {
		header("location: ".BASE_URL."index.php?page=daftar&notif=email&$dataForm");
	}
	else
	{
		$password = md5($password);
		mysqli_query($koneksi, "INSERT INTO user (level, nama, email, alamat, phone, password, status) VALUES ('$level','$nm_lgkp','$email','$alamat','$hp','$password','$status')");

		header("location: ".BASE_URL."index.php?page=masuk&notif=daftar");	
	}