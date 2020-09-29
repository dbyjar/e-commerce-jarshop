<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href='<?= BASE_URL ?>'><i class="fa fa-home"></i> Home</a>
					<a href="<?= BASE_URL."index.php?page=menu&module=barang&action=list" ?>">Items </a>
					<span>
						<?= isset($_GET['barang_id']) ? 'Edit' : 'Add'; ?>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb End -->

<?php

	$barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;
	
	$nama_barang = "";
	$kategori_id = "";
	$spesifikasi = "";
	$gambar = "";
	$stok = "";
	$harga = "";
	$status = "";
	$keterangan_gambar = "";
	$button = "+ Tambah";
	
	if($barang_id)
	{
		$query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id'");
		$row = mysqli_fetch_assoc($query);
		
		$nama_barang = $row['nama_barang'];
		$kategori_id = $row['kategori_id'];
		$spesifikasi = $row['spesifikasi'];
		$gambar = $row['gambar'];
		$harga = $row['harga'];
		$stok = $row['stok'];
		$status = $row['status'];
		$button = "Update";
		
		$keterangan_gambar = '* Choose File for update your item picture';
		$gambar = "<img src='".BASE_URL."images/cloth/$gambar' style='width: 200px;vertical-align: middle;' />";
	}

?>

<script src="<?php echo BASE_URL."js/ckeditor/ckeditor.js"; ?>"></script>

<form action="<?php echo BASE_URL."module/barang/aksi.php?barang_id=$barang_id"; ?>" method="POST" enctype="multipart/form-data" class="mt-5">
  <div class="form-row">
    <div class="form-group col-md-8">
      <label>Name</label>
      <input type="text" class="form-control" name="nama_barang" value="<?php echo $nama_barang; ?>" />
    </div>
    <div class="form-group col-md-4">
      <label>Category</label>
      <select name="kategori_id" class="form-control">
				<?php
					$query = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori
						WHERE status='on' ORDER BY kategori ASC");

					while($row=mysqli_fetch_assoc($query))
					{
						if($kategori_id == $row['kategori_id'])
						{
							echo "<option value='$row[kategori_id]' selected='true'>$row[kategori]</option>";
						}
						else
						{
							echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
						}
					}
				?>
        </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label>Description</label>
      <textarea name="spesifikasi" id="editor" class="form-control" rows="3">
        <?php echo $spesifikasi; ?>
      </textarea>
    </div>
    <div class="form-group col-md-6">
      <label>Quantity</label>
      <input type="text" class="form-control" name="stok" value="<?php echo $stok; ?>" />
    </div>
    <div class="form-group col-md-6">
      <label>Price</label>
      <input type="text" class="form-control" name="harga" value="<?php echo $harga; ?>" />
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-8">
      <label>Photo Product</label>
      <div class="custom-file">
        <input type="file" class="custom-file-input" name="file" />
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div>
      <small><?php echo $keterangan_gambar; ?></small>
    </div>
    <div class="form-group col-md-4 d-flex justify-content-center">
      <?php echo $gambar; ?>
    </div>
  </div>
	<div class="form-group">
  <label>Status</label>
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="status" value="on"
				<?php if ($status == 'on') { echo "checked='true'";} ?> />
			<label class="form-check-label" for="inlineRadio1">ON</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="status" value="off"
				<?php if ($status == 'off') { echo "checked='true'";} ?> />
			<label class="form-check-label" for="inlineRadio2">OFF</label>
		</div>
	</div>
	<button type="submit" class="btn btn-primary" name="button" value="<?php echo($button); ?>" >Submit</button>
</form>

<script>
	CKEDITOR.replace("editor");
</script>