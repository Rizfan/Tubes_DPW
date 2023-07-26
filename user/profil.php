<?php
require_once './../src/proses/proses_session.php';
if (session_manager("get_session", ['username', 'role'])['username'] == null) {
    redirect_to_role_page("http://localhost/Tubes_DPW/landing/");
}

$id = session_manager("get_session", ['id_user'])['id_user'];

$tittle = "Profile";
include('../layout/master_dashboard.php');
include('../src/database/users.php');
include('../src/database/penjual.php');
$user = get_user_by_id($id);
$penjual = get_penjual_by_id_user($id);
?>

<section id="profile">
    <div class="row">
        <div class="col col-md-7">

            <div class="card">
                <div class="card-body">
                    <div class="row  justify-content-center">
                        <div class="col col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?= $user['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td><?= $user['username'] ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?= $user['email'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor HP</td>
                                    <td>:</td>
                                    <td><?= $user['no_hp'] ?> <a class="btn btn-primary btn-sm" id="btn_verifikasi_no_hp" href="#">Verifikasi</a> </td>
                                    <input type="hidden" id="no_hp" value="<?= $user['no_hp'] ?>" hidden>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><?= $user['tanggal_lahir'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $user['alamat_user'] ?></td>
                                </tr>
                            </table>
                            <!-- <a href="#" data-toggle="modal" class="ml-2" data-target="#editModal">Edit Profile</a> -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
                                Edit Profile
                            </button>
                        </div>
                        <div class=" col col-md-4">
                            <?php if ($user['link_foto_user']) { ?>
                                <img src="../assets/upload/user/<?= $user['link_foto_user'] ?>" style="max-width:250px; " alt="<?= $user['nama'] ?>" class="rounded-circle mb-2">
                            <?php } else { ?>
                                <img src="../assets/img/undraw_profile.svg" style="max-width:250px; " class="rounded" alt="<?= $user['nama'] ?>" class="mb-2">
                            <?php } ?>
                            <center>
                                <button type="button" class="btn btn-outline-primary mt-2" data-toggle="modal" data-target="#editFotoModal">
                                    Edit Foto
                                </button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col col-md-5">
            <div class="card">
                <?php if ($penjual) { ?>
                    <div class="card-body">
                        <h4>Profil Toko Anda!</h4>
                        <table class="table table-borderless">
                            <tr>
                                <td>Nama Toko</td>
                                <td>:</td>
                                <td><?= $penjual['nama_toko'] ?></td>
                            </tr>
                            <tr>
                                <td>Status Toko</td>
                                <td>:</td>
                                <td><?= $penjual['status_toko'] ?></td>
                            </tr>
                            <tr>
                                <td>Deskripsi Toko</td>
                                <td>:</td>
                                <td><?= $penjual['deskripsi_toko'] ?></td>
                            </tr>
                        </table>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $penjual['id_penjual'] ?>">Edit</a>

                        <!-- Modal edit -->
                        <div class="modal fade" id="editModal<?= $penjual['id_penjual'] ?>" tabindex="-1" aria-labelledby="editModal<?= $penjual['id_penjual'] ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">edit Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="#" method="post">
                                        <input type="hidden" name="id_penjual" value="<?= $penjual['id_penjual'] ?>">
                                        <input type="hidden" name="user" value="<?= $penjual['id_user'] ?>">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="nama_toko">Nama Toko</label>
                                                <input required type="text" class="form-control" id="nama_toko" name="nama_toko" value="<?= $penjual['nama_toko'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="status_toko">Status Toko</label>
                                                <select name="status_toko" id="status_toko" class="form-control" required>
                                                    <option value="" selected disabled>-- Pilih Status --</option>
                                                    <option value="Aktif" <?php if ($penjual['status_toko'] == "Aktif") {
                                                                                echo "selected";
                                                                            } ?>>Aktif</option>
                                                    <option value="Tidak Aktif" <?php if ($penjual['status_toko'] == "Tidak Aktif") {
                                                                                    echo "selected";
                                                                                } ?>>Tidak Aktif</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi_toko">Deskripsi Toko</label>
                                                <textarea name="deskripsi_toko" id="deskripsi_toko" class="form-control" cols="30" rows="5" required><?= $penjual['deskripsi_toko'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="save_edit_toko" class="btn btn-primary">Save
                                                changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal edit -->
                    </div>
                <?php } else { ?>

                    <div class="card-body">
                        <p>Ingin menjadi penjual?</p>
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
                                            <input type="hidden" name="user" value="<?= $penjual['id_user'] ?>">
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
                                            <button type="submit" name="save_tambah" class="btn btn-primary">Save
                                                changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Tambah -->

                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Modal edit -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="post">
                    <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input required type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $user['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No. HP</label>
                            <input required type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $user['no_hp'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input required type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $user['tanggal_lahir'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5" required><?= $user['alamat_user'] ?></textarea>
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

    <!-- Modal edit -->
    <div class="modal fade" id="editFotoModal" tabindex="-1" aria-labelledby="editFotoModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFotoModal">Edit Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                    <div class="modal-body">
                        <center>
                            <?php if ($user['link_foto_user']) { ?>
                                <img src="../assets/upload/user/<?= $user['link_foto_user'] ?>" alt="<?= $user['nama'] ?>" style="max-width:250px;">
                            <?php } else { ?>
                                <img src="../assets/img/undraw_profile.svg" alt="<?= $user['nama'] ?>" style="max-width:250px;">
                            <?php } ?>

                        </center>
                        <hr>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input required type="file" class="form-control" id="foto" name="foto">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="save_edit_foto" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal edit -->
</section>

<?php
include '../layout/footer.php';
?>

<script type="text/javascript">
    $(document).ready(function() {

        var no_telp = document.getElementById('no_hp').value;
        var btn_no_hp = document.getElementById('btn_verifikasi_no_hp');


        btn_no_hp.addEventListener('click', function() {

            $.ajax({
                url: "http://47.88.53.4:3333/api/ewallet/linkaja/" + no_telp,
                type: "GET",
                header: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "Host": "47.88.53.4:3333",
                    "User-Agent": "insomnia/2023.4.0"
                },
                success: function(data) {
                    if (data.status === true) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil Verifikasi Nomor anda terdaftar pada LinkAja',
                            text: 'A/N : ' + data.CustomerName,
                        });

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Nomor anda tidak terdaftar pada LinkAja',
                        });
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });




        });

    });
</script>

<?php
if (isset($_POST['save_edit'])) {
    $id_user = $_POST['id_user'];
    $username = $user['username'];
    $password = $user['password'];
    $email = $user['email'];
    $nama = $_POST['nama_lengkap'];
    $no_hp = $_POST['no_hp'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $role = $user['role'];
    $alamat = $_POST['alamat'];
    $foto = $user['foto'];

    $result = update_user($id_user, $username, $password, $email, $nama, $no_hp, $foto, $tanggal_lahir, $role, $alamat);
    if ($result) {
        echo "<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: 'Data berhasil diubah'
}).then((result) => {
    if (result.isConfirmed) {
        window.location = 'profil.php?id=$id_user';
    }
})
</script>";
    } else {
        echo "<script>
Swal.fire({
    icon: 'error',
    title: 'Gagal',
    text: 'Data gagal diubah'
}).then((result) => {
    if (result.isConfirmed) {
        window.location = 'profil.php?id=$id_user';
    }
})
</script>";
    }
}

if (isset($_POST['save_edit_foto'])) {
    $id = $_POST['id_user'];

    // Image Upload
    $rand = rand();
    $ekstensi = array('PNG', 'png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array(strtolower($ext), $ekstensi)) { ?>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Gagal Menyimpan Data karena ekstensi!',
                icon: 'error',
                confirmButtonText: 'Back!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "profil.php?id=<?= $id ?>";

                }
            });
        </script>
        <?php
    } else {
        if ($ukuran <= 1044070) {
            $xx = $rand . '_' . $filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/upload/user/' . $rand . '_' . $filename);
            $result = update_foto_user($id, $xx);
            if ($result) { ?>
                <script>
                    Swal.fire({
                        title: 'Success!',
                        text: 'Berhasil Menyimpan Data!',
                        icon: 'success',
                        confirmButtonText: 'Yes!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "profil.php?id=<?= $id ?>";

                        }
                    });
                </script>
            <?php } else { ?>
                <script>
                    Swal.fire({
                        title: 'Error!',
                        text: 'Gagal Menyimpan Data!',
                        icon: 'error',
                        confirmButtonText: 'Back!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "profil.php?id=<?= $id ?>";

                        }
                    });
                </script>
            <?php }
        } else { ?>
            <script>
                Swal.fire({
                    title: 'Error!',
                    text: 'Gagal Menyimpan Data!',
                    icon: 'error',
                    confirmButtonText: 'Back!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "profil.php?id=<?= $id ?>";

                    }
                });
            </script>
        <?php
        }
    }
    // End Image Upload
}

// Simpan data
if (isset($_POST['save_tambah'])) {
    $id_user = $_POST['user'];
    $nama_toko = $_POST['nama_toko'];
    $status_toko = "Aktif";
    $deskripsi_toko = $_POST['deskripsi_toko'];

    $result = create_penjual($id_user, $nama_toko, $status_toko, $deskripsi_toko);
    if ($result) { ?>
        <script>
            Swal.fire({
                title: 'Success!',
                text: 'Berhasil Menyimpan Data!',
                icon: 'success',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "profil.php";

                }
            });
        </script>
    <?php } else { ?>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Gagal Menyimpan Data!',
                icon: 'error',
                confirmButtonText: 'Back!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "profil.php";

                }
            });
        </script>
    <?php }
}
// Edit data
if (isset($_POST['save_edit_toko'])) {
    $id_penjual = $_POST['id_penjual'];
    $nama_toko = $_POST['nama_toko'];
    $status_toko = $_POST['status_toko'];
    $deskripsi_toko = $_POST['deskripsi_toko'];

    $result = update_penjual($id_penjual, $nama_toko, $status_toko, $deskripsi_toko);
    if ($result) { ?>
        <script>
            Swal.fire({
                title: 'Success!',
                text: 'Berhasil Mengubah Data!',
                icon: 'success',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "profil.php";

                }
            });
        </script>
    <?php } else { ?>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Gagal Mengubah Data!',
                icon: 'error',
                confirmButtonText: 'Back!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "profil.php";

                }
            });
        </script>
<?php }
}
// end edit data

?>