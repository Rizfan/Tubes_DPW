<?php

require_once './../src/proses/proses_session.php';
require_once './../src/database/produk.php';

$current_session = session_manager("get_session", [
    "username",
    "role",
]);

$tittle = "Bybit.id";
include_once '../layout/navbar.php';
?>

<div id="carouselExampleInterval" class="carousel slide carousel-fade mt-4" data-ride="carousel">

    <ol class="carousel-indicators">
        <li data-target="#carouselExampleInterval" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleInterval" data-slide-to="1"></li>
        <li data-target="#carouselExampleInterval" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner rounded ">
        <div class="carousel-item active" data-interval="1900">
            <img class="d-block w-100 " style="max-height: 300px;" src="../assets/img/SelamatDatang!.png"
                alt="First slide">
        </div>
        <div class="carousel-item" data-interval="2900">
            <img class="d-block w-100 " style="max-height: 300px;" src="../assets/img/SelamatDatang!1).png"
                alt="First slide">
        </div>
        <div class="carousel-item" data-interval="3900">
            <img class="d-block w-100" style="max-height: 300px;"
                src="../assets/upload/produk/27163977_20200213_103459.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="card mt-5 shadow-sm">
    <div class="card-body">
        <h5 class="mb-4">Kategori</h5>
        <div class="row">
            <?php
include_once './../src/database/kategori.php';
$kategori = get_all_kategori();
foreach ($kategori as $kategori) {
    ?>
            <div class="col col-md-2">
                <a href="produk.php?search=<?=$kategori['nama_kategori']?>" class="card card-body bg-light shadow-sm">
                    <!-- <img src="../assets/img/logo.png" alt="Kategori" width="100px"> -->
                    <p class="text-center text-dark"><?=$kategori['nama_kategori']?></p>
                </a>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<div class="card mt-5 shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between mb-4">
            <h4>Rekomendasi</h4>
            <a href="produk.php">Lihat Selengkapnya</a>
        </div>
        <section class="splide" aria-label="Slide Container Example">
            <div class="splide__track">
                <ul class="splide__list">

                    <?php
$produk = get_all_produk();
shuffle($produk);
foreach (array_slice($produk, 0, 12) as $produk) {
    ?>
                    <li class="splide__slide mx-2">
                        <div class="splide__slide__container">
                            <a href="detail_produk.php?id=<?=$produk['id_produk']?>"
                                class="text-decoration-none text-dark card bg-light">
                                <img src="../assets/upload/produk/<?=$produk['link_foto_produk']?>" class="card-img-top"
                                    height="150px" alt="<?=$produk['nama_produk']?>">
                                <div class="card-body" style="font-size: small;">
                                    <p class="card-title mb-1"><?=$produk['nama_produk']?></p>
                                    <p class="card-text font-weight-lighter"><i class="fa fa-store"></i>
                                        <?=$produk['nama_toko']?></p>
                                    <p class="card-text font-weight-bold">Rp <?=number_format($produk['harga'])?></p>
                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                </div>
                            </a>
                        </div>
                    </li>

                    <?php }?>
                </ul>
            </div>
        </section>

    </div>
</div>


<div class="card mt-5 shadow-sm mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between mb-4">
            <h4>Sering Dibeli</h4>
            <a href="produk.php">Lihat Selengkapnya</a>
        </div>

        <div class="row justify-content-center">
            <?php
$produk = get_all_produk();
shuffle($produk);
foreach (array_slice($produk, 0, 12) as $produk) {
    ?>
            <div class="col col-md-3 my-2">
                <a href="detail_produk.php?id=<?=$produk['id_produk']?>"
                    class="text-decoration-none text-dark card bg-light">
                    <img src="../assets/upload/produk/<?=$produk['link_foto_produk']?>" class="card-img-top"
                        height="150px" alt="<?=$produk['nama_produk']?>">
                    <div class="card-body" style="font-size: small;">
                        <p class="card-title mb-1"><?=$produk['nama_produk']?></p>
                        <p class="card-text font-weight-lighter"><i class="fa fa-store"></i> <?=$produk['nama_toko']?>
                        </p>
                        <p class="card-text font-weight-bold">Rp <?=number_format($produk['harga'])?></p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </a>
            </div>
            <?php }?>
        </div>

    </div>
</div>



<?php
include '../layout/footer.php'
?>