<?php
include('../../src/database/penjual.php');
$id = $_GET['id'];
if ($id != 0) {
    $penjual = get_penjual($id);
    $tittle = "Data Produk dari Toko $penjual[nama_toko]";
} else {
    $tittle = "Data Produk";
}
include('../../layout/master.php');
include('../../src/database/produk.php');
include('../../src/database/kategori.php');

?>

<section id="manage_produk">

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
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_penjual" value="<?= $id ?>">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="id_kategori">Kategori</label>
                                    <select name="id_kategori" id="id_kategori" class="form-control" required>
                                        <option value="" selected disabled>-- Pilih Kategori --</option>
                                        <?php
                                        $kategori = get_all_kategori();
                                        foreach ($kategori as $k) { ?>
                                            <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input required type="text" class="form-control" id="nama_produk" name="nama_produk">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_produk">Deskripsi Produk</label>
                                    <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" cols="30" rows="5" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp</div>
                                        </div>
                                        <input type="number" class="form-control" id="harga" name="harga" placeholder="harga">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input required type="number" class="form-control" id="stok" name="stok">
                                </div>
                                <div class="form-group">
                                    <label for="foto_produk">Foto Produk</label>
                                    <input type="file" class="form-control" id="foto_produk" name="foto_produk">
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
                            <th>Deskripsi Produk</th>
                            <th scope="col">Harga Satuan</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Status Produk</th>
                            <th>Foto Produk</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <!-- End header table -->

                    <!-- Body table -->
                    <tbody>

                        <?php
                        if ($id != 0) {
                            $pro = get_produk($id);
                        } else {
                            $pro = get_all_produk();
                        }
                        $no = 1;
                        foreach ($pro as $produk) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $produk['nama_produk'] ?></td>
                                <td><?= $produk['deskripsi_produk'] ?></td>
                                <td>Rp <?= number_format($produk['harga']) ?>,-</td>
                                <td><?= $produk['stok'] ?></td>
                                <td><?= $produk['status_produk'] ?></td>
                                <td><a href="../../assets/upload/produk/<?= $produk['link_foto_produk'] ?>" target="_blank">Lihat Foto</a></td>


                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?= $produk['id_produk'] ?>">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?= $produk['id_produk'] ?>">Hapus</button>
                                </td>
                            </tr>
                            <!-- Modal edit -->
                            <div class="modal fade" id="editModal<?= $produk['id_produk'] ?>" tabindex="-1" aria-labelledby="editModal<?= $produk['id_produk'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="#" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                                            <input type="hidden" name="id_penjual" value="<?= $produk['id_penjual'] ?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="id_kategori">Kategori</label>
                                                    <select name="id_kategori" id="id_kategori" class="form-control" required>
                                                        <option value="" selected disabled>-- Pilih Kategori --</option>
                                                        <?php
                                                        $kategori = get_all_kategori();
                                                        foreach ($kategori as $k) { ?>
                                                            <option value="<?= $k['id_kategori'] ?>" <?php if ($produk['id_kategori'] == $k['id_kategori']) {
                                                                                                            echo "selected";
                                                                                                        } ?>><?= $k['nama_kategori'] ?></option>
                                                        <?php
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_produk">Nama Produk</label>
                                                    <input required type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $produk['nama_produk'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi_produk">Deskripsi Produk</label>
                                                    <textarea name="deskripsi_produk" id="deskripsi_produk" class="form-control" cols="30" rows="5" required><?= $produk['deskripsi_produk'] ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="harga">Harga</label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Rp</div>
                                                        </div>
                                                        <input type="number" class="form-control" id="harga" name="harga" placeholder="harga" value="<?= $produk['harga'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="stok">Stok</label>
                                                    <input required type="number" class="form-control" value="<?= $produk['stok'] ?>" id="stok" name="stok">
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Status Barang</label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="" disabled>-- Pilih Status --</option>
                                                        <option value="Aktif" <?php if ($produk['status_produk'] == "Aktif") {
                                                                                    echo "selected";
                                                                                } ?>>Aktif</option>
                                                        <option value="Tidak Aktif" <?php if ($produk['status_produk'] == "Tidak Aktif") {
                                                                                        echo "selected";
                                                                                    } ?>>Tidak Aktif</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="foto_produk">Foto Produk</label>
                                                    <input type="file" class="form-control" id="foto_produk" name="foto_produk">
                                                    <input type="hidden" name="foto_lama" value="<?= $produk['link_foto_produk'] ?>">
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
                            <div class="modal fade" id="hapusModal<?= $produk['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModal1Label" aria-hidden="true">
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
                                                <input type="hidden" name="id" value="<?= $produk['id_produk'] ?>">
                                                <input type="hidden" name="id_penjual" value="<?= $produk['id_penjual'] ?>">
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

if (isset($_POST['save_tambah'])) {
    $id_penjual = $_POST['id_penjual'];
    $id_kategori = $_POST['id_kategori'];
    $nama_produk = $_POST['nama_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $status_produk = "Aktif";

    // Image Upload
    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['foto_produk']['name'];
    $ukuran = $_FILES['foto_produk']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) {
        echo "<script>alert('Data gagal ditambahkan');window.location.href='produk.php?id=$id_penjual';</script>";
    } else {
        if ($ukuran < 1044070) {
            $xx = $rand . '_' . $filename;
            move_uploaded_file($_FILES['foto_produk']['tmp_name'], '../../assets/upload/produk/' . $rand . '_' . $filename);
            $result = create_produk($id_penjual, $id_kategori, $nama_produk, $deskripsi_produk, $harga, $stok, $status_produk, $xx);
            if ($result) {
                echo "<script>alert('Data berhasil ditambahkan');window.location.href='produk.php?id=$id_penjual';</script>";
            } else {
                echo "<script>alert('Data gagal ditambahkan');window.location.href='produk.php?id=$id_penjual';</script>";
            }
        } else {
            echo "<script>alert('Data gagal ditambahkan');window.location.href='produk.php?id=$id_penjual';</script>";
        }
    }
    // End Image Upload
}

if (isset($_POST['save_edit'])) {
    $id_produk = $_POST['id_produk'];
    $id_penjual = $_POST['id_penjual'];
    $id_kategori = $_POST['id_kategori'];
    $nama_produk = $_POST['nama_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $status_produk = $_POST['status'];
    $foto_lama = $_POST['foto_lama'];

    // Image Upload
    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['foto_produk']['name'];
    $ukuran = $_FILES['foto_produk']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if ($filename == null) {
        $result = update_produk($id_produk, $id_penjual, $id_kategori, $nama_produk, $deskripsi_produk, $harga, $stok, $status_produk, $foto_lama);
        if ($result) {
            echo "<script>alert('Data berhasil diubah');window.location.href='produk.php?id=$id_penjual';</script>";
        } else {
            echo "<script>alert('Data gagal diubah');window.location.href='produk.php?id=$id_penjual';</script>";
        }
    } else {
        if (!in_array($ext, $ekstensi)) {
            echo "<script>alert('Data gagal diubah');window.location.href='produk.php?id=$id_penjual';</script>";
        } else {
            if ($ukuran < 1044070) {
                $xx = $rand . '_' . $filename;
                unlink('../../assets/upload/produk/' . $foto_lama);
                move_uploaded_file($_FILES['foto_produk']['tmp_name'], '../../assets/upload/produk/' . $rand . '_' . $filename);
                $result = update_produk($id_produk, $id_penjual, $id_kategori, $nama_produk, $deskripsi_produk, $harga, $stok, $status_produk, $xx);
                if ($result) {
                    echo "<script>alert('Data berhasil diubah');window.location.href='produk.php?id=$id_penjual';</script>";
                } else {
                    echo "<script>alert('Data gagal diubah');window.location.href='produk.php?id=$id_penjual';</script>";
                }
            } else {
                echo "<script>alert('Data gagal diubah');window.location.href='produk.php?id=$id_penjual';</script>";
            }
        }
    }
}
// End Image Upload

if (isset($_POST['delete_data'])) {
    $id = $_POST['id'];
    $id_penjual = $_POST['id_penjual'];
    unlink('../../assets/upload/produk/' . $produk['link_foto_produk']);
    $result = delete_produk($id);
    if ($result) {
        echo "<script>alert('Data berhasil dihapus');window.location.href='produk.php?id=$id_penjual';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus');window.location.href='produk.php?id=$id_penjual';</script>";
    }
}

include('../../layout/footer.php');
?>