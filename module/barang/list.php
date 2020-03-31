<div id="frame-tambah">
	<a href="<?php echo BASE_URL."index.php?page=menu&module=barang&action=form"; ?>"
		class="tombol-action">+ Barang</a>

	<?php
	
		$queryBarang = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang
			JOIN kategori ON barang.kategori_id=kategori.kategori_id");
		
		if(mysqli_num_rows($queryBarang) == 0)
		{
			echo "<h3>Saat ini belum ada barang tersimpan di sistem</h3>";
		}
		else
		{		
			echo "<table class='table-list'>";
			
			echo "<tr class='baris-title'>
					<th class='kolom-nomor'>No</th>
					<th class='kiri'>Barang</th>
					<th class='tengah'>Kategori</th>
					<th class='tengah'>Harga</th>
					<th class='tengah'>Stok</th>
					<th class='tengah'>Status</th>
					<th class='tengah'>Action</th>
				 </tr>";
				 
			$no=1;
			while($row=mysqli_fetch_assoc($queryBarang))
			{			
				$hrg = number_format($row["harga"]);	
				echo "<tr>
						<td class='kolom-nomor'>$no</td>
						<td class='kiri'>$row[nama_barang]</td>
						<td class='tengah'>$row[kategori]</td>
						<td class='tengah'>".rupiah($row["harga"])."</td>
						<td class='tengah'>$row[stok]</td>
						<td class='tengah'>$row[status]</td>
						<td class='tengah'>
							<a class='tombol-action' href='".BASE_URL."index.php?page=menu&module=barang&action=form&barang_id=$row[barang_id]'>Edit</a>
						</td>
					  </tr>";					  
				$no++;
			}
			
			echo "</table>";		
		}
	?>
</div>