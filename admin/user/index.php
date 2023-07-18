<?php
$tittle = "Data Pengguna";
include('../../layout/master.php');
include('../../src/database/users.php');
?>
<section id="manage_user">
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
                                            <label for="role">Role</label>
                                            <select class="form-control" id="role" name="role" required>
                                                <option value="" selected disabled>-- Pilih Role --</option>
                                                <option value="Admin">Admin</option>
                                                <option value="User">User</option>
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
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Role</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <!-- End header table -->

                    <!-- Body table -->
                    <tbody>

                        <?php
                        $users = get_all_user();
                        $no = 1;
                        foreach ($users as $user) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['nama'] ?></td>
                                <td><?= $user['role'] ?></td>

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
                                                            <label for="role">Role</label>
                                                            <select class="form-control" id="role" name="role" required>
                                                                <option value="" disabled>-- Pilih Role --
                                                                </option>
                                                                <option value="Admin" <?php if ($user['role'] == "Admin") {
                                                                                            echo "selected";
                                                                                        } ?>>Admin</option>
                                                                <option value="User" <?php if ($user['role'] == "User") {
                                                                                            echo "selected";
                                                                                        } ?>>User</option>
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
                            <div class="modal fade" id="hapusModal<?= $user['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModal1Label" aria-hidden="true">
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
                                                <input type="hidden" name="id" value="<?= $user['id_user'] ?>">
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
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $link_foto_user = "";
    $tanggal_lahir = "";

    $result = create_user($username, $password, $email, $nama_lengkap, $no_hp, $link_foto_user, $tanggal_lahir, $role, $alamat);
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
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $link_foto_user = "";
    $tanggal_lahir = "";

    $result = update_user($id_user, $username, $password, $email, $nama_lengkap, $no_hp, $link_foto_user, $tanggal_lahir, $role, $alamat);
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
    $id_user = $_POST['id'];
    $result = delete_user($id_user);
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