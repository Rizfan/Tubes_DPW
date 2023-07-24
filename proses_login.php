<?php
// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start(); // Memulai session Lakukan operasi pengecekan login di database

    require_once('src/database/database.php');
    // Query untuk memeriksa kecocokan email dan password di tabel pengguna
    // Buat query untuk mengecek apakah terdapat user dengan email X dan password Y, jika ya maka login berhasil
    $query = "SELECT * FROM user WHERE email = '" . $_POST['email'] . "' AND password = '" . $_POST['password'] . "'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        // Login berhasil, simpan data pengguna ke dalam session
        $user = $result->fetch_assoc();
        // Ubah X, Y, Z dengan session agar menyimpan data yang tadi berhasil login kedalam session
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['email'] = $user['email'];


        $role = $user['role'];
        if ($role === '1') {
            $_SESSION['role'] = 'admin';
            // Redirect ke halaman admin
            header("Location: admin/index.php");
        } elseif ($role == '3') {
            $_SESSION['role'] = 'penjual';
            // Redirect ke halaman penjual
            header("Location: admin/penjual/index.php");
        } elseif ($role == '2') {
            $_SESSION['role'] = 'user';
            // Redirect ke halaman user
            header("Location: user/index.php");


            // Login berhasil, redirect ke halaman utama

            exit();
        } else {
            echo "Login gagal. Silakan cek kembali email dan password Anda.";
        }
        // Tutup koneksi database
        $conn->close();
    }
}
