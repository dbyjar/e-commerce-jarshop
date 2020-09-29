<!-- KERANJANG -->
<?php
    if ($totalBarang != 0) {
        echo "<li>
        <a href='".BASE_URL."index.php?page=keranjang' id='tombol-keranjang'>
        <span class='icon_bag_alt'></span>
        <div class='tip'>$totalBarang</div>
        </a>
        </li>";
    }
    elseif ($user_id == true) {
        echo "<li>
        <a href='".BASE_URL."index.php?page=keranjang' id='tombol-keranjang'>
        <span class='icon_bag_alt'></span>
        </a>
        </li>";
    }
    else {
        false;
    }
?>
<!-- KERANJANG -->

<!-- LOGO -->
<a href="<?php echo BASE_URL ?>"><img src="<?php echo BASE_URL."images/logo.png"; ?>" alt="Logo" class="img-fluid"></a>
<!-- LOGO -->

<!-- AUTH -->
<?php
    if ($user_id) {
        echo "<a href='".BASE_URL."index.php?page=menu&module=profile&action=list'><p>$nama</p></a>";
    }
    else {
        echo "<a href='".BASE_URL."index.php?page=daftar'>Login</a>
        <a href='".BASE_URL."index.php?page=masuk'>Register</a>";
    }
?>
<!-- AUTH -->

<!-- MENU -->
<li <?php if($page == ""){ echo "class='active'"; } ?> >
    <a href="<?= BASE_URL ?>">Home</a>
<li <?php if($page == "shop"){ echo "class='active'"; } ?> >
    <a href='<?= BASE_URL."index.php?page=shop" ?>'>Shop</a>
</li>
<li <?php if($page == "contact"){ echo "class='active'"; } ?> >
    <a href="./contact.html">Contact</a>
</li>
<!-- MENU -->