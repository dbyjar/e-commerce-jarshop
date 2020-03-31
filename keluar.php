<?php
	session_start();
	include_once ("function/pembantu.php");

	unset($_SESSION['user_id']);
	unset($_SESSION['nama']);
	unset($_SESSION['level']);

	//echo "Sudah Berhasil Keluar";

	header("location: ".BASE_URL."index.php?page=masuk&notif=keluar");

?>