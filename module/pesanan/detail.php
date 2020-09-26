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
        <div class="col-lg">
          <h5>Your Order</h5>
          <div class="row">
            
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col" class='text-center'>QTY</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php

                  $queryDetail = mysqli_query($koneksi, "SELECT pesanan_detail.*, barang.nama_barang FROM pesanan_detail JOIN barang ON pesanan_detail.barang_id=barang.barang_id WHERE pesanan_detail.pesanan_id='$pesanan_id'");

                  $no=1;
                  $subtotal = 0;
                  while($rowDetail=mysqli_fetch_assoc($queryDetail)){

                    $total = $rowDetail["harga"] * $rowDetail["quantity"];
                    $subtotal = $subtotal + $total;

                    echo "<tr>
                            <th scope='row'>$no</th>
                            <td>$rowDetail[nama_barang]</td>
                            <td class='text-center'>$rowDetail[quantity]</td>
                            <td>".rupiah($rowDetail['harga'])."</td>
                            <td>".rupiah($total)."</td>
                          </tr>";

                    $no++;
                  }

                  $subtotal = $subtotal + $tarif;
                  ?>
                  
                </tbody>
              </table>
            
            <div class="col-lg-12">
              <div class="checkout__form__checkbox">
                <!-- <label for="acc">
                Create an acount?
                  <input type="checkbox" id="acc">
                  <span class="checkmark"></span>
                </label> -->
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="checkout__order">
            <h5>Detail Persona</h5>
          <div class="checkout__order__product">
            <ul>
              <li>
                <span class="top__text">Name Order</span>
                <span class="top__text__right"><?= $nama; ?></span>
              </li>
              <li>
                <span class="top__text">Name Deliver</span>
                <span class="top__text__right"><?= $nama_penerima; ?></span>
              </li>
              <li>
                <span class="top__text">Address</span>
                <span class="top__text__right"><?= $alamat; ?></span>
              </li>
              <li>
                <span class="top__text">Number</span>
                <span class="top__text__right"><?= $nomor_telepon; ?></span>
              </li>
              <li>
                <span class="top__text">Date Order</span>
                <span class="top__text__right"><?= $tanggal_pemesanan; ?></span>
              </li>
            </ul>
          </div>
          <div class="checkout__order__total">
            <ul>
              <li>Shipping <span><?php echo rupiah($tarif); ?></span></li>
              <li>Sub Total <span><?php echo rupiah($subtotal); ?></span></li>
            </ul>
          </div>
          <div class="checkout__order__widget">
            <p>Pembayaran ke Bank BCA<br/>
                0000-9999-8888 <strong>(A/N Jarshop)</strong>.<br/>
                Setelah melakukan pembayaran silahkan lakukan konfirmasi pembayaran
            </p>
          </div>
          <a href="<?php echo BASE_URL."index.php?page=menu&module=pesanan&action=konfirmasi_pembayaran&pesanan_id=$pesanan_id"?>" class="site-btn text-center">Here</a>
        </div>
      </div>
    </form>
  </div>
</section>
<!-- Checkout Section End -->

<style>
  .top__text__right {
    font-weight: 100!important;
  }
</style>