<?php
include __DIR__ . './../proses/proses_payment_gateway.php';

$id_transaksi = $_GET['id_transaksi'];

var_dump(check_status_trx($id_transaksi));