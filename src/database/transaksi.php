<?php

require __DIR__ . '/database.php';

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
        $query = $db->prepare("SELECT * FROM transaksi JOIN user ON transaksi.id_user = user.id_user JOIN penjual ON transaksi.id_penjual = penjual.id_penjual Order By id_transaksi DESC");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function bayar($id_transaksi = null, $status_transaksi = null)
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

if (isset($_POST['func'])) {
    $func = $_POST['func'];
    switch ($func) {
        case 'bayar':
            $data = explode('_', $_POST['data']);
            echo $data[0];
            bayar($data[0], $data[1]);
            break;
        default:

            $data = explode('_', $_POST['data']);
            bayar($data[0], $data[1]);
            break;
    }
}
