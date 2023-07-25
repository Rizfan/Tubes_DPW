<?php

function session_manager($type = "add_session", $data_session = null)
{
    @session_start();
    if (strtolower($type) == "add_session") {

        for ($i = 0; $i < count($data_session); $i++) {
            $_SESSION[$data_session[$i][0]] = $data_session[$i][1];
        }

    } else if (strtolower($type) == "destroy_session") {
        session_destroy();

    } else if (strtolower($type) == "get_session") {

        $data_sessione = [];

        for ($i = 0; $i < count($data_session); $i++) {
            if (!isset($_SESSION[$data_session[$i]])) {
                $data_sessione[$data_session[$i]] = null;
            } else {
                $data_sessione[$data_session[$i]] = $_SESSION[$data_session[$i]];

            }

        }
        return $data_sessione;

    }

}

function redirect_to_role_page($custom_redirect = null)
{
    $get_current_session = session_manager("get_session", ["username", "role"]);
    if ($get_current_session['username'] != null) {

        // Cek role
        if ($get_current_session['role'] != null) {

            // Redirect ke halaman sesuai role
            header("Location: " . $custom_redirect . "");
            exit();

        } else {

            echo "Role not found";
            exit();
        }

    } else {

        // Redirect ke halaman landing karena belum login
        header("Location: " . $custom_redirect);
        exit();
    }
}