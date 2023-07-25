<?php

include __DIR__ . './../proses/proses_session.php';

$id = $_GET['id_produk'];
$jumlah = $_GET['jumlah'];

if (session_manager("get_session", ['keranjang']) == null) {
    session_manager("add_session", ['keranjang', []]);
} else {
    $read_keranjang = session_manager("get_session", ['keranjang'])['keranjang'];
    $read_keranjang[] = $id . "-" . $jumlah;
    session_manager("add_session", [
        ['keranjang', $read_keranjang],
    ]);

}