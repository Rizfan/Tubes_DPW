<?php

/**
 * Users Sederss
 */

require '.././src/database/users.php';
require '.././src/utils.php';

// Create User

for ($i = 0; $i < 10; $i++) {
    $username = random_words(10);
    $password = random_words(10);
    $email = random_words(10) . "@gmail.com";
    $nama = random_words(12);
    $no_hp = "08" . rand(100000000, 999999999);
    $link_foto_user = "";
    $tanggal_lahir = "";
    $role = "User";

    create_user($username, $password, $email, $nama, $no_hp, $link_foto_user, $tanggal_lahir, $role);

    echo "User " . $i . " created <br>";
}
