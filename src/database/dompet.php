<?php

require_once __DIR__ . '/database.php';

function create_dompet($id_penjual = null)
{
    try {
        $db = connect();
        $query = $db->prepare("INSERT INTO dompet (id_dompet, id_penjual , saldo) VALUES (null,:id_penjual, 0)");
        $query->bindParam(':id_penjual', $id_penjual);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function update_dompet($id_dompet = null, $saldo = null)
{
    try {
        $db = connect();
        $query = $db->prepare("UPDATE dompet SET saldo = :saldo WHERE id_dompet = :id_dompet");
        $query->bindParam(':id_dompet', $id_dompet);
        $query->bindParam(':saldo', $saldo);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function delete_dompet($id_penjual = null)
{
    try {
        $db = connect();
        $query = $db->prepare("DELETE FROM dompet WHERE id_penjual = :id_penjual");
        $query->bindParam(':id_penjual', $id_penjual);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function get_all_dompet()
{
    try {
        $db = connect();
        $query = $db->prepare("SELECT * FROM dompet JOIN penjual ON dompet.id_penjual = penjual.id_penjual");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}
