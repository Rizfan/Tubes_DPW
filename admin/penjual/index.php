<?php

include '../../src/proses/proses_session.php';

if (session_manager("get_session", ["role"])['role'] != "Admin") {
    redirect_to_role_page("http://localhost/Tubes_DPW/");
}

$tittle = "Data Penjual";
include '../../layout/master.php';
include '../../src/database/penjual.php';
include '../../src/database/users.php';
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
                                    <label for="user">User</label>
                                    <select class="form-control" id="user" name="user" required>
                                        <option value="" selected disabled>-- Pilih User --</option>
                                        <?php
$u = get_all_user();
foreach ($u as $us) {
    ?>
                                        <option value="<?=$us['id_user']?>"><?=$us['nama']?></option>
                                        <?php
}?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_toko">Nama Toko</label>
                                    <input required type="text" class="form-control" id="nama_toko" name="nama_toko">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_toko">Deskripsi Toko</label>
                                    <textarea name="deskripsi_toko" id="deskripsi_toko" class="form-control" cols="30"
                                        rows="5" required></textarea>
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
                            <th scope="row"><?=$no?></th>
                            <td><?=$user['nama_toko']?></td>
                            <td><?=$user['status_toko']?></td>
                            <td><?=$user['deskripsi_toko']?></td>


                            <td>
                                <a href="produk.php?id=<?=$user['id_penjual']?>" class="btn btn-success btn-sm">Lihat
                                    Produk</a>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#editModal<?=$user['id_penjual']?>">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#hapusModal<?=$user['id_penjual']?>">Hapus</button>
                            </td>
                        </tr>
                        <!-- Modal edit -->
                        <div class="modal fade" id="editModal<?=$user['id_penjual']?>" tabindex="-1"
                            aria-labelledby="editModal<?=$user['id_penjual']?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">edit Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="#" method="post">
                                        <input type="hidden" name="id_penjual" value="<?=$user['id_penjual']?>">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="user">User</label>
                                                <select class="form-control" id="user" name="user" required disabled>
                                                    <?php
$u = get_all_user();
    foreach ($u as $us) {
        ?>
                                                    <option value="<?=$us['id_user']?>" <?php if ($user['id_user'] == $us['id_user']) {
            echo "selected";
        }?>><?=$us['nama']?></option>
                                                    <?php
}?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_toko">Nama Toko</label>
                                                <input required type="text" class="form-control" id="nama_toko"
                                                    name="nama_toko" value="<?=$user['nama_toko']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="status_toko">Status Toko</label>
                                                <select name="status_toko" id="status_toko" class="form-control"
                                                    required>
                                                    <option value="" selected disabled>-- Pilih Status --</option>
                                                    <option value="Aktif" <?php if ($user['status_toko'] == "Aktif") {
        echo "selected";
    }?>>Aktif</option>
                                                    <option value="Tidak Aktif" <?php if ($user['status_toko'] == "Tidak Aktif") {
        echo "selected";
    }?>>Tidak Aktif</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi_toko">Deskripsi Toko</label>
                                                <textarea name="deskripsi_toko" id="deskripsi_toko" class="form-control"
                                                    cols="30" rows="5" required><?=$user['deskripsi_toko']?></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" name="save_edit" class="btn btn-primary">Save
                                                changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal edit -->

                        <!-- Modal hapus -->
                        <div class="modal fade" id="hapusModal<?=$user['id_penjual']?>" tabindex="-1" role="dialog"
                            aria-labelledby="hapusModal1Label" aria-hidden="true">
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
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <form action="#" method="POST">
                                            <input type="hidden" name="id" value="<?=$user['id_penjual']?>">
                                            <button type="submit" name="delete_data"
                                                class="btn btn-danger">Hapus</button>
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

include '../../layout/footer.php';
// Simpan data
if (isset($_POST['save_tambah'])) {
    $id_user = $_POST['user'];
    $nama_toko = $_POST['nama_toko'];
    $status_toko = "Aktif";
    $deskripsi_toko = $_POST['deskripsi_toko'];

    $result = create_penjual($id_user, $nama_toko, $status_toko, $deskripsi_toko);
    if ($result) {?>
<script>
Swal.fire({
    title: 'Success!',
    text: 'Berhasil Menyimpan Data!',
    icon: 'success',
    confirmButtonText: 'Yes!'
}).then((result) => {
    if (result.isConfirmed) {
        window.location = "index.php";

    }
});
</script>
<?php } else {?>
<script>
Swal.fire({
    title: 'Error!',
    text: 'Gagal Menyimpan Data!',
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

// end simpan data

// Edit data
if (isset($_POST['save_edit'])) {
    $id_penjual = $_POST['id_penjual'];
    $nama_toko = $_POST['nama_toko'];
    $status_toko = $_POST['status_toko'];
    $deskripsi_toko = $_POST['deskripsi_toko'];

    $result = update_penjual($id_penjual, $nama_toko, $status_toko, $deskripsi_toko);
    if ($result) {?>
<script>
Swal.fire({
    title: 'Success!',
    text: 'Berhasil Mengubah Data!',
    icon: 'success',
    confirmButtonText: 'Yes!'
}).then((result) => {
    if (result.isConfirmed) {
        window.location = "index.php";

    }
});
</script>
<?php } else {?>
<script>
Swal.fire({
    title: 'Error!',
    text: 'Gagal Mengubah Data!',
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
// end edit data

// Hapus data
if (isset($_POST['delete_data'])) {
    $id_penjual = $_POST['id'];
    $result = delete_penjual($id_penjual);
    if ($result) {?>
<script>
Swal.fire({
    title: 'Success!',
    text: 'Berhasil Menghapus Data!',
    icon: 'success',
    confirmButtonText: 'Yes!'
}).then((result) => {
    if (result.isConfirmed) {
        window.location = "index.php";

    }
});
</script>
<?php } else {?>
<script>
Swal.fire({
    title: 'Error!',
    text: 'Gagal Menghapus Data!',
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
// end hapus data
?>