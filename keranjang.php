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

<?php
	if($totalBarang == 0)
	{
		echo "<h4>\"Saat ini belum ada barang di dalam keranjang belanja anda\", Kata sistemnya Fajar :(</h4>";
	}
	else
	{
	
		$no=1;
		
		echo "<table class='table-keranjang'>
				<tr class='baris-keranjang'>
					<th class='mid'>No</th>
					<th class='mid'>Plihanmu</th>
					<th class='left'>Namanya</th>
					<th class='mid'>Jumlahnya</th>
					<th class='right'>Harganya</th>
					<th class='right'>Total</th>
					<th class='mid'>Hapus</th>
				</tr>";
		
		$subtotal = 0;		
		foreach($keranjang AS $key => $value){
			$barang_id = $key;
			
			$nama_barang = $value["nama_barang"];
			$quantity = $value["kuantiti"];
			$gambar = $value["gambar"];
			$harga = $value["harga"];
			
			$total = $quantity * $harga;
			$subtotal = $subtotal + $total;
			
			echo "<tr>
					<td class='mid'>$no</td>
					<td class='mid'><img src='".BASE_URL."images/cloth/$gambar' height='100px' /></td>
					<td class='left'>$nama_barang</td>
					<td class='mid'>
						<input type='text' name='$barang_id' value='$quantity' class='update-quantity' />
					</td>
					<td class='right'>".rupiah($harga)."</td>
					<td class='right'>".rupiah($total)."</td>
					<td class='mid'>
						<a class='hapus' href='".BASE_URL."hapus_item.php?barang_id=$barang_id'>Hapus</a>
					</td>
				</tr>";
				
			$no++;
		}
		
		echo "<tr>
				<td colspan='7' class='sub' align='right'><b>Sub Total = </b><b>".rupiah($subtotal)."</b></td>
			  </tr>";
		
		echo "</table>";
	
		echo "<div id='frame-button-keranjang'>
				<a id='lanjut-belanja' href='".BASE_URL."index.php'>< Lanjut Belanja</a>
				<a id='lanjut-pemesanan' href='".BASE_URL."index.php?page=data_pemesan'>Lanjut Pemesanan ></a>
			  </div>";
	}

?>

<script>

	$(".update-quantity").on("input", function(e){
		var barang_id = $(this).attr("name");
		var value = $(this).val();
		
		$.ajax({
			method: "POST",
			url: "update_keranjang.php",
			data: "barang_id="+barang_id+"&value="+value
		})
		.done(function(data){
			location.reload();
		});
		
	});

</script>