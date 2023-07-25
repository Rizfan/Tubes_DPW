<?php
$tittle = "Data Detail Transaksi";
include_once('../../layout/master.php');
include_once('../../src/database/transaksi.php');
include_once('../../src/database/produk.php');
include_once('../../src/database/detail_transaksi.php');
$id_transaksi = $_GET['id'];
$t = get_transaksi($id_transaksi);
?>
<section id="detail_transaksi">

    <div class="card mt-4">
        <div class="card-body">


            <!-- Button Tambah -->
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahModal" <?php if ($t['status_pembayaran'] != "Belum Lunas" || $t['status_transaksi'] != "Proses") {
                                                                                                                    echo "disabled";
                                                                                                                } ?>>
                Tambah Data
            </button>
            <!-- End Button Tambah -->

            <!-- Modal Tambah -->
            <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="#" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="produk">Produk</label>
                                    <select class="form-control" id="produk" name="produk" required>
                                        <option value="" selected disabled>-- Pilih Produk --</option>
                                        <?php
                                        $u = get_all_produk();
                                        foreach ($u as $us) {
                                        ?>
                                            <option value="<?= $us['id_produk'] . '_' . $us['harga'] ?>"><?= $us['nama_produk'] ?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="qty">Jumlah</label>
                                    <input required type="text" class="form-control" id="qty" name="qty">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="save_tambah" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Modal Tambah -->

            <!-- Table data -->
            <div class="table-responsive">

                <table class="table  table-striped " id="table">
                    <!-- header tabel -->
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <!-- End header table -->

                    <!-- Body table -->
                    <tbody>

                        <?php
                        $detail = get_detail($id_transaksi);
                        $no = 1;
                        foreach ($detail as $d) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $d['nama_produk'] ?></td>
                                <td>Rp <?= number_format($d['harga']) ?>,-</td>
                                <td><?= $d['jumlah_barang'] ?></td>
                                <td>Rp <?= number_format($d['harga'] * $d['jumlah_barang']) ?>,-</td>
                                <td><?php if ($t['status_pembayaran'] != "Belum Lunas" && $t['status_transaksi'] != "Proses") { ?>
                                        <button type="button" class="btn btn-primary btn-sm my-1" data-toggle="modal" data-target="#editModal<?= $d['id_detail_transaksi'] ?>" disabled>Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm my-1" data-toggle="modal" data-target="#hapusModal<?= $d['id_detail_transaksi'] ?>" disabled>Hapus</button>
                                    <?php } else { ?>

                                        <button type="button" class="btn btn-primary btn-sm my-1" data-toggle="modal" data-target="#editModal<?= $d['id_detail_transaksi'] ?>">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm my-1" data-toggle="modal" data-target="#hapusModal<?= $d['id_detail_transaksi'] ?>">Hapus</button>

                                        <!-- Modal hapus -->
                                        <div class="modal fade" id="hapusModal<?= $d['id_detail_transaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModal1Label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="hapusModal1Label">Konfirmasi Penghapusan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus data pengguna ini?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <form action="#" method="POST">
                                                            <input type="hidden" name="id" value="<?= $d['id_detail_transaksi'] ?>">
                                                            <input type="hidden" name="produk" value="<?= $d['id_produk'] ?>">
                                                            <input type="hidden" name="harga" value="<?= $d['harga'] ?>">
                                                            <input type="hidden" name="jml" value="<?= $d['jumlah_barang'] ?>">
                                                            <button type="submit" name="delete_data" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal hapus -->
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>

                </table>
                <a href="index.php" class="btn btn-outline-danger">Kembali</a>
            </div>
        </div>
    </div>
</section>

<?php
include('../../layout/footer.php');

if (isset($_POST['save_tambah'])) {
    $data = explode('_', $_POST['produk']);
    $id_produk = $data[0];
    $jumlah_barang = $_POST['qty'];
    $harga = $data[1];
    $id_transaksi = $id_transaksi;



    $cek_stok = cek_stok($id_produk, $jumlah_barang);
    if ($cek_stok) {
        $stok = get_produk_by_id($id_produk);
        $jumlah_barang1 = $stok['stok'] - $jumlah_barang;
        $update_stok = update_stok($id_produk, $jumlah_barang1);
        $total_pembelian = $harga * $jumlah_barang;
        $t = get_transaksi($id_transaksi);
        $total_harga = $t['total_harga_pembelian'] + $total_pembelian;
        $r = update_total($total_harga, $id_transaksi);
        $cek_detail = cek_detail($id_transaksi, $id_produk);
        if ($cek_detail) {
            $total = $cek_detail['jumlah_barang'] + $jumlah_barang;
            $result = update_jumlah_produk($id_transaksi, $id_produk, $total);
        } else {
            $result = create_detail_transaksi($id_transaksi, $id_produk, $jumlah_barang);
        }


        if ($result && $r) { ?>
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Berhasil Menambahkan Produk yang Dibeli!',
                    icon: 'success',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "detail_transaksi.php?id=<?= $id_transaksi ?>";

                    }
                });
            </script>
        <?php } else { ?>
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Gagal Menambahkan Produk yang Dibeli!',
                    icon: 'error',
                    confirmButtonText: 'Back!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "detail_transaksi.php?id=<?= $id_transaksi ?>";

                    }
                });
            </script>
        <?php
        }
    } else { ?>
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: 'Stok yang tersedia tidak mencukupi!',
                icon: 'error',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "detail_transaksi.php?id=<?= $id_transaksi ?>";

                }
            });
        </script>

    <?php }
}

if (isset($_POST['delete_data'])) {
    $id = $_POST['id'];
    $id_produk = $_POST['produk'];
    $harga = $_POST['harga'];
    $jumlah_barang = $_POST['jml'];
    $produk = get_produk_by_id($id_produk);
    $id_transaksi = $id_transaksi;
    $stok = $produk['stok'] + $jumlah_barang;
    $update_stok = update_stok($id_produk, $stok);
    $total_pembelian = $harga * $jumlah_barang;
    $t = get_transaksi($id_transaksi);
    $total_harga = $t['total_harga_pembelian'] - $total_pembelian;
    $r = update_total($total_harga, $id_transaksi);
    $result = delete_detail_transaksi($id);
    if ($result && $r) { ?>
        <script>
            Swal.fire({
                title: 'Success!',
                text: 'Berhasil Menghapus Produk yang Dibeli!',
                icon: 'success',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "detail_transaksi.php?id=<?= $id_transaksi ?>";

                }
            });
        </script>
    <?php } else { ?>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Gagal Menghapus Produk yang Dibeli!',
                icon: 'error',
                confirmButtonText: 'Back!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "detail_transaksi.php?id=<?= $id_transaksi ?>";

                }
            });
        </script>
<?php
    }
}


?>