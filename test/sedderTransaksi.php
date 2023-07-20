<?php

/**
 * Users Sederss
 */

require_once '.././src/database/transaksi.php';
require_once '.././src/database/users.php';
require_once '.././src/utils.php';

// Create User
$user = get_all_user();
$i = 0;
foreach ($user as $value) {
    $id_penjual = 2;
    $id_user = $value['id_user'];
    $total_harga_pembelian = rand(100000000, 999999999);
    $status_pembayaran = "Belum Lunas";
    $status_transaksi = "Proses";
    $tanggal_transaksi = date("Y-m-d H:i:s");
    $tanggal_pembayaran = null;

    create_transaksi($id_penjual, $id_user, $total_harga_pembelian, $status_pembayaran, $status_transaksi, $tanggal_transaksi, $tanggal_pembayaran);

    echo "transaksi " . $i++ . " created <br>";
}
