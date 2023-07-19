<?php
$tittle = "Data Penjual";
include('../../layout/master.php');
include('../../src/database/penjual.php');
include('../../src/database/users.php');
?>

<section id="manage_penjual">
    <div class="card mt-4">
        <div class="card-body">
            <!-- Button Tambah -->
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahModal">
                Tambah Data
            </button>
            <!-- End Button Tambah -->

            <!-- Modal Tambah -->
            <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="#" method="post">
                            <div class="modal-body">
                                <div class="row justify-content-center">

                                    <!-- Kiri -->
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input required type="text" class="form-control" id="username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input required type="email" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input required type="password" class="form-control" id="password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="user">User</label>
                                            <select class="form-control" id="user" name="user" required>
                                                <option value="" selected disabled>-- Pilih User --</option>
                                                <?php
                                                $u = get_all_user();
                                                foreach ($u as $us) {
                                                ?>
                                                    <option value="<?= $us['id_user'] ?>"><?= $us['nama'] ?></option>
                                                <?php
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Kiri End -->

                                    <!-- Kanan -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input required type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">No. HP</label>
                                            <input required type="text" class="form-control" id="no_hp" name="no_hp">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <!-- Kanan End -->
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
                            <th scope="col">Nama Toko</th>
                            <th scope="col">Status Toko</th>
                            <th scope="col">Deskripsi Toko</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <!-- End header table -->

                    <!-- Body table -->
                    <tbody>

                        <?php
                        $users = get_all_penjual();
                        $no = 1;
                        foreach ($users as $user) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $user['nama_toko'] ?></td>
                                <td><?= $user['status_toko'] ?></td>
                                <td><?= $user['deskripsi_toko'] ?></td>


                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $user['id_user'] ?>">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?= $user['id_user'] ?>">Hapus</button>
                                </td>
                            </tr>
                            <!-- Modal edit -->
                            <div class="modal fade" id="editModal<?= $user['id_user'] ?>" tabindex="-1" aria-labelledby="editModal<?= $user['id_user'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">edit Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="#" method="post">
                                            <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <!-- Kiri -->
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label for="username">Username</label>
                                                            <input required type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input required type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password">Password</label>
                                                            <input required type="password" class="form-control" id="password" name="password" value="<?= $user['password'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="user">User</label>
                                                            <select class="form-control" id="user" name="user" required>
                                                                <option value="" disabled>-- Pilih User --</option>
                                                                <?php
                                                                $u = get_all_user();
                                                                foreach ($u as $us) {
                                                                ?>
                                                                    <option value="<?= $us['id_user'] ?>" <?php if ($user['id_user'] == $us['id_user']) {
                                                                                                                echo "selected";
                                                                                                            } ?>><?= $us['nama'] ?></option>
                                                                <?php
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <!-- Kiri End -->

                                                    <!-- Kanan -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nama_lengkap">Nama Lengkap</label>
                                                            <input required type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $user['nama'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="no_hp">No. HP</label>
                                                            <input required type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $user['no_hp'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="alamat">Alamat</label>
                                                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5" required><?= $user['alamat_user'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- Kanan End -->
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

                            <!-- Modal hapus -->
                            <div class="modal fade" id="hapusModal<?= $user['id_penjual'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModal1Label" aria-hidden="true">
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
                                                <input type="hidden" name="id" value="<?= $user['id_penjual'] ?>">
                                                <button type="submit" name="delete_data" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal hapus -->
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

// Simpan data
if (isset($_POST['save_tambah'])) {
    $nama_toko = $_POST['nama_toko'];
    $status_toko = $_POST['status_toko'];
    $deskripsi_toko = $_POST['deskripsi_toko'];

    $result = create_penjual($nama_toko, $status_toko, $deskripsi_toko);
    if ($result) {
        echo "<script>alert('Data berhasil ditambahkan')</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}
// end simpan data

// Edit data
if (isset($_POST['save_edit'])) {
    $nama_toko = $_POST['nama_toko'];
    $status_toko = $_POST['status_toko'];
    $deskripsi_toko = $_POST['deskripsi_toko'];

    $result = update_user($nama_toko, $status_toko, $deskripsi_toko);
    if ($result) {
        echo "<script>alert('Data berhasil diubah')</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Data gagal diubah')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}
// end edit data

// Hapus data
if (isset($_POST['delete_data'])) {
    $id_penjual = $_POST['id'];
    $result = delete_penjual($id_penjual);
    if ($result) {
        echo "<script>alert('Data berhasil dihapus')</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Data gagal dihapus')</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}
// end hapus data
include('../../layout/footer.php') ?>