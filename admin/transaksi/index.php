<?php
$tittle = "Data Transaksi";
include('../../layout/master.php');
include('../../src/database/transaksi.php');
include('../../src/database/penjual.php');
include('../../src/database/users.php');
?>

<section id="manage_transaksi">
    <div class="card mt-4">
        <div class="card-body">

            <!-- Button Tambah -->
            <!-- <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahModal">
                Tambah Data
            </button> -->
            <!-- End Button Tambah -->


            <!-- Modal Tambah -->
            <!-- <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModal" aria-hidden="true">
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
                                    <label for="user">Pembeli</label>
                                    <select class="form-control" id="user" name="user" required>
                                        <option value="" selected disabled>-- Pilih Pembeli --</option>
                                        <?php
                                        $u = get_all_user();
                                        foreach ($u as $us) {
                                        ?>
                                            <option value="<?= $us['id_user'] ?>"><?= $us['nama'] ?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_toko">Nama Toko</label>
                                    <input required type="text" class="form-control" id="nama_toko" name="nama_toko">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_toko">Deskripsi Toko</label>
                                    <textarea name="deskripsi_toko" id="deskripsi_toko" class="form-control" cols="30" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="save_tambah" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->
            <!-- End Modal Tambah -->

            <!-- Table data -->
            <div class="table-responsive">

                <table class="table  table-striped " id="table">
                    <!-- header tabel -->
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Pembeli</th>
                            <!-- <th scope="col">Toko / Penjual</th> -->
                            <th scope="col">Total Pembelian</th>
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
                        $trans = get_all_transaksi();
                        $no = 1;
                        foreach ($trans as $t) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $t['nama'] ?></td>
                                <!-- <td><?= $t['nama_toko'] ?></td> -->
                                <td>Rp <?= number_format($t['total_harga_pembelian']) ?>,-</td>
                                <td>
                                    <?php if ($t['status_pembayaran'] == "Lunas") { ?>
                                        <span class="badge badge-success">Lunas</span>
                                    <?php } else { ?>
                                        <span class="badge badge-danger">Belum Lunas</span>
                                    <?php } ?>
                                </td>
                                <td>

                                    <select id="status<?= $no ?>" class="form-control" onchange="updateSTATUS(<?= $no++ ?>)">
                                        <?php if ($t['status_transaksi'] == "Proses") {
                                            if ($t['status_pembayaran'] == "Belum Lunas") {
                                        ?>

                                                <option value="<?= $t['id_transaksi'] ?>_Proses" selected disabled>Proses</option>
                                                <option value="<?= $t['id_transaksi'] ?>_Selesai" disabled>Selesai</option>
                                                <option value="<?= $t['id_transaksi'] ?>_Batal">Batal</option>
                                            <?php } else { ?>

                                                <option value="<?= $t['id_transaksi'] ?>_Proses" selected disabled>Proses</option>
                                                <option value="<?= $t['id_transaksi'] ?>_Selesai">Selesai</option>
                                                <option value="<?= $t['id_transaksi'] ?>_Batal">Batal</option>
                                            <?php }
                                        } elseif ($t['status_transaksi'] == "Selesai") { ?>
                                            <option value="<?= $t['id_transaksi'] ?>_Selesai" selected disabled>Selesai</option>
                                        <?php } else { ?>
                                            <option value="<?= $t['id_transaksi'] ?>_Batal">Batal</option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td><?= $t['tanggal_transaksi'] ?></td>
                                <?php if ($t['status_pembayaran'] == "Belum Lunas") { ?>
                                    <td>Belum dibayar</td>
                                <?php } else { ?>
                                    <td><?= $t['tanggal_pembayaran'] ?></td>
                                <?php } ?>
                                <td>
                                    <a href="detail_transaksi.php?id=<?= $t['id_transaksi'] ?>" class="btn my-1 btn-success btn-sm">Detail Transaksi</a>

                                    <form action="#" method="post">
                                        <input type="hidden" value="<?= $t['id_transaksi'] ?>" name="id">
                                        <?php if ($t['status_pembayaran'] == "Lunas") {
                                            if ($t['status_transaksi'] == "Selesai" || $t['status_transaksi'] == "Batal") {
                                        ?>
                                                <input type="hidden" value="Belum Lunas" name="status">
                                                <button class="btn btn-danger btn-sm" type="submit" name="bayar" disabled>Batal Bayar</button>
                                            <?php } else {
                                            ?>
                                                <input type="hidden" value="Belum Lunas" name="status">
                                                <button class="btn btn-danger btn-sm" type="submit" name="bayar">Batal Bayar</button>
                                            <?php
                                            }
                                        } else {
                                            if ($t['status_transaksi'] == "Batal") { ?>
                                                <input type="hidden" value="Belum Lunas" name="status">
                                                <button class="btn btn-info btn-sm" type="submit" name="bayar" disabled>Bayar</button>
                                            <?php } else { ?>
                                                <input type="hidden" value="Lunas" name="status">
                                                <button class="btn btn-info btn-sm" type="submit" name="bayar">Bayar</button>
                                        <?php }
                                        }
                                        ?>
                                    </form>
                                </td>
                            </tr>
                            <!-- Modal edit -->
                            <div class="modal fade" id="editModal<?= $t['id_transaksi'] ?>" tabindex="-1" aria-labelledby="editModal<?= $t['id_transaksi'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="#" method="post">
                                            <input type="hidden" name="id_transaksi" value="<?= $t['id_transaksi'] ?>">
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="penjual">Penjual/Toko</label>
                                                    <select class="form-control" id="penjual" name="penjual" required disabled>
                                                        <option value="" disabled>-- Pilih Role --
                                                        </option>
                                                        <?php
                                                        $penjual = get_all_penjual();
                                                        foreach ($penjual as $p) { ?>
                                                            <option value="<?= $p['id_penjual'] ?>" <?php if ($p['id_penjual'] == $t['id_penjual']) {
                                                                                                        echo "selected";
                                                                                                    } ?>><?= $p['nama_toko'] ?></option>
                                                        <?php
                                                        } ?>
                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <label for="saldo">Saldo</label>

                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Rp</div>
                                                        </div>
                                                        <input type="number" class="form-control" id="saldo" placeholder="Saldo" value="<?= $t['total_harga_pembelian'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="save_edit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal edit -->

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
include('../../layout/footer.php');

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