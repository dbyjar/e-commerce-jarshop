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

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jarshop</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Favicon -->
    <link href="images/ico/icon.png" type="images/x-icon" rel="shortcut icon" />

    <!-- Js -->
    <script src="./vendor/js/jquery-3.3.1.min.js"></script>

    <!-- Css Styles -->
    <link rel="stylesheet" href="./vendor/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./vendor/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./vendor/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./vendor/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./vendor/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="./vendor/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./vendor/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./vendor/css/style.css" type="text/css">
    <!-- <link rel="stylesheet" href="./css/style.css" type="text/css"> -->
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <!-- KERANJANG -->
            <?php
                if ($totalBarang != 0) {
                    echo "<li>
                    <a href='".BASE_URL."index.php?page=keranjang' id='tombol-keranjang'>
                    <span class='icon_bag_alt'></span>
                    <div class='tip'>$totalBarang</div>
                    </a>
                    </li>";
                }
                elseif ($user_id == true) {
                    echo "<li>
                    <a href='".BASE_URL."index.php?page=keranjang' id='tombol-keranjang'>
                    <span class='icon_bag_alt'></span>
                    </a>
                    </li>";
                }
                else {
                    false;
                }
            ?>
        </ul>
        <div class="offcanvas__logo">
            <!-- LOGO -->
            <a href="<?php echo BASE_URL ?>"><img src="<?php echo BASE_URL."images/logo.png"; ?>" alt="Logo" class="img-fluid"></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
          <!-- AUTH -->
          <?php
                if ($user_id) {
                    echo "<a href='".BASE_URL."index.php?page=menu&module=profile&action=list'><p>$nama</p></a>";
                }
                else {
                    echo "<a href='".BASE_URL."index.php?page=masuk'>Login</a>
                    <a href='".BASE_URL."index.php?page=daftar'>Register</a>";
                }
            ?>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="header__logo">
                        <!-- LOGO -->
                        <a href="<?php echo BASE_URL ?>"><img src="<?php echo BASE_URL."images/logo.png"; ?>" alt="Logo" class="img-fluid"></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <nav class="header__menu justify-content-center d-flex">
                        <ul>
                            <!-- MENU -->
                            <li <?php if($page == ""){ echo "class='active'"; } ?> >
                                <a href="<?= BASE_URL ?>">Home</a>
                            <li <?php if($page == "shop"){ echo "class='active'"; } ?> >
                                <a href='<?= BASE_URL."index.php?page=shop" ?>'>Shop</a>
                            </li>
                            <li <?php if($page == "contact"){ echo "class='active'"; } ?> >
                                <a href="./contact.html">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth"> 
                        <!-- AUTH -->
                        <?php
                            if ($user_id) {
                                echo "<a href='".BASE_URL."index.php?page=menu&module=profile&action=list'><p>$nama</p></a>";
                            }
                            else {
                                echo "<a href='".BASE_URL."index.php?page=masuk'>Login</a>
                                <a href='".BASE_URL."index.php?page=daftar'>Register</a>";
                            }
                        ?>
                        </div>
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <!-- <li><a href="#"><span class="icon_heart_alt"></span>
                                <div class="tip">2</div></a>
                            </li> -->
                            <!-- KERANJANG -->
                            <?php
                                if ($totalBarang != 0) {
                                    echo "<li>
                                    <a href='".BASE_URL."index.php?page=keranjang' id='tombol-keranjang'>
                                    <span class='icon_bag_alt'></span>
                                    <div class='tip'>$totalBarang</div>
                                    </a>
                                    </li>";
                                }
                                elseif ($user_id == true) {
                                    echo "<li>
                                    <a href='".BASE_URL."index.php?page=keranjang' id='tombol-keranjang'>
                                    <span class='icon_bag_alt'></span>
                                    </a>
                                    </li>";
                                }
                                else {
                                    false;
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
	<!-- Header Section End -->
	
  <!--  -->
  <?php
    $namafile = "$page.php";

    if (file_exists($namafile)) {
      include_once($namafile);
    }
    else{
      include_once("main.php");
    }
  ?>
  <!--  -->

  <!-- Footer Section Begin -->
  <footer class="footer">
      <div class="container">
          <div class="row">
              <div class="col-lg-4 col-md-6 col-sm-7">
                  <div class="footer__about">
                      <div class="footer__logo">
                          <a href="<?= BASE_URL ?>"><img src="<?php echo BASE_URL."images/logo.png"; ?>" alt="Logo" ></a>
                      </div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                      cilisis.</p>
                      <div class="footer__payment">
                          <a href="#"><img src="./vendor/img/payment/payment-1.png" alt=""></a>
                          <a href="#"><img src="./vendor/img/payment/payment-2.png" alt=""></a>
                          <a href="#"><img src="./vendor/img/payment/payment-3.png" alt=""></a>
                          <a href="#"><img src="./vendor/img/payment/payment-4.png" alt=""></a>
                          <a href="#"><img src="./vendor/img/payment/payment-5.png" alt=""></a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-2 col-md-3 col-sm-5">
                  <div class="footer__widget">
                      <h6>Quick links</h6>
                      <ul>
                          <li><a href="#">About</a></li>
                          <li><a href="#">Blogs</a></li>
                          <li><a href="#">Contact</a></li>
                          <li><a href="#">FAQ</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-2 col-md-3 col-sm-4">
                  <div class="footer__widget">
                      <h6>Account</h6>
                      <ul>
                          <li><a href='<?= BASE_URL."index.php?page=menu&module=profile&action=list" ?>'>My Account</a></li>
                          <li><a href='<?= BASE_URL."index.php?page=keranjang" ?>'>Orders Tracking</a></li>
                          <li><a href='<?= BASE_URL."index.php?page=data_pemesan" ?>'>Checkout</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-4 col-md-8 col-sm-8">
                  <div class="footer__newslatter">
                      <h6>NEWSLETTER</h6>
                      <form action="#">
                          <input type="text" placeholder="Email">
                          <button type="submit" class="site-btn">Subscribe</button>
                      </form>
                      <div class="footer__social">
                          <a href="#"><i class="fa fa-facebook"></i></a>
                          <a href="#"><i class="fa fa-twitter"></i></a>
                          <a href="#"><i class="fa fa-youtube-play"></i></a>
                          <a href="#"><i class="fa fa-instagram"></i></a>
                          <a href="#"><i class="fa fa-pinterest"></i></a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-12">
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  <div class="footer__copyright__text">
                      <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                  </div>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </div>
          </div>
      </div>
  </footer>
  <!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->
	
	<!-- Js Plugins -->
	
	<script src="./vendor/js/bootstrap.min.js"></script>
	<script src="./vendor/js/jquery.magnific-popup.min.js"></script>
	<script src="./vendor/js/jquery-ui.min.js"></script>
	<script src="./vendor/js/mixitup.min.js"></script>
	<script src="./vendor/js/jquery.countdown.min.js"></script>
	<script src="./vendor/js/jquery.slicknav.js"></script>
	<script src="./vendor/js/owl.carousel.min.js"></script>
	<script src="./vendor/js/jquery.nicescroll.min.js"></script>
	<script src="./vendor/js/main.js"></script>
</body>

</html>