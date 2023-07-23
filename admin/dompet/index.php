<?php
$tittle = "Data Dompet";
include('../../layout/master.php');
include('../../src/database/dompet.php');
include('../../src/database/penjual.php');
include_once('../../src/database/riwayat_dompet.php');
?>

<section id="manage_dompet">
    <div class="card mt-4">
        <div class="card-body">

            <!-- Table data -->
            <div class="table-responsive">

                <table class="table table-striped " id="table">
                    <!-- header tabel -->
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Toko / Penjual</th>
                            <th scope="col">Saldo</th>
                            <th scope="col">Riwayat</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <!-- End header table -->

                    <!-- Body table -->
                    <tbody>

                        <?php
                        $dom = get_all_dompet();
                        $no = 1;
                        foreach ($dom as $d) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $d['nama_toko'] ?></td>
                                <td>Rp <?= number_format($d['saldo']) ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#riwayatModal<?= $d['id_dompet'] ?>">Lihat Riwayat</a>

                                    <!-- Modal Riwayat -->
                                    <div class="modal fade" id="riwayatModal<?= $d['id_dompet'] ?>" tabindex="-1" aria-labelledby="riwayatModal<?= $d['id_dompet'] ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="riwayatModalLabel">Riwayat Penarikan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    $riwayat = get_riwayat($d['id_dompet']);

                                                    if (count($riwayat) == 0) {
                                                        echo "Tidak ada riwayat";
                                                    } else {
                                                    ?>
                                                        <table class="table table-bordered">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th scope="col">No</th>
                                                                    <th scope="col">Saldo Ditarik</th>
                                                                    <th scope="col">Tanggal Ditarik</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $no1 = 1;
                                                                foreach ($riwayat as $r) {
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?= $no1 ?></th>
                                                                        <td>Rp <?= number_format($r['saldo_ditarik']) ?></td>
                                                                        <td><?= $r['tanggal_ditarik'] ?></td>
                                                                    </tr>
                                                                <?php
                                                                    $no1++;
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>

                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $d['id_dompet'] ?>">Edit</button>
                                </td>
                            </tr>

                            <!-- Modal edit -->
                            <div class="modal fade" id="editModal<?= $d['id_dompet'] ?>" tabindex="-1" aria-labelledby="editModal<?= $d['id_dompet'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="#" method="post">
                                            <input type="hidden" name="id_dompet" value="<?= $d['id_dompet'] ?>">
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="penjual">Penjual/Toko</label>
                                                    <select class="form-control" id="penjual" name="penjual" required disabled>
                                                        <option value="" disabled>-- Pilih Role --
                                                        </option>
                                                        <?php
                                                        $penjual = get_all_penjual();
                                                        foreach ($penjual as $p) { ?>
                                                            <option value="<?= $p['id_penjual'] ?>" <?php if ($p['id_penjual'] == $d['id_penjual']) {
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
                                                        <input type="number" class="form-control" id="saldo" name="saldo" placeholder="Saldo" value="<?= $d['saldo'] ?>">
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
                            $no++;
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
if (isset($_POST['save_edit'])) {
    $id_dompet = $_POST['id_dompet'];
    $saldo = $_POST['saldo'];

    if (update_dompet($id_dompet, $saldo)) { ?>
        <script>
            Swal.fire({
                title: 'Success!',
                text: 'Berhasil Memperbarui Status Transaksi!',
                icon: 'success',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "index.php";

                }
            });
        </script>
    <?php } else { ?>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Gagal Memperbarui Status Transaksi!',
                icon: 'error',
                confirmButtonText: 'Back!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "index.php";

                }
            });
        </script>
<?php }
}
?>