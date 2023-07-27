<?php
require '.././src/proses/proses_session.php';
$id = $_GET['id_produk'];
session_manager("destroy_cart_by_id", $id);