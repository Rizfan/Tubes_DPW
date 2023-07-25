<?php
$tittle = "Detail Produk";
include_once '../layout/navbar.php';
include_once '../src/database/database.php';
include_once '../src/database/produk.php';
$id = $_GET['id'];
$produk = get_produk_by_id($id);
?>
<div class="container">
    <div class="row">
        <div class="col col-md-9 mt-2">
            <div class="card p-2">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col col-md-6">
                            <img src="../assets/upload/produk/112193035_20200213_103459.jpg " alt="Produk" style="height:400px; width:350px;">
                        </div>
                        <div class="col col-md-6">
                            <h4 class="font-weight-bold"><?= $produk['nama_produk'] ?></h4>
                            <p class="font-weight-light">Dijual oleh : <?= $produk['nama_toko'] ?></p>
                            <h3>Rp <?= number_format($produk['harga']) ?>,-</h3>
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
                        <input type="number" class="form-control" placeholder="0" aria-label="jumlah" onchange="tambah()" aria-describedby="basic-addon1">
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Subtotal</p>
                        <input type="hidden" class="form-control" id="total" name="total" readonly>
                        <p class="font-weight-bold">Rp 100.000</p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p>Total</p>
                        <p class="font-weight-bold">Rp 100.000</p>
                    </div>
                    <button class="btn btn-primary btn-block">Beli</button>
                    <button class="btn btn-outline-primary btn-block">Keranjang</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/jquery/jquery.min.js"></script>

<script>
    function tambah() {
        var jumlah = document.getElementById('jumlah').value;
        var harga = document.getElementById('harga').value;
        var total = jumlah * harga;
        document.getElementById('total').textContent = total;
    }
</script>


</body>

</html>