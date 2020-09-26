<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href="<?= BASE_URL ?>"><i class="fa fa-home"></i>Home</a>
					<span>Shopping cart</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
  <div class="container">

    <div class="row">
      <div class="col-lg-12">
        <div class="shop__cart__table">

<?php
	if($totalBarang == 0) {
		echo "<p class='text-center'>Empty cart.</p>";
	} else {
	
		echo "<table>
            <thead>
              <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
              </tr>
            </thead>";
		
    $subtotal = 0;
    
		foreach($keranjang AS $key => $value) {
      
      $barang_id = $key;
			$nama_barang = $value["nama_barang"];
			$quantity = $value["kuantiti"];
			$gambar = $value["gambar"];
			$harga = $value["harga"];
			$total = $quantity * $harga;
			$subtotal = $subtotal + $total;
			
			echo "<tbody>
              <tr>
                <td class='cart__product__item'>
                  <img src='".BASE_URL."images/cloth/$gambar' alt='' class='img-cart'>
                  <div class='cart__product__item__title'>
                    <h6>$nama_barang</h6>
                    <div class='rating'>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                    </div>
                  </div>
                </td>
                <td class='cart__price'>".rupiah($harga)."</td>
                <td class='cart__quantity'>
                    <div class='pro-qty'>
                      <input type='text' name='$barang_id' value='$quantity' class='update-quantity' />
                    </div>
                </td>
                <td class='cart__total'>".rupiah($total)."</td>
                <td class='cart__close'><a href='".BASE_URL."hapus_item.php?barang_id=$barang_id'><span class='icon_close'></span></a>
                </td>
              </tr>
            </tbody>";
				
		}
		
    echo "</table></div></div></div>";

    echo "<div class='row mb-3'>
          <div class='col-lg-4 ml-auto'>
            <div class='cart__total__procced'>
                <h6>Cart total</h6>
                <ul>
                    <li>Subtotal<span>".rupiah($subtotal)."</span></li>
                </ul>
                <a href='".BASE_URL."index.php?page=data_pemesan' class='primary-btn'>Proceed to checkout</a>
            </div>
          </div></div>";
    
	}

    echo "<div class='row'>
            <div class='col-lg-6 col-md-6 col-sm-6'>
                <div class='cart__btn'>
                    <a href='".BASE_URL."index.php'>Continue Shopping</a>
                </div>
            </div>
            <div class='col-lg-6 col-md-6 col-sm-6'>
                <div class='cart__btn update__btn'>
                    <a href='".BASE_URL."index.php?page=data_pemesan'><span class='icon_loading'></span>Update cart</a>
                </div>
            </div>
          </div>";

?>

    <div class="row">
        <!-- <div class="col-lg-6">
            <div class="discount__content">
                <h6>Discount codes</h6>
                <form action="#">
                    <input type="text" placeholder="Enter your coupon code">
                    <button type="submit" class="site-btn">Apply</button>
                </form>
            </div>
        </div> -->
    </div>
  </div>
</section>
<!-- Shop Cart Section End -->

<style>
  .img-cart {
    width: 20%;
  }
</style>

<script>

   /*-------------------
		Quantity change
	--------------------- */
  var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {

        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        var barang_id = $button.parent().find('input').attr("name");

        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }

        $button.parent().find('input').val(newVal);

        $.ajax({
            method: "POST",
            url: 'update_keranjang.php',
            data: "barang_id=" + barang_id + "&value=" + newVal
        }).done(function (data) {
            location.reload();
        });

    });

</script>