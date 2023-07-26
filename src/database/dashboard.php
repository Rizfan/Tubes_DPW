<?php
/*
 *
 * Database Connector 
 */

require __DIR__ . '/database.php';

function count_users()
{
    try {
        $db = connect();
        $sql = "SELECT COUNT(*) FROM user";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        echo $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function count_penjual()
{
    try {
        $db = connect();
        $sql = "SELECT COUNT(*) FROM penjual";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        echo $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function count_transaksi()
{
    try {
        $db = connect();
        $sql = "SELECT COUNT(*) FROM transaksi";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        echo $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function count_riwayat_transaksi($id_user = null)
{
    try {
        $db = connect();
        $sql = "SELECT COUNT(*) FROM transaksi WHERE id_user = :id_user";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        echo $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function count_riwayat_transaksi_selesai($id_penjual = null)
{
    try {
        $db = connect();
        // $sql = "SELECT COUNT(*) FROM transaksi WHERE id_user = :id_user AND status_transaksi = 'Selesai'";
        $sql = "SELECT COUNT(*) FROM detail_transaksi JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi JOIN produk ON detail_transaksi.id_produk = produk.id_produk WHERE produk.id_penjual = :id_penjual AND status_transaksi = 'Selesai'";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_penjual', $id_penjual);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        echo $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}
function count_riwayat_transaksi_proses($id_penjual = null)
{
    try {
        $db = connect();
        // $sql = "SELECT COUNT(*) FROM transaksi WHERE id_user = :id_user AND status_transaksi = 'Selesai'";
        $sql = "SELECT COUNT(*) FROM detail_transaksi JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi JOIN produk ON detail_transaksi.id_produk = produk.id_produk WHERE produk.id_penjual = :id_penjual AND status_transaksi = 'Proses'";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_penjual', $id_penjual);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        echo $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function count_produk_penjual_by_penjual($id_penjual = null)
{
    try {
        $db = connect();
        $sql = "SELECT COUNT(*) FROM produk WHERE id_penjual = :id_penjual";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id_penjual', $id_penjual);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        echo $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}
