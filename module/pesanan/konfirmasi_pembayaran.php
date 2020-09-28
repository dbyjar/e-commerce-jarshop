<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
          <a href='<?= BASE_URL ?>'><i class="fa fa-home"></i> Home</a>
          <a href="<?= BASE_URL."index.php?page=menu&module=pesanan&action=list" ?>">Order </a>
					<span>Confirm Payment</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<?php

	$pesanan_id = $_GET["pesanan_id"];
  $query = mysqli_query($koneksi, "SELECT * FROM konfirmasi_pembayaran
                                    WHERE pesanan_id='$pesanan_id'");
  $data = mysqli_fetch_assoc($query);
  
  if ($data == 0) {
?>

<!-- Checkout Section Begin -->
<section class="checkout spad">
  <div class="container">
    <form action="<?= BASE_URL."module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST" class="checkout__form">
      <div class="row">
        <div class="col-lg-12">
          <h5>Billing detail</h5>
          <div class="row">
            <div class="col-md">
              <div class="checkout__form__input">
                <p>Number Account <span>*</span></p>
                <input type="text" name="nomor_rekening" />
              </div>
            </div>
            <div class="col-md">
              <div class="checkout__form__input">
                <p>Name Account <span>*</span></p>
                <input type="text" name="nama_account" />
              </div>
            </div>
            <div class="col-md">
              <div class="checkout__form__input">
                <p>Date Payment <span>*</span></p>
                <input type="date" name="tanggal_transfer" />
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <input type="submit" value="Confirm" name="button" class="site-btn" />
        </div>
      </div>
    </form>
  </div>
</section>
<!-- Checkout Section End -->

<?php } elseif ($data > 0) {
  echo "
    <div class='container my-5'>
      <h5 class='text-center'>You already paid for your order</h5>
    </div>
  ";
}

?>