<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__links">
          <a href='<?= BASE_URL ?>'><i class="fa fa-home"></i> Home</a>
          <span>User</span>
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
    <form action="#" class="checkout__form">
      <div class="row">
        <div class="col-lg">
          <div class="row">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Level</th>
                    <th scope="col" class='text-center'>Status</th>
                    <th scope="col" class='text-center'>Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php
					$queryAdmin = mysqli_query($koneksi, "SELECT * FROM user ORDER BY nama ASC");
					
					if(mysqli_num_rows($queryAdmin) == 0) {
						echo "<h3>Saat ini belum ada nama kategori di dalam table kategori</h3>";
					} else {		
						$no=1;
						while ($rowUser = mysqli_fetch_assoc($queryAdmin)) {
							echo "<tr>
										<th scope='row'>$no</th>
										<td>$rowUser[nama]</td>
										<td>$rowUser[email]</td>
										<td>$rowUser[phone]</td>
										<td>$rowUser[level]</td>
										<td class='text-center'>$rowUser[status]</td>
										<td class='text-center'><a class='btn btn-secondary btn-sm' href='".BASE_URL."index.php?page=menu&module=user&action=form&user_id=$rowUser[user_id]"."'>Edit</a></td>
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