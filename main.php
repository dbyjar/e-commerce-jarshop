<!-- Categories Section Begin -->
<section class="categories">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 p-0">
        <div class="categories__item categories__large__item set-bg" data-setbg="./vendor/img/categories/category-1.jpg">
          <div class="categories__text">
            <h1>Women’s fashion</h1>
            <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore edolore magna aliquapendisse ultrices gravida.</p>
            <a href="#">Shop now</a>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 p-0">
              <div class="categories__item set-bg" data-setbg="./vendor/img/categories/category-2.jpg">
                  <div class="categories__text">
                      <h4>Men’s fashion</h4>
                      <p>358 items</p>
                      <a href="#">Shop now</a>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 p-0">
              <div class="categories__item set-bg" data-setbg="./vendor/img/categories/category-3.jpg">
                  <div class="categories__text">
                      <h4>Kid’s fashion</h4>
                      <p>273 items</p>
                      <a href="#">Shop now</a>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 p-0">
              <div class="categories__item set-bg" data-setbg="./vendor/img/categories/category-4.jpg">
                  <div class="categories__text">
                      <h4>Cosmetics</h4>
                      <p>159 items</p>
                      <a href="#">Shop now</a>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 p-0">
              <div class="categories__item set-bg" data-setbg="./vendor/img/categories/category-5.jpg">
                  <div class="categories__text">
                      <h4>Accessories</h4>
                      <p>792 items</p>
                      <a href="#">Shop now</a>
                  </div>
              </div>
          </div>
        </div>
      </div>
</section>
<!-- Categories Section End -->

		<!-- $location = "location: ".BASE_URL.'index.php?page=main';
		if (location($location)) {
			
			echo "<div id='slides'>";
				$queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on' ORDER BY rand() DESC");
				while ($rowBanner = mysqli_fetch_assoc($queryBanner))
				{
					echo "<img src='".BASE_URL."images/banner/$rowBanner[gambar]' />";
				} 
			echo "</div>";
		}
		else {
			false;
    } -->

<!-- Product Section Begin -->
<section class="product spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4">
        <div class="section-title">
          <h4>Products</h4>
        </div>
      </div>
      <div class="col-lg-8 col-md-8">
        <ul class="filter__controls">
            <li class="active" data-filter="*">All</li>
            <!-- kategori -->
            <?php
                $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
                while ($row = mysqli_fetch_assoc($queryKategori)) {
                    $kategori = strtolower($row['kategori']);
                    echo "<li data-filter='.$kategori'>$row[kategori]</li>";
                }
            ?>
        </ul>
      </div>
    </div>
    <div class="row property__gallery">
      <?php

      if ($kategori_id)
      {
        $kategori_id = "AND barang.kategori_id='$kategori_id'";
      }
      
      $query = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori on barang.kategori_id=kategori.kategori_id WHERE barang.status='on' $kategori_id ORDER BY rand() DESC LIMIT 9");
    

      $no=1;
      while($row=mysqli_fetch_assoc($query)){

          $kategori = strtolower($row['kategori']);
          $kategori = str_replace(" ", "-", $kategori);
          $barang = strtolower($row['nama_barang']);
          $barang = str_replace(" ", "-", $barang);
          
          echo "
              <div class='col-lg-3 col-md-4 col-sm-6 mix $kategori'>
                <div class='product__item'>
                  <div class='product__item__pic set-bg' data-setbg='".BASE_URL."images/cloth/$row[gambar]'>
                    <div class='label new'>New</div>
                    <ul class='product__hover'>
                      <li>
                        <a href='".BASE_URL."images/cloth/$row[gambar]' class='image-popup'>
                        <span class='arrow_expand'></span></a>
                      </li>
                      <li>
                        <a href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]'><span class='icon_bag_alt'></span></a>
                      </li>
                    </ul>
                  </div>
                  <div class='product__item__text'>
                    <h6><a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>$row[nama_barang]</a></h6>
                    <div class='rating'>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                    </div>
                    <div class='product__price'>".rupiah($row['harga'])."</div>
                  </div>
                </div>
              </div>";
          $no++;
        }
      ?>
    </div>
  </div>
</section>
<!-- Product Section End -->

<!-- Discount Section Begin -->
<section class="discount">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="discount__pic">
                    <img src="./vendor/img/discount.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="discount__text">
                    <div class="discount__text__title">
                        <span>Discount</span>
                        <h2>Summer 2020</h2>
                        <h5><span>Sale</span> 50%</h5>
                    </div>
                    <div class="discount__countdown" id="countdown-time">
                        <div class="countdown__item">
                            <span>22</span>
                            <p>Days</p>
                        </div>
                        <div class="countdown__item">
                            <span>18</span>
                            <p>Hour</p>
                        </div>
                        <div class="countdown__item">
                            <span>46</span>
                            <p>Min</p>
                        </div>
                        <div class="countdown__item">
                            <span>05</span>
                            <p>Sec</p>
                        </div>
                    </div>
                    <a href="#">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Section End -->

<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Free Shipping</h6>
                    <p>For all oder over $99</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Money Back Guarantee</h6>
                    <p>If good have Problems</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Online Support 24/7</h6>
                    <p>Dedicated support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Payment Secure</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- Instagram Begin -->
<div class="instagram">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="./vendor/img/instagram/insta-1.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@jar_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="./vendor/img/instagram/insta-2.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@jar_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="./vendor/img/instagram/insta-3.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@jar_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="./vendor/img/instagram/insta-4.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@jar_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="./vendor/img/instagram/insta-5.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@jar_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="./vendor/img/instagram/insta-6.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@jar_shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Instagram End -->