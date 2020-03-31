<div id="kiri">
	<?php
		echo kategori($kategori_id);
	?>
</div>
<div id="kanan">
	<?php

		/*$location = "location: ".BASE_URL.'index.php?page=main';
		if (location($location)) {*/
			
			echo "<div id='slides'>";
				$queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on' ORDER BY rand() DESC");
				while ($rowBanner = mysqli_fetch_assoc($queryBanner))
				{
					echo "<img src='".BASE_URL."images/banner/$rowBanner[gambar]' />";
				} 
			echo "</div>";
		/*}
		else
		{
			false;
		}*/
	?>
		
	<div id="frame-barang">
		<ul>
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
					
					$style=false;
					if($no == 2)
					{
						$style="style='margin-right:40px;margin-left:30px;'";
					}
					elseif($no == 5)
					{
						$style="style='margin-right:40px;margin-left:30px;'";
					}
					elseif($no == 8)
					{
						$style="style='margin-right:40px;margin-left:30px;'";
					}
					
					echo "<li $style>
							<a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>
								<img src='".BASE_URL."images/cloth/$row[gambar]' />
							</a>
							<p class='price'>".rupiah($row['harga'])."</p>
							<div class='keterangan-gambar'>
								<p><a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>$row[nama_barang]</a></p>
								<span>Stok : $row[stok]</span>
							</div>
							<div class='button-add-cart'>
								<a href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]'>+ Simpan</a>
							</div>";
					$no++;
				}
			?>
		</ul>
	</div>
</div>