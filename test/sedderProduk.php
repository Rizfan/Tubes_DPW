<?php

require_once '.././src/utils.php';
require_once '.././src/database/produk.php';

for ($i = 0; $i < 10; $i++) {
    $id_penjual = 1;
    $id_kategori = 1;
    $nama_produk = "Produk " . $i;
    $harga = rand(1000, 999999);
    $stok = rand(1, 100);
    $deskripsi = "Deskripsi " . $i;
    $foto = "27163977_20200213_103459.jpg";

    create_produk($id_penjual, $id_kategori, $nama_produk, $deskripsi, $harga, $stok, 1, $foto);

    echo "Produk " . $i . " created <br>";
}