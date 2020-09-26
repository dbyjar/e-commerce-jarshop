<?php
	
	$pesanan_id= $_GET["pesanan_id"];
	
	$query = mysqli_query($koneksi, "SELECT pesanan.nama_penerima, pesanan.nomor_telepon, pesanan.alamat, pesanan.tanggal_pemesanan, user.nama, kota.kota, kota.tarif FROM pesanan JOIN user ON pesanan.user_id=user.user_id JOIN kota ON kota.kota_id=pesanan.kota_id WHERE pesanan.pesanan_id='$pesanan_id'");
	
	$row=mysqli_fetch_assoc($query);
	
	$tanggal_pemesanan = $row['tanggal_pemesanan'];
	$nama_penerima = $row['nama_penerima'];
	$nomor_telepon = $row['nomor_telepon'];
	$alamat = $row['alamat'];
	$tarif = $row['tarif'];
	$nama = $row['nama'];
	$kota = $row['kota'];
	
?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__links">
          <a href="./index.html"><i class="fa fa-home"></i> Home</a>
          <span>Details Order</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
  <div class="container">
    <form action="#" class="checkout__form">
      <div class="row">
        <div class="col-lg-8">
          <h5>Details Order</h5>
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="checkout__form__input">
                <p>No. Factur</p>
                <input type="text" value="<?= $pesanan_id; ?>" readonly>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-6">
              <div class="checkout__form__input">
                <p>Name Order</p>
                <input type="text" value="<?= $nama; ?>" readonly>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="checkout__form__input">
                <p>Name Deliver</p>
                <input type="text" value="<?= $nama_penerima; ?>" readonly>
              </div>
              <div class="checkout__form__input">
                <p>Address</p>
                <input type="text" value="<?= $alamat; ?>" readonly>
              </div>
              <div class="checkout__form__input">
                <p>Number</p>
                <input type="text" value="<?= $nomor_telepon; ?>" readonly>
              </div>
              <div class="checkout__form__input">
                <p>Date Order</p>
                <input type="text" value="<?= $tanggal_pemesanan; ?>" readonly>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="checkout__form__checkbox">
                <!-- <label for="acc">
                Create an acount?
                  <input type="checkbox" id="acc">
                  <span class="checkmark"></span>
                </label> -->
                <p>Silahkan Lakukan pembayaran ke Bank nya Fajar<br/>
                Nomor Account : 0000-9999-8888 (A/N Fajar Apa Adanya).<br/>
                Setelah melakukan pembayaran silahkan lakukan konfirmasi pembayaran 
                <a href="<?php echo BASE_URL."index.php?page=menu&module=pesanan&action=konfirmasi_pembayaran&pesanan_id=$pesanan_id"?>">Disini</a>.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="checkout__order">
            <h5>Your order</h5>
          <div class="checkout__order__product">
            <ul>
              <li>
                <span class="top__text">Product</span>
                <span class="top__text__right">Total</span>
              </li>
              <?php

              $queryDetail = mysqli_query($koneksi, "SELECT pesanan_detail.*, barang.nama_barang FROM pesanan_detail JOIN barang ON pesanan_detail.barang_id=barang.barang_id WHERE pesanan_detail.pesanan_id='$pesanan_id'");

              $subtotal = 0;
              while($rowDetail=mysqli_fetch_assoc($queryDetail)){

              $total = $rowDetail["harga"] * $rowDetail["quantity"];
              $subtotal = $subtotal + $total;

              echo "<li>$rowDetail[quantity] x $rowDetail[nama_barang] <span>".rupiah($total)."</span></li>";
              }

              $subtotal = $subtotal + $tarif;
              ?>
            </ul>
          </div>
          <div class="checkout__order__total">
            <ul>
              <li>Shipping <span><?php echo rupiah($tarif); ?></span></li>
              <li>Total <span><?php echo rupiah($subtotal); ?></span></li>
            </ul>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<!-- Checkout Section End -->

<style>
  .checkout__order__total {
    border-bottom: none;
    margin-bottom: 0px;
  }
</style>