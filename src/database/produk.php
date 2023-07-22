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
        $query = $db->prepare("INSERT INTO produk (id_produk, id_penjual, id_kategori, nama_produk, harga, stok, status_produk, deskripsi_produk, link_foto_produk)
                            VALUES (null,:id_penjual,:id_kategori, :nama_produk, :stok, :status_produk, :deskripsi_produk, :link_foto_produk)");
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
    $nama_produk = null,
    $deskripsi_produk = null,
    $harga = null,
    $stok = null,
    $status_produk = null,
    $link_foto_produk = null
) {
    try {
        $db = connect();
        $query = $db->prepare("UPDATE produk SET nama_produk = :nama_produk, harga = :harga, stok = :stok, status_produk = :status_produk, deskripsi_produk = :deskripsi_produk, link_foto_produk = :link_foto_produk WHERE id_produk = :id_produk");
        $query->bindParam(':id_produk', $id_produk);
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
