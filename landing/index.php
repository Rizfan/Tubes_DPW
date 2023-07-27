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
        <div class="carousel-item active" data-interval="1000">
            <img class="d-block w-100 " style="max-height: 300px;" src="../assets/img/SelamatDatang!.png" alt="First slide">
        </div>
        <div class="carousel-item" data-interval="1000">
            <img class="d-block w-100 " style="max-height: 300px;" src="../assets/img/SelamatDatang!1).png" alt="First slide">
        </div>
        <div class="carousel-item" data-interval="1000">
            <img class="d-block w-100" style="max-height: 300px;" src="../assets/img/selamatdatang.png" alt="Third slide">
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

<div class="card mt-5">
    <div class="card-header">
        Produk Unggulan
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <?php
            $produk = get_all_produk();
            shuffle($produk);
            foreach ($produk as $produk) {
            ?>
                <div class="col col-md-3 my-2">
                    <a href="detail_produk.php?id=<?= $produk['id_produk'] ?>" class="text-decoration-none text-dark">
                        <div class="card">
                            <img src="../assets/upload/produk/<?= $produk['link_foto_produk'] ?>" class="card-img-top" height="200px" alt="<?= $produk['nama_produk'] ?>">
                            <div class="card-body">
                                <h5 class="card-title mb-1"><?= $produk['nama_produk'] ?></h5>
                                <p class="card-text font-weight-lighter"><i class="fa fa-store"></i> <?= $produk['nama_toko'] ?></p>
                                <p class="card-text font-weight-bold">Rp <?= number_format($produk['harga']) ?></p>
                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header">
        Bibit Lele
    </div>
    <div class="card-body">
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Benih Rispan</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                        to
                        additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Benih Sandro</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional
                        content.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This card has even longer content than the first to show that equal
                        height action.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include '../layout/footer.php'
?>