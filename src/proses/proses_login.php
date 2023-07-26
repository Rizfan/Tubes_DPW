<?php

include __DIR__ . './../database/users.php';
include __DIR__ . './../database/penjual.php';
include __DIR__ . './../proses/proses_session.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $password = $_POST['password'];
        $email = $_POST['email'];

        $result = get_user_by_email_password($email, $password);

        if ($result) {

            $penjual = get_penjual_by_id_user($result['id_user']);

            if ($penjual) {

                // Add session
                $data_session = [
                    ['id_user', $result['id_user']],
                    ['id_penjual', $penjual['id_penjual']],
                    ['username', $result['username']],
                    ['password', $result['password']],
                    ['email', $result['email']],
                    ['role', "Penjual"],
                ];

            } else {
                // Add session
                $data_session = [
                    ['id_user', $result['id_user']],
                    ['username', $result['username']],
                    ['password', $result['password']],
                    ['email', $result['email']],
                    ['role', $result['role']],
                ];
            }

            session_manager("add_session", $data_session);

            header("Location: ./../../index.php");
            exit();
        } else {
            header("Location: ./../../login.php?status=failed");
            exit();
        }
    } else {
        header("Location: ./../../login.php?status=failed");
        exit();
    }
} else {
    echo "Method not allowed";
}
