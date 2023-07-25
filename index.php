<?php

require_once './src/proses/proses_session.php';

/**
 * Otomatis Check Session sesuai role dan sudah login
 * jika belum login maka akan di redirect ke halaman landing page
 *
 */

if (session_manager("get_session", ['username']) != null) {
    redirect_to_role_page("http://localhost/Tubes_DPW/landing/");
}