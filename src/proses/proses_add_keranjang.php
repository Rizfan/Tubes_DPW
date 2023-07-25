<?php

include __DIR__ . './../proses/proses_session.php';

$id = $_GET['id'];
$jumlah = $_GET['jumlah'];

if (session_manager("get_session", ['keranjang']) == null) {
    session_manager("add_session", ['keranjang', []]);
} else {
    $read_keranjang = session_manager("get_session", ['keranjang'])['keranjang'];
    $read_keranjang[] = $id;
    $read_keranjang[] = $jumlah;
    session_manager("add_session", [
        ['keranjang', $read_keranjang],
    ]);

}