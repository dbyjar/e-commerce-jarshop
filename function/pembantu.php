<?php
	
	define("BASE_URL", "http://localhost/jarshop/");

	$arrayStatusPesanan [0] = "Menunggu Pembayaran";
	$arrayStatusPesanan [1] = "Pembayaran Sedang di Validasi";
	$arrayStatusPesanan [2] = "Lunas";
	$arrayStatusPesanan [3] = "Pembayaran di Tolak";

	function rupiah($nilai = 0){
		$string = "Rp. ".number_format($nilai).",00";
		return $string;
	}

	function kategori($kategori_id = false){
		global $koneksi;

		$string = "<div id='menu-profile'>";
		$string .= "<ul>";
				$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
				while ($row = mysqli_fetch_assoc($query))
				{
					$kategori = strtolower($row['kategori']);
					$kategori = str_replace(" ", "-", $kategori);
					if ($kategori_id == $row['kategori_id'])
					{
						$string .= "<li>
							<a  href='".BASE_URL."index.php?kategori_id=$row[kategori_id]'
							class='active'>$row[kategori]</a>
						</li>";
					}
					else
					{
						$string .= "<li>
							<a  href='".BASE_URL."index.php?kategori_id=$row[kategori_id]'>$row[kategori]</a>
						</li>";
					}
				}
		$string .= "</ul>";
	$string .= "</div>";
	return $string;

	}
	
	function admin_only($module, $level)
	{
		if ($level != "superadmin") {
			$admin_pages = array("kategori", "barang", "kota", "user", "banner");
			if (in_array($module, $admin_pages)) {
				header("location:".BASE_URL);
			}
		}
	}

	function data_pemesan($user_id = false)
	{
		if($user_id)
		{
			$_SESSION['proses_pesanan'] = true;
			
			header("location: ".BASE_URL."index.php?page=masuk");
			exit;
		}
	}