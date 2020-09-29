<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__links">
          <a href='<?= BASE_URL ?>'><i class="fa fa-home"></i> Home</a>
          <span>Banner</span>
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
  <a href="<?php echo BASE_URL."index.php?page=menu&module=banner&action=form"; ?>" class="btn btn-primary mb-3">Banner <i class="fa fa-plus"></i></a>
  <div class="container">
    <form action="#" class="checkout__form">
      <div class="row">
        <div class="col-lg">
          <div class="row">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Link</th>
                    <th scope="col" class='text-center'>Status</th>
                    <th scope="col" class='text-center'>Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php
					$queryBanner = mysqli_query($koneksi, "SELECT * FROM banner ORDER BY banner_id DESC");
					
					if(mysqli_num_rows($queryBanner) == 0) {
						echo "<h3>Saat ini belum ada nama kategori di dalam table kategori</h3>";
					} else {		
						$no=1;
						while ($rowBanner = mysqli_fetch_assoc($queryBanner)) {
							echo "<tr>
										<th scope='row'>$no</th>
										<td>$rowBanner[banner]</td>
										<td><a target='blank' href='".BASE_URL."$rowBanner[link]'>$rowBanner[link]</a></td>
										<td class='text-center'>$rowBanner[status]</td>
										<td class='text-center'><a class='btn btn-secondary btn-sm' href='".BASE_URL."index.php?page=menu&module=banner&action=form&banner_id=$rowBanner[banner_id]"."'>Edit</a></td>
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