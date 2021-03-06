<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb__links">
          <a href='<?= BASE_URL ?>'><i class="fa fa-home"></i> Home</a>
          <span>Profile</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumb End -->

<!-- Card -->
<div class="containe d-flex justify-content-center">
<div class="card mt-5" style="width: 18rem;">
  <!-- <img class="card-img-top" src='<?= BASE_URL."vendor/img/categories/category-1.jpg" ?>' alt="Card image cap"> -->
  <div class="card-body">
    <h5 class="card-title">Nama : <?= "$nama"; ?></h5>
    <p class="card-text">Level : <?= "$level"; ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">E-mail : <?= "$email"; ?></li>
    <li class="list-group-item">Hp : <?= "$phone"; ?></li>
    <li class="list-group-item">Alamat : <?= "$alamat"; ?></li>
  </ul>
  <div class="card-body d-flex align-items-center">
    <a class="btn btn-primary mr-auto <?php if($level == "superadmin"){ echo "disabled"; } ?>" href="<?= BASE_URL."index.php?page=menu&module=profile&action=form"; ?>">Update</a>
    <a href="<?= BASE_URL."keluar.php"; ?>" class="card-link">Logout</a>
  </div>
</div>
</div>
<!-- end of Card -->