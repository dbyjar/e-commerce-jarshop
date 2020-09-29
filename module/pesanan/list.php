<?php

	if($level == "superadmin"){
		$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id ORDER BY pesanan.tanggal_pemesanan DESC");
	}else{
		$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id WHERE pesanan.user_id='$user_id' ORDER BY pesanan.tanggal_pemesanan DESC");
	}
	
	if(mysqli_num_rows($queryPesanan) == 0) {
		echo "<h3>Your list order is empty</h3>";
	} else {

?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__links">
          <a href='<?= BASE_URL ?>'><i class="fa fa-home"></i> Home</a>
          <span>Order</span>
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
                    <th scope="col">Status</th>
                    <th scope="col" class='text-center'>Name</th>
                    <th scope="col" class='text-center'>Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php
					$adminButton = "";
					while($row=mysqli_fetch_assoc($queryPesanan)){
						if($level == "superadmin"){
							$adminButton = "<a class='btn btn-success btn-sm ml-2' href='".BASE_URL."index.php?page=menu&module=pesanan&action=status&pesanan_id=$row[pesanan_id]'>Update</a>";
						}
					
						$status = $row['status'];
						echo "<tr>
                            <th scope='row'>$row[pesanan_id]</th>
                            <td>$arrayStatusPesanan[$status]</td>
                            <td class='text-center'>$row[nama]</td>
                            <td class='text-center'><a class='btn btn-secondary btn-sm' href='".BASE_URL."index.php?page=menu&module=pesanan&action=detail&pesanan_id=$row[pesanan_id]'>Detail</a>
									$adminButton</td>
                          </tr>";
					}
					
					echo "</tbody>
						</table>";

?>

<?php } ?>
            
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<!-- Checkout Section End -->