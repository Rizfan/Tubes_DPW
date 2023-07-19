<?php

require __DIR__ . '/database.php';

function create_riwayat_dompet($saldo_ditarik = null)
{
    try {
        $db = connect();
        $query = $db->prepare("INSERT INTO riwayat_dompet (id_riwayat_dompet, id_dompet , saldo_ditarik) 
                            VALUES (null, :saldo)");
        $query->bindParam(':saldo_ditarik', $saldo_ditarik);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function update_riwayat_dompet($id_riwayat_dompet = null, $saldo_ditarik = null)
{
    try {
        $db = connect();
        $query = $db->prepare("UPDATE riwayat_dompet SET saldo_ditarik = :saldo_ditarik WHERE id_riwayat_dompet = :id_riwayat_dompet");
        $query->bindParam(':id_riwayat_dompet', $id_riwayat_dompet);
        $query->bindParam(':saldo_ditarik', $saldo_ditarik);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function delete_riwayat_dompet($id_riwayat_dompet = null)
{
    try {
        $db = connect();
        $query = $db->prepare("DELETE FROM riwayat_dompet WHERE id_riwayat = :id_riwayat");
        $query->bindParam(':id_riwayat_dompet', $id_riwayat_dompet);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function get_all_riwayat()
{
    try {
        $db = connect();
        $query = $db->prepare("SELECT * FROM riwayat_dompet JOIN dompet ON riwayat_dompet.id_dompet = dompet.id_dompet");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
