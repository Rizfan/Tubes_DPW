<?php
$tittle = "Detail Produk";
include_once '../layout/navbar.php';
include_once '../src/database/database.php';
include_once '../src/database/produk.php';
$id = $_GET['id'];
$produk = get_produk_by_id($id);

?>
<section id="detail" class="mt-4">

    <div class="row">
        <div class="col col-md-9 mt-2">
            <div class="card p-2">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col col-md-6">
                            <img src="../assets/upload/produk/<?= $produk['link_foto_produk'] ?>" alt="Produk" style="height:400px; width:350px;">
                        </div>
                        <div class="col col-md-6">
                            <input type="hidden" id="id_produk" value="<?= $produk['id_produk'] ?>" name="id_produk" hidden>
                            <h4 class="font-weight-bold"><?= $produk['nama_produk'] ?></h4>
                            <p class="font-weight-light">Dijual oleh : <?= $produk['nama_toko'] ?></p>
                            <h3 id="harga_produk" name="harga_produk" desc="<?= number_format($produk['harga']) ?>">Rp
                                <?= number_format($produk['harga']) ?>,-</h3>
                            <hr>
                            <h5>Deskripsi Produk</h5>
                            <p class="text-justify"><?= $produk['deskripsi_produk'] ?></p>
                            <hr>
                            <h5>Kategori</h5>
                            <p class=""><?= $produk['nama_kategori'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-md-3 mt-2">
            <div class="card">
                <div class="card-body">
                    <h4>Pembelian</h4>
                    <hr>
                    <p>Stok : <?= $produk['stok'] ?></p>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Jumlah</span>
                        </div>
                        <input type="number" class="form-control" placeholder="0" aria-label="jumlah" aria-describedby="basic-addon1" name="jumlah" id="jumlah">
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Subtotal</p>
                        <input type="hidden" class="form-control" id="total" name="total" readonly>
                        <p class="font-weight-bold" id="total_harga">Rp.</p>
                    </div>
                    <hr>
                    <?php if ($produk['stok'] > 0) { ?>
                        <button class="btn btn-primary btn-block" id="btn_beli" name="btn_beli">Beli</button>
                        <button class="btn btn-outline-primary btn-block" id="btn_keranjang" name="btn_keranjang">Keranjang</button>

                    <?php } else { ?>
                        <button disabled="disabled" class="btn btn-primary btn-block">Stok Tidak Tersedia</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include '../layout/footer.php';
?>

<script>
    function tambah() {
        var jumlah = document.getElementById('jumlah').value;
        var harga = document.getElementById('harga').value;
        var total = jumlah * harga;
        document.getElementById('total').textContent = total;
    }
</script>


<script type="text/javascript">
    $(document).ready(function() {

        var id_produk = document.getElementById('id_produk').value;
        var stok = <?= $produk['stok'] ?>;

        var btn_keranjang = document.getElementById('btn_keranjang');
        btn_keranjang.addEventListener('click', function() {
            var jumlah = document.getElementById('jumlah').value;

            if (jumlah == 0) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Jumlah Tidak Boleh 0!',
                    icon: 'error',
                    confirmButtonText: 'Yes!'
                });
                return;
            }



            if (jumlah > stok) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Jumlah Melebihi Stok!',
                    icon: 'error',
                    confirmButtonText: 'Yes!'
                });

                jumlah.value = 0;

                return;
            }

            var site = document.location.origin;
            $.ajax({
                url: site + '/TUBES_DPW/src/proses/proses_add_keranjang.php',
                type: 'GET',
                data: {
                    id_produk: id_produk,
                    jumlah: jumlah
                },
                success: function(data) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Berhasil Menambahkan Produk ke Keranjang!',
                        icon: 'success',
                        confirmButtonText: 'Yes!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "detail_produk.php?id=<?= $id ?>";

                        }
                    });
                }
            });
        });



        var jumlah = document.getElementById('jumlah');
        // add event onchange
        jumlah.addEventListener('change', function() {
            var harga = document.getElementById('harga_produk').getAttribute('desc');
            var total = jumlah.value * parseInt(harga);
            document.getElementById('total_harga').textContent = "Rp " + total.toLocaleString("id-ID", {
                minimumFractionDigits: 3
            });
        });
    });
</script>