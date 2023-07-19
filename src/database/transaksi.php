<?php

require __DIR__ . '/database.php';

function create_transaksi(
    $total_harga_pembelian = null,
    $status_pembayaran = null,
    $status_transaksi = null,
    $tanggal_transaksi = null,
    $tanggal_pembayaran = null,
) {
    try {
        $db = connect();
        $query = $db->prepare("INSERT INTO transaksi (id_transaksi, id_penjual, id_user, total_harga_pembelian, status_pembayaran, status_transaksi, tanggal_transaksi, tanggal_pembayaran)
                            VALUES (null, :total_harga_pembayaran, :status_pembayaran, :status_transaksi, :tanggal_transaksi, :tanggal_pembayaran)");
        $query->bindParam(':total_harga_pembelian', $total_harga_pembelian);
        $query->bindParam(':status_pembayaran', $status_pembayaran);
        $query->bindParam(':status_transaksi', $status_transaksi);
        $query->bindParam(':tanggal_transaksi', $tanggal_transaksi);
        $query->bindParam(':tanggal_pembayaran', $tanggal_pembayaran);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function update_transaksi(
    $total_harga_pembelian = null,
    $status_pembayaran = null,
    $status_transaksi = null,
    $tanggal_transaksi = null,
    $tanggal_pembayaran = null,
) {
    try {
        $db = connect();
        $query = $db->prepare("INSERT INTO transaksi (id_transaksi, id_penjual, id_user, total_harga_pembelian, status_pembayaran, status_transaksi, tanggal_transaksi, tanggal_pembayaran)
                            VALUES (null, :total_harga_pembayaran, :status_pembayaran, :status_transaksi, :tanggal_transaksi, :tanggal_pembayaran)");
        $query->bindParam(':total_harga_pembelian', $total_harga_pembelian);
        $query->bindParam(':status_pembayaran', $status_pembayaran);
        $query->bindParam(':status_transaksi', $status_transaksi);
        $query->bindParam(':tanggal_transaksi', $tanggal_transaksi);
        $query->bindParam(':tanggal_pembayaran', $tanggal_pembayaran);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function delete_transaksi($id_transaksi = null)
{
    try {
        $db = connect();
        $query = $db->prepare("DELETE FROM transaksi WHERE id_transaksi = :id_transaksi");
        $query->bindParam(':id_transaksi', $id_transaksi);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}