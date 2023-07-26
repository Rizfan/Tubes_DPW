<?php

include __DIR__ . './../proses/proses_session.php';
include __DIR__ . './../database/produk.php';
include __DIR__ . './../database/transaksi.php';
include './proses_payment_gateway.php';

$getCookie = get_cookie();
$validate_order = is_order_validated($getCookie, '082223127698');
$detail_order = detail_order($getCookie, $validate_order);
$is_submit_order = submit_order($getCookie, $validate_order, '082223127698');
$get_qr_code = get_qr_code($is_submit_order);

?>

<img src="<?=$get_qr_code?>">


<?php
exit();
$total_semua_harga = $_POST['total_semua_harga'];

// Kurangi Stock
foreach (session_manager("get_session", [
    "keranjang",
])['keranjang'] as $key => $value) {

    $explode_value = explode("-", $value);
    $id_produk = $explode_value[0];
    $jumlah = $explode_value[1];

    $cek_stok = get_produk_by_id($id_produk)['stok'];
    update_stok($id_produk, $cek_stok - $jumlah);

}

// add transaksi

$id_user = session_manager("get_session", [
    "id_user",
])['id_user'];

create_transaksi(
    null,
    $id_user,
    $total_semua_harga,
    "Belum Lunas",
    "Proses",
    date("Y-m-d H:i:s"),
    null
);

$id_transaksi = get_all_transaksi()[0]['id_transaksi'];

// add detail transaksi

foreach (session_manager("get_session", [
    "keranjang",
])['keranjang'] as $key => $value) {

    $explode_value = explode("-", $value);
    $id_produk = $explode_value[0];
    $jumlah = $explode_value[1];

    $create_detail_transaksi = create_detail_transaksi(
        $id_transaksi,
        $id_produk,
        $jumlah
    );

}
?>