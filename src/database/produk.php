<?php

require __DIR__ . '/database.php';

function create_produk(
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
                            VALUES (null, :nama_produk, :stok, :status_produk, :deskripsi_produk, :link_foto_produk)");
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
                            VALUES (null, :nama_produk, :stok, :status_produk, :deskripsi_produk, :link_foto_produk)");
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
