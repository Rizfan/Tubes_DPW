<?php
$tittle = "Profile";
include('../layout/master_dashboard.php');
include('../src/database/users.php');
$id = $_GET['id'];
$user = get_user_by_id($id);
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
                                    <td><?= $user['no_hp'] ?></td>
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
                                <img src="../assets/upload/user/<?= $user['link_foto_user'] ?>" alt="<?= $user['nama'] ?>">
                            <?php } else { ?>
                                <img src="../assets/img/undraw_profile.svg" alt="<?= $user['nama'] ?>">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
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

</section>

<?php
include('../layout/footer1.php');
?>