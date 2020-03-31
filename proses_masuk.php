<?php

	include_once("function/koneksi.php");
	include_once("function/pembantu.php");
	
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	
	$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email='$email' AND password='$password' AND status='on'");
	
	if(mysqli_num_rows($query) == 0)
	{
		header("location:".BASE_URL."index.php?page=masuk&notif=true");
	}
	else
	{
	
		$row = mysqli_fetch_assoc($query);
		
		session_start();
		
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['level'] = $row['level'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['alamat'] = $row['alamat'];
		$_SESSION['phone'] = $row['phone'];
		
		if(isset($_SESSION["proses_pesanan"])){
			unset($_SESSION["proses_pesanan"]);
			header("location: ".BASE_URL."index.php?page=data_pemesan");
		}
		else
		{
			header("location: ".BASE_URL."index.php?page=main");
		}
	}