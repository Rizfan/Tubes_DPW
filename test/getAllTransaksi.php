<?php

require '.././src/database/transaksi.php';

// Get All User
$transaksi = get_all_transaksi();
echo json_encode($transaksi);
