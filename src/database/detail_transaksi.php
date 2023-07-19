<?php

require __DIR__ . '/database.php';

function create_detail_transaksi($jumlah_barang = null)
{
    try {
        $db = connect();
        $query = $db->prepare("INSERT INTO detail_transaksi (id_detail_transaksi, id_transaksi, id_produk, jumlah_barang) 
                            VALUES (null, :jumlah_barang)");
        $query->bindParam(':jumlah_barang', $jumlah_barang);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function update_detail_transaksi($jumlah_barang = null)
{
    try {
        $db = connect();
        $query = $db->prepare("INSERT INTO detail_transaksi (id_detail_transaksi, id_transaksi, id_produk, jumlah_barang) 
                            VALUES (null, :jumlah_barang)");
        $query->bindParam(':jumlah_barang', $jumlah_barang);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function delete_detail_transaksi($id_detail_transaksi = null)
{
    try {
        $db = connect();
        $query = $db->prepare("DELETE FROM detail_transaksi WHERE id_detail_transaksi = :id_detail_transaksi");
        $query->bindParam(':id_detail_transaksi', $id_detail_transaksi);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}