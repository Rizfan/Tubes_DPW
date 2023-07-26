<?php
include __DIR__ . './../src/proses/proses_session.php';
$get_keranjang = session_manager("get_session", [
    "keranjang",
]);

$tittle = 'Keranjang';
$total_semua = 0;
include_once '../layout/navbar.php';

include __DIR__ . './../src/database/produk.php';

?>
<section id="keranjang" class="mt-4">
    <div class="row">
        <div class="col col-md-8">
            <h3>Keranjang</h3>
            <hr>

            <?php

            if ($get_keranjang['keranjang'] == null) {
                echo "<h5>Keranjang Kosong</h5>";
            } else {
            ?>


                <?php

                foreach ($get_keranjang['keranjang'] as $key => $value) {

                    $id_produk = explode("-", $value)[0];
                    $jumlah = explode("-", $value)[1];

                    $detail = get_produk_by_id($id_produk);
                    $total_harga_produk = $jumlah * $detail['harga'];

                    $total_semua += $total_harga_produk;

                ?>
                    <!-- Foreach -->
                    <p><i class="fa fa-store"></i><b class="ml-1"><?= $detail['nama_toko'] ?></b></p>
                    <div class="row">
                        <div class="col col-md-3">
                            <img src="../assets/upload/produk/<?= $detail['link_foto_produk'] ?>" style="max-width: 150px;" alt="Nama Produk">
                        </div>
                        <div class="col col-md-9">
                            <p class="mb-0"><b><?= $detail['nama_produk'] ?> | Rp.<?= number_format($detail['harga']) ?></b></p>
                            <p>Jumlah : <?= $jumlah ?></p>
                            <p class="font-weight-bold" id="produk_<?= $id_produk ?>">Rp.
                                <?= number_format($total_harga_produk) ?>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <!-- endforech -->
            <?php

                }
            }
            ?>
        </div>
        <div class="col col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>Ringkasan</h4>
                    <hr>
                    <div class="d-flex justify-content-between">

                        <?php
                        if ($get_keranjang['keranjang'] == null) {
                        ?>

                            <p>Total Harga</p>
                            <p>Rp. 0</p>

                        <?php
                        } else {
                        ?>
                            <p>Total Harga (<?= count($get_keranjang['keranjang']) ?> Barang)</p>
                            <p class="font-weight-bold" name="total_semua_harga">Rp. <?= number_format($total_semua) ?></p>

                        <?php
                        }
                        ?>

                    </div>
                    <hr>
                    <button class="btn btn-primary btn-block

                    <?php
                    if ($get_keranjang['keranjang'] == null) {
                        echo "disabled";
                    }

                    ?>





                    ">Beli</button>
                </div>
            </div>
        </div>
    </div>
</section>


<?php

include_once '../layout/footer.php';

?>


<script type="text/javascript">

</script>