<?php

require_once __DIR__ . '/database.php';
require_once __DIR__ . '/detail_transaksi.php';

function create_transaksi(
    $id_penjual = null,
    $id_user = null,
    $total_harga_pembelian = null,
    $status_pembayaran = null,
    $status_transaksi = null,
    $tanggal_transaksi = null,
    $tanggal_pembayaran = null,
) {
    try {
        $db = connect();
        $query = $db->prepare("INSERT INTO transaksi (id_transaksi, id_penjual, id_user, total_harga_pembelian, status_pembayaran, status_transaksi, tanggal_transaksi, tanggal_pembayaran) VALUES (null,:id_penjual, :id_user, :total_harga_pembelian, :status_pembayaran, :status_transaksi, :tanggal_transaksi, :tanggal_pembayaran)");
        $query->bindParam(':id_penjual', $id_penjual);
        $query->bindParam(':id_user', $id_user);
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
    $id_transaksi = null,
    $total_harga_pembelian = null,
    $status_pembayaran = null,
    $status_transaksi = null,
    $tanggal_transaksi = null,
    $tanggal_pembayaran = null,
) {
    try {
        $db = connect();
        $query = $db->prepare("UPDATE transaksi SET total_harga_pembelian = :total_harga_pembelian, status_pembayaran = :status_pembayaran, status_transaksi = :status_transaksi, tanggal_transaksi = :tanggal_transaksi, tanggal_pembayaran = :tanggal_pembayaran WHERE id_transaksi = :id_transaksi");
        $query->bindParam(':id_transaksi', $id_transaksi);
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

function get_all_transaksi()
{
    try {
        $db = connect();
        $query = $db->prepare("SELECT * FROM transaksi JOIN user ON transaksi.id_user = user.id_user Order By id_transaksi DESC");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function update_status($id_transaksi = null, $status_transaksi = null)
{
    try {
        $db = connect();
        $query = $db->prepare("UPDATE transaksi SET status_transaksi = :status_transaksi WHERE id_transaksi = :id_transaksi");
        $query->bindParam(':id_transaksi', $id_transaksi);
        $query->bindParam(':status_transaksi', $status_transaksi);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

function bayar($id_transaksi = null, $status_pembayaran = null, $tanggal_pembayaran = null)
{
    try {
        $db = connect();
        $query = $db->prepare("UPDATE transaksi SET status_pembayaran = :status_pembayaran, tanggal_pembayaran = :tanggal_pembayaran WHERE id_transaksi = :id_transaksi");
        $query->bindParam(':id_transaksi', $id_transaksi);
        $query->bindParam(':status_pembayaran', $status_pembayaran);
        $query->bindParam(':tanggal_pembayaran', $tanggal_pembayaran);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

function update_total($total_harga_pembelian = null, $id_transaksi = null)
{
    try {
        $db = connect();
        $query = $db->prepare("UPDATE transaksi SET total_harga_pembelian = :total_harga_pembelian WHERE id_transaksi = :id_transaksi");
        $query->bindParam(':id_transaksi', $id_transaksi);
        $query->bindParam(':total_harga_pembelian', $total_harga_pembelian);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

function get_transaksi($id_transaksi = null)
{
    try {
        $db = connect();
        $query = $db->prepare("SELECT * FROM transaksi WHERE id_transaksi = :id_transaksi");
        $query->bindParam(':id_transaksi', $id_transaksi);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

if (isset($_POST['func'])) {
    $func = $_POST['func'];
    switch ($func) {
        case 'status':
            $data = explode('_', $_POST['data']);
            update_status($data[0], $data[1]);
            if ($data[1] == "Batal") {
                pembatalan($data[0]);
            }
            break;
        default:
            break;
    }
}
