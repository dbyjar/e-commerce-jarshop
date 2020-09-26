<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__links">
          <a href="./index.html"><i class="fa fa-home"></i> Home</a>
          <span>Shop</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Section Begin -->
<section class="shop spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3">
        <div class="shop__sidebar">
          <div class="sidebar__categories">
            <div class="section-title">
              <h4>Categories</h4>
            </div>
            <div class="categories__accordion">
              <div class="accordion" id="accordionExample">

                <!-- Categories -->
                <?php
                  $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
                  while ($row = mysqli_fetch_assoc($queryKategori)) {
                    $kategori = strtolower($row['kategori']);
                    echo "
                          <div class='card'>
                            <div class='card-heading active'>
                              <a href=''>$row[kategori]</a>
                            </div>
                          </div>";
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-md-9">
        <div class="row">

          <!-- Items -->
          <!-- <div class="col-lg-4 col-md-6">
            <div class="product__item">
              <div class="product__item__pic set-bg" data-setbg="img/shop/shop-1.jpg">
                <div class="label new">New</div>
                <ul class="product__hover">
                  <li><a href="img/shop/shop-1.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                  <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                  <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                </ul>
              </div>
              <div class="product__item__text">
                <h6><a href="#">Furry hooded parka</a></h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">$ 59.0</div>
              </div>
            </div>
          </div> -->

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

          <div class="col-lg-12 text-center">
            <div class="pagination__option">
              <a href="#">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#"><i class="fa fa-angle-right"></i></a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<!-- Shop Section End -->