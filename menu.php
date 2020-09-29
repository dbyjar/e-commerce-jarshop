<?php
	if($user_id) {
		$module = isset($_GET['module']) ? $_GET['module'] : false;
		$action = isset($_GET['action']) ? $_GET['action'] : false;
		$mode = isset($_GET['mode']) ? $_GET['mode'] : false;
	} else {
		header("location: ".BASE_URL."index.php?page=masuk");
	}

	admin_only($module, $level);

?>

<div class="container">
	<div class="row" id="bg-page-profile">
		<div class="col-lg-2" id="menu-profile">
			<ul>
				<li <?php if($module == "profile"){ echo "class='active'"; } ?> >
					<a href="<?php echo BASE_URL."index.php?page=menu&module=profile&action=list"; ?>">Profile</a>
				</li>
				<?php
					if($level == "superadmin"){
				?>
					<li <?php if($module == "kategori"){ echo "class='active'"; } ?> >
						<a href="<?php echo BASE_URL."index.php?page=menu&module=kategori&action=list"; ?>">Category</a>
					</li>
					<li <?php if($module == "barang"){ echo "class='active'"; } ?> >
						<a href="<?php echo BASE_URL."index.php?page=menu&module=barang&action=list"; ?>">Items</a>
					</li>
					<li <?php if($module == "kota"){ echo "class='active'"; } ?> >
						<a href="<?php echo BASE_URL."index.php?page=menu&module=kota&action=list"; ?>">Shipping</a>
					</li>
					<li <?php if($module == "user"){ echo "class='active'"; } ?> >
						<a href="<?php echo BASE_URL."index.php?page=menu&module=user&action=list"; ?>">User</a>
					</li>
					<li <?php if($module == "banner"){ echo "class='active'"; } ?> >
						<a href="<?php echo BASE_URL."index.php?page=menu&module=banner&action=list"; ?>">Banner</a>
					</li>
				<?php
					}
				?>
				<li <?php if($module == "pesanan"){ echo "class='active'"; } ?> >
					<a href="<?php echo BASE_URL."index.php?page=menu&module=pesanan&action=list"; ?>">Order</a>
				</li>
			</ul>
		</div>
		<div class="col-lg-10"id="profile-konten">
			<?php
				$file = "module/$module/$action.php";
				if(file_exists($file)) {
					include_once($file);
				} else {
					echo "<p>Maaf, halaman tersebut tidak ditemukan</p>";
				}
			?>
		</div>
	</div>
</div>