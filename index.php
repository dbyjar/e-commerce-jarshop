<?php
	session_start();
	include_once ("function/pembantu.php");
	include_once ("function/koneksi.php");

	$page = isset($_GET['page']) ? $_GET['page'] : false;
	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

	$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
	$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
	$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
	$email = isset($_SESSION['email']) ? $_SESSION['email'] : false;
	$alamat = isset($_SESSION['alamat']) ? $_SESSION['alamat'] : false;
	$phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : false;

	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
	$totalBarang = count($keranjang);

	// echo "<pre>";
	// print_r($keranjang);
	// echo "</pre>";

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Fajar | Ada Apaan Aja</title>

		<link href="<?php echo BASE_URL."images/fav.ico"; ?>" type="images/x-icon" rel="shortcut icon" />
		<link href="<?php echo BASE_URL."css/style.css"; ?>" type="text/css" rel="stylesheet" />
		<link href="<?php echo BASE_URL."css/banner.css"; ?>" type="text/css" rel="stylesheet" />
		
		<script src="<?php echo BASE_URL."js/jquery-3.1.1.min.js"; ?>"></script>
		<script src="<?php echo BASE_URL."js/Slides-SlidesJS-3/source/jquery.slides.min.js"; ?>"></script>
		
		<script>
		$(function() {
			$('#slides').slidesjs({
				height: 350,
				play: { auto : true,
					    interval : 3000
					  },
				navigation : false
			});
		});
		</script>
	</head>
	<body>
		<div id="container">
			<div id="pala">
				<a href="<?php echo BASE_URL.'index.php?page=main'; ?>">
					<center>
						<img src="<?php echo BASE_URL.'images/logo.png'; ?>" />
					</center>
				</a>
				<div id="sosial">
					<span style="margin-left: 10px;">Fajar AL Hakim</span>
					<a href="http://facebook.com/fajaral.8">
						<img src="images/fb_ico.png" />
					</a>
					<a href="http://instagram.com/fakejar_">
						<img class="ig" src="images/ig_ico.png" />
					</a>
					<a href="http://bit.ly/fajaralyt">
						<img src="images/yt_ico.png" />
					</a>
				</div>
			</div>
			<div id="menu">
				<div id="user">
					<?php
						if ($user_id) {
							echo "<a href='".BASE_URL."index.php?page=menu&module=profile&action=list'>=</a>";
							echo "<span style='margin-right: 10px;'>|</span>";
							echo "HI,<a href='".BASE_URL."index.php?page=menu&module=profile&action=list'>$nama</a>";
						}
						else
						{
							echo "<a href='".BASE_URL."index.php?page=daftar'>Daftar</a>
								  <a href='".BASE_URL."index.php?page=masuk'>Masuk</a>";
						}
					?>
				</div>
					<?php
						if ($totalBarang != 0) {
								echo "<a href='".BASE_URL."index.php?page=keranjang' id='tombol-keranjang'>
										<img src='".BASE_URL."images/cart.png' />
										<span class='nomor'>$totalBarang</span>
									</a>";
						}
						elseif ($user_id == true) {
							echo "<a href='".BASE_URL."index.php?page=keranjang' id='tombol-keranjang'>
										<img src='".BASE_URL."images/cart.png' />
									</a>";
						}
						else
						{
							false;
						}
					?>
			</div>
			<div id="badan">
				<?php
					$namafile = "$page.php";

					if (file_exists($namafile)) {
						include_once($namafile);
					}
					else{
						include_once("main.php");
					}
				?>
			</div>
			<div id="kaki">
				<marquee behavior="alternate">
					"Terimakasih sudah berkunjung" , Fajar Apa Adanya berkata :))
				</marquee>
			</div>
			<div id="kaki-kaki">
				<center><p>Copyright 2019 | Fajar punya WEB</p></center>
			</div>
		</div>
	</body>
</html>