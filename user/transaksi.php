<?php

include '../src/proses/proses_session.php';

if (session_manager("get_session", ["role"])['role'] == "Penjual") {
    redirect_to_role_page("http://localhost/Tubes_DPW/");
}

$id_user = session_manager("get_session", ['id_user'])['id_user'];

$tittle = "Data Transaksi";
include '../layout/master_dashboard.php';
include '../src/database/transaksi.php';
include '../src/database/penjual.php';
include '../src/database/users.php';
?>

<section id="manage_transaksi">
    <div class="card mt-4">
        <div class="card-body">


            <!-- Table data -->
            <div class="table-responsive">

                <table class="table  table-striped " id="table">
                    <!-- header tabel -->
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Pembeli</th>
                            <!-- <th scope="col">Toko / Penjual</th> -->
                            <!-- <th scope="col">Total Pembelian</th> -->
                            <th scope="col">Status Pembayaran</th>
                            <th scope="col">Status Transaksi</th>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Tanggal Pembayaran</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <!-- End header table -->

                    <!-- Body table -->
                    <tbody>

                        <?php
                        $trans = get_all_transaksi_pembeli($id_user);
                        $no = 1;
                        foreach ($trans as $t) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $t['nama'] ?></td>
                                <!-- <td><?= $t['nama_toko'] ?></td> -->
                                <!-- <td>Rp <?= number_format($t['total_harga_pembelian']) ?>,-</td> -->
                                <td>
                                    <?php if ($t['status_pembayaran'] == "Lunas") { ?>
                                        <span class="badge badge-success">Lunas</span>
                                    <?php } else { ?>
                                        <span class="badge badge-danger">Belum Lunas</span>
                                    <?php } ?>
                                </td>
                                <td>

                                    <?php if ($t['status_transaksi'] == "Proses") { ?>
                                        <span class="badge badge-warning">Proses</span>
                                    <?php } else if ($t['status_transaksi'] == "Selesai") { ?>
                                        <span class="badge badge-success">Selesai</span>
                                    <?php } else { ?>
                                        <span class="badge badge-danger">Batal</span>
                                    <?php } ?>
                                </td>
                                <td><?= $t['tanggal_transaksi'] ?></td>
                                <?php if ($t['status_pembayaran'] == "Belum Lunas") { ?>
                                    <td>Belum dibayar</td>
                                <?php } else { ?>
                                    <td><?= $t['tanggal_pembayaran'] ?></td>
                                <?php } ?>
                                <td>
                                    <a href="detail_transaksi.php?id=<?= $t['id_transaksi'] ?>" class="btn my-1 btn-success btn-sm">Detail Transaksi</a>

                                </td>
                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>
                    <!-- End body table -->
                </table>
            </div>
            <!-- End Table -->
        </div>
    </div>
</section>
<?php
include('../layout/footer.php');

if (isset($_POST['bayar'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $tanggal = date("Y-m-d H:i:s");
    $result = bayar($id, $status, $tanggal);
    if ($result) { ?>
        <script>
            Swal.fire({
                title: 'Success!',
                text: 'Berhasil Mengubah Status Pembayaran!',
                icon: 'success',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.reload();
                    window.location = "index.php";

                }
            });
        </script>
    <?php } else { ?>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Gagal Mengubah Status Pembayaran!',
                icon: 'error',
                confirmButtonText: 'Back!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.reload();
                    window.location = "index.php";

                }
            });
        </script>
<?php }
}
?>