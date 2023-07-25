<?php

require_once __DIR__ . '/database.php';

function create_produk(
    $id_penjual = null,
    $id_kategori = null,
    $nama_produk = null,
    $deskripsi_produk = null,
    $harga = null,
    $stok = null,
    $status_produk = null,
    $link_foto_produk = null
) {
    try {
        $db = connect();
        $query = $db->prepare("INSERT INTO produk (id_produk, id_penjual, id_kategori, nama_produk, deskripsi_produk, harga, stok, status_produk, link_foto_produk) VALUES (null,:id_penjual,:id_kategori, :nama_produk, :deskripsi_produk,:harga, :stok, :status_produk, :link_foto_produk)");
        $query->bindParam(':id_penjual', $id_penjual);
        $query->bindParam(':id_kategori', $id_kategori);
        $query->bindParam(':nama_produk', $nama_produk);
        $query->bindParam(':harga', $harga);
        $query->bindParam(':stok', $stok);
        $query->bindParam(':status_produk', $status_produk);
        $query->bindParam(':deskripsi_produk', $deskripsi_produk);
        $query->bindParam(':link_foto_produk', $link_foto_produk);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function update_produk(
    $id_produk = null,
    $id_penjual = null,
    $id_kategori = null,
    $nama_produk = null,
    $deskripsi_produk = null,
    $harga = null,
    $stok = null,
    $status_produk = null,
    $link_foto_produk = null
) {
    try {
        $db = connect();
        $query = $db->prepare("UPDATE produk SET id_penjual = :id_penjual, id_kategori = :id_kategori, nama_produk = :nama_produk, deskripsi_produk = :deskripsi_produk, harga = :harga, stok = :stok, status_produk = :status_produk, link_foto_produk = :link_foto_produk WHERE id_produk = :id_produk");
        $query->bindParam(':id_produk', $id_produk);
        $query->bindParam(':id_penjual', $id_penjual);
        $query->bindParam(':id_kategori', $id_kategori);
        $query->bindParam(':nama_produk', $nama_produk);
        $query->bindParam(':harga', $harga);
        $query->bindParam(':stok', $stok);
        $query->bindParam(':status_produk', $status_produk);
        $query->bindParam(':deskripsi_produk', $deskripsi_produk);
        $query->bindParam(':link_foto_produk', $link_foto_produk);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function delete_produk($id_produk = null)
{
    try {
        $db = connect();
        $query = $db->prepare("DELETE FROM produk WHERE id_produk = :id_produk");
        $query->bindParam(':id_produk', $id_produk);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function get_all_produk()
{
    try {
        $db = connect();
        $query = $db->prepare("SELECT * FROM produk ORDER BY id_produk Desc");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}
function get_produk($id_penjual = null)
{
    try {
        $db = connect();
        $query = $db->prepare("SELECT * FROM produk WHERE id_penjual = :id_penjual ORDER BY id_produk Desc");
        $query->bindParam(':id_penjual', $id_penjual);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

<<<<<<< Updated upstream
function cek_stok($id_produk = null, $jumlah = null)
{
    try {
        $db = connect();
        $query = $db->prepare("SELECT stok FROM produk WHERE id_produk = :id_produk");
        $query->bindParam(':id_produk', $id_produk);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $stok_produk = $result[0]['stok'];
        if ($stok_produk >= $jumlah) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

=======
>>>>>>> Stashed changes
function get_produk_by_id($id_produk = null)
{
    try {
        $db = connect();
<<<<<<< Updated upstream
        $query = $db->prepare("SELECT * FROM produk WHERE id_produk = :id_produk");
        $query->bindParam(':id_produk', $id_produk);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
=======
        $query = $db->prepare("SELECT * FROM produk JOIN penjual ON produk.id_penjual = penjual.id_penjual JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE id_produk = :id_produk");
        $query->bindParam(':id_produk', $id_produk);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
>>>>>>> Stashed changes
        return $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}
<<<<<<< Updated upstream

function update_stok($id_produk = null, $jumlah = null)
{
    try {
        $db = connect();
        $query = $db->prepare("UPDATE produk SET stok = :stok WHERE id_produk = :id_produk");
        $query->bindParam(':id_produk', $id_produk);
        $query->bindParam(':stok', $jumlah);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
=======
>>>>>>> Stashed changes
