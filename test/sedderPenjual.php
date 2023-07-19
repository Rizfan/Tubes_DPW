<?php

/**
 * Users Sederss
 */

require_once '.././src/database/penjual.php';
require_once '.././src/utils.php';
require_once '.././src/database/users.php';

// Create User

$user = get_all_user();
$i = 0;
foreach ($user as $value) {
    $id_user = $value['id_user'];

    $nama_toko = random_words(10);
    $status = "Aktif";
    $deskripsi_toko = random_words(10);

    create_penjual($id_user, $nama_toko, $status, $deskripsi_toko);

    echo "penjual " . $i++ . " created <br>";
}
