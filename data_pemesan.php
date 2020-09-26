<?php
	//data_pemesan($user_id == false);
	if(!$user_id)
	{
		$_SESSION['proses_pesanan'] = true;
		
		header("location: ".BASE_URL."index.php?page=masuk");
		//exit;
	}
?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href="./index.html"><i class="fa fa-home"></i>Home</a>
					<span>Checkout</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
	<div class="container">
		<!-- <div class="row">
			<div class="col-lg-12">
				<h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
				here to enter your code.</h6>
			</div>
		</div> -->
		<form action="<?php echo BASE_URL."proses_pemesanan.php"; ?>" method="POST" class="checkout__form">
			<div class="row">
				<div class="col-lg-8">
					<h5>Billing detail</h5>
					<div class="row">
						<div class="col-lg-12">
							<div class="checkout__form__input">
								<p>Full Name <span>*</span></p>
								<input type="text" name="nama_penerima" />
							</div>
						</div>
						<div class="col-lg-12">
							<div class="checkout__form__input">
								<p>Address <span>*</span></p>
								<input type="text"area name="alamat" />
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="checkout__form__input">
								<p>Phone <span>*</span></p>
								<input type="text" name="nomor_telepon" />
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="checkout__form__input">
								<p>Email <span>*</span></p>
								<input type="text">
							</div>
						</div>
						<div class="col-lg-12">
							<div class="checkout__form__input">
								<p>Shipping <span>*</span></p>
								<select name="kota">
									<?php
										$query = mysqli_query($koneksi, "SELECT * FROM kota");
										
										while($row=mysqli_fetch_assoc($query)){
											echo "<option value='$row[kota_id]'>$row[kota] (".rupiah($row["tarif"]).")</option>";
										}
									?>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
              <!-- <div class="checkout__form__checkbox">
								<label for="acc">
									Create an acount?
									<input type="checkbox" id="acc">
									<span class="checkmark"></span>
								</label>
								<p>Create am acount by entering the information below. If you are a returing
									customer login at the <br />top of the page</p>
							</div> -->
              <!-- <div class="checkout__form__input">
                <p>Account Password <span>*</span></p>
                <input type="text">
              </div> -->
              <div class="checkout__form__input">
                <p>Oder notes <span></span></p>
                <input type="text"
                placeholder="Note about your order, e.g, special noe for delivery" readonly>
              </div>
              <div class="checkout__form__checkbox">
                <label for="note">
                  <!-- Note about your order, e.g, special noe for delivery -->
                  Cheque payment
                  <input type="checkbox" id="note">
                  <span class="checkmark"></span>
                </label>
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
										$subtotal = 0;
										foreach($keranjang AS $key => $value){
											
											$barang_id = $key;
											
											$nama_barang = $value['nama_barang'];
											$harga = $value['harga'];
											$quantity = $value['kuantiti'];
											
											$total = $quantity * $harga;
											$subtotal = $subtotal + $total;
											
											echo "<li>$quantity x $nama_barang <span>".rupiah($total)."</span></li>";
										}			
										
									?>
								</ul>
							</div>
							<div class="checkout__order__total">
								<ul>
									<?="<li>Subtotal <span>".rupiah($subtotal)."</span></li>";?>
									<!-- <li>Total <span>$ 750.0</span></li> -->
								</ul>
							</div>
							<!-- <div class="checkout__order__widget">
								<label for="o-acc">
									Create an acount?
									<input type="checkbox" id="o-acc">
									<span class="checkmark"></span>
								</label>
								<p>Create am acount by entering the information below. If you are a returing customer
								login at the top of the page.</p>
								<label for="check-payment">
									Cheque payment
									<input type="checkbox" id="check-payment">
									<span class="checkmark"></span>
								</label>
								<label for="paypal">
									PayPal
									<input type="checkbox" id="paypal">
									<span class="checkmark"></span>
								</label>
							</div> -->
							<input type="submit" value="Place oder" class="site-btn" />
						</div>
					</div>
				</div>
			</div>
		</form>
		</div>
	</section>
	<!-- Checkout Section End -->