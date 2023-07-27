<?php

include __DIR__ . './../proses/proses_session.php';

$id = $_GET['id_produk'];
session_manager("destroy_cart_by_id", $id);

redirect_to_role_page("http://localhost/Tubes_DPW/user/keranjang.php");