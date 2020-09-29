<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__links">
          <a href='<?= BASE_URL ?>'><i class="fa fa-home"></i> Home</a>
          <span>Shipping</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- Section Begin -->
<style>
	.spad {
		margin-top: 2rem!important;
		padding-top: 0!important;
	}
</style>
<section class="checkout spad">
  <div class="container">
	<a href="<?php echo BASE_URL."index.php?page=menu&module=kota&action=form"; ?>" class="btn btn-primary mb-3">City <i class="fa fa-plus"></i></a>
    <form action="#" class="checkout__form">
      <div class="row">
        <div class="col-lg">
          <div class="row">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">City</th>
                    <th scope="col">Cost</th>
                    <th scope="col" class='text-center'>Status</th>
                    <th scope="col" class='text-center'>Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php
					$queryKota = mysqli_query($koneksi, "SELECT * FROM kota ORDER BY tarif ASC");
					
					if(mysqli_num_rows($queryKota) == 0) {
						echo "<h3>Saat ini belum ada nama kategori di dalam table kategori</h3>";
					} else {		
						$no=1;
						while ($row=mysqli_fetch_assoc($queryKota)) {
							echo "<tr>
										<th scope='row'>$no</th>
										<td>$row[kota]</td>
										<td>".rupiah($row["tarif"])."</td>
										<td class='text-center'>$row[status]</td>
										<td class='text-center'><a class='btn btn-secondary btn-sm' href='".BASE_URL."index.php?page=menu&module=kota&action=form&kota_id=$row[kota_id]"."'>Edit</a></td>
									</tr>";
									$no++;
						}
					}
						
						echo "</tbody></table>";		
				?>

          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<!-- Section End -->