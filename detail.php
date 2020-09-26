
<?php
  $barang_id = $_GET['barang_id'];
  $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id' AND status='on'");
  $row = mysqli_fetch_assoc($query); 
?>  

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href="./index.html"><i class="fa fa-home"></i> Home</a>
					<a href="#">Women’s </a>
					<span><?= $row['nama_barang'] ?></span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="product__details__pic">
					<div class="product__details__pic__left product__thumb nice-scroll">
						<a class="pt active" href="#product-1">
							<img src='<?= BASE_URL."images/cloth/$row[gambar]" ?>' alt="">
						</a>
						<a class="pt" href="#product-2">
							<img src="img/product/details/thumb-2.jpg" alt="">
						</a>
						<a class="pt" href="#product-3">
							<img src="img/product/details/thumb-3.jpg" alt="">
						</a>
						<a class="pt" href="#product-4">
							<img src="img/product/details/thumb-4.jpg" alt="">
						</a>
					</div>
					<div class="product__details__slider__content">
						<div class="product__details__pic__slider owl-carousel">
							<img data-hash="product-1" class="product__big__img" src='<?= BASE_URL."images/cloth/$row[gambar]" ?>' alt="">
							<img data-hash="product-2" class="product__big__img" src="img/product/details/product-3.jpg" alt="">
							<img data-hash="product-3" class="product__big__img" src="img/product/details/product-2.jpg" alt="">
							<img data-hash="product-4" class="product__big__img" src="img/product/details/product-4.jpg" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="product__details__text">
					<h3><?= $row['nama_barang'] ?></h3>
					<div class="rating">
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</div>
          <div class="product__details__price"><?= rupiah($row['harga']) ?>
            <!-- <span>$ 83.0</span> -->
          </div>
					<p><?= $row['spesifikasi'] ?></p>
					<div class="product__details__button">
            <a href='<?= BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]" ?>' class="cart-btn">
              <span class="icon_bag_alt"></span> Add to cart
            </a>
						<!-- <div class="quantity">
							<span>Quantity:</span>
							<div class="pro-qty">
								<input type="text" value="1">
							</div>
						</div> -->
						<!-- <ul>
							<li><a href="#"><span class="icon_heart_alt"></span></a></li>
							<li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
						</ul> -->
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="product__details__tab">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( 2 )</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tabs-1" role="tabpanel">
							<h6>Description</h6>
							<p><?= $row['spesifikasi'] ?></p>
						</div>
						<div class="tab-pane" id="tabs-2" role="tabpanel">
							<h6>Specification</h6>
							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
								quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
								Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
								voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
								consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
							consequat massa quis enim.</p>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
								dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
								nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
							quis, sem.</p>
						</div>
						<div class="tab-pane" id="tabs-3" role="tabpanel">
							<h6>Reviews ( 2 )</h6>
							<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
								quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
								Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
								voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
								consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
							consequat massa quis enim.</p>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
								dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
								nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
							quis, sem.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Product Details Section End -->
