<?php

include __DIR__ . './../database/users.php';
include __DIR__ . './../proses/proses_session.php';


if ($_SERVER['REQUEST_METHOD'] === "POST"){

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['no_telp'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $name = $_POST['username'];
        $no_hp = $_POST['no_telp'];
        $link_foto_user = NULL;
        $tanggal_lahir = NULL;
        $role = "User";
        $alamat_user = NULL;

        $result = create_user($username, $password, $email, $name, $no_hp, $link_foto_user, $tanggal_lahir, $role, $alamat_user);

        if ($result) {
            
            // Add session
            $data_session = [
                ['username', $username],
                ['password', $password],
                ['email', $email],
                ['role', $role],
            ];

            session_manager("add_session", $data_session);

            header("Location: ./../../index.php");
            exit();

        } else {
            header("Location: ./../../register.php?status=failed");
            exit();
        }
    } else {
        header("Location: ./../../register.php?status=failed");
        exit();
    }

} else {
    echo "Method not allowed";
}


?>