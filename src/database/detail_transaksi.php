<?php

require_once __DIR__ . '/database.php';

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

function update_detail_transaksi($id_detail_transaksi = null, $jumlah_barang = null)
{
    try {
        $db = connect();
        $query = $db->prepare("UPDATE detail_transaksi SET jumlah_barang = :jumlah_barang WHERE id_detail_transaksi = :id_detail_transaksi");
        $query->bindParam(':id_detail_transaksi', $id_detail_transaksi);
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

function get_all_detail()
{
    try {
        $db = connect();
        $query = $db->prepare("SELECT * FROM detail_transaksi JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi JOIN produk ON detail_transaksi.id_produk = produk.id_produk");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function get_detail($id_transaksi = null)
{
    try {
        $db = connect();
        $query = $db->prepare("SELECT * FROM detail_transaksi JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi JOIN produk ON detail_transaksi.id_produk = produk.id_produk WHERE detail_transaksi.id_transaksi = :id_transaksi ORDER BY id_detail_transaksi DESC");
        $query->bindParam(':id_transaksi', $id_transaksi);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}
