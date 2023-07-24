<?php
// Mulai sesi untuk menghapus data sesi.
session_start();
// Hapus semua variabel sesi.
session_unset();
// Hancurkan sesi.
session_destroy();
// Arahkan kembali ke halaman login setelah logout.
header('Location: login.php');
exit;
?>