<?php
	if($user_id){
		$module = isset($_GET['module']) ? $_GET['module'] : false;
		$action = isset($_GET['action']) ? $_GET['action'] : false;
		$mode = isset($_GET['mode']) ? $_GET['mode'] : false;
	}else{
		header("location: ".BASE_URL."index.php?page=masuk");
	}

	admin_only($module, $level);

?>
<div id="bg-page-profile">
	<div id="menu-profile">
		<ul>
			<?php
				if($level == "superadmin"){
			?>
				<li>
					<a <?php if($module == "kategori"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=menu&module=kategori&action=list"; ?>">Kategori</a>
				</li>
				<li>
					<a <?php if($module == "barang"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=menu&module=barang&action=list"; ?>">Barang</a>
				</li>
				<li>
					<a <?php if($module == "kota"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=menu&module=kota&action=list"; ?>">Kota</a>
				</li>
				<li>
					<a <?php if($module == "user"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=menu&module=user&action=list"; ?>">User</a>
				</li>
				<li>
					<a <?php if($module == "banner"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=menu&module=banner&action=list"; ?>">Banner</a>
				</li>
			<?php
				}
			?>
			<li>
				<a <?php if($module == "pesanan"){ echo "class='active'"; } ?> href="<?php echo BASE_URL."index.php?page=menu&module=pesanan&action=list"; ?>">Pesanan</a>
			</li>
		</ul>
	</div>
	<div id="profile-konten">
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

<style>
	
	#menu-profile {
		display: block;
		width: 100%;
		background: #111;
	}

	#menu-profile ul {
		display: flex;
		list-style: none;
		justify-content: center;
	}

	#menu-profile li {
		display: flex;
		margin: 10px;
	}

	#menu-profile a {
		color: #fff;
		font-size: .8rem;
	}

	#menu-profile a.active {
		/* color: #ca1515; */
		border-bottom: 1px solid #ca1515;
	}

</style>