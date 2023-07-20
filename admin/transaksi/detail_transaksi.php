<?php
$tittle = "Data Transaksi";
include('../../layout/master.php');
include('../../src/database/transaksi.php');
include('../../src/database/detail_transaksi.php');
$id_transaksi = $_GET['id'];
?>
<section id="detail_transaksi">

    <div class="card mt-4">
        <div class="card-body">

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
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm my-1" data-toggle="modal" data-target="#editModal<?= $d['id_detail_transaksi'] ?>">Edit</button>
                                    <a href="../../src/database/detail_transaksi.php?aksi=delete&id=<?= $d['id_detail_transaksi'] ?>" class="btn btn-danger btn-sm my-1">Delete</a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>