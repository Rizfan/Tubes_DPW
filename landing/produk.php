<?php
$tittle = "Detail Produk";
include_once '../layout/navbar.php';
include __DIR__ . './../src/database/produk.php';

?>
<section id="produk" class="mt-4">
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
</section>