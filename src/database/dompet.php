<?php

require __DIR__ . '/database.php';

function create_dompet($saldo = null)
{
    try {
        $db = connect();
        $query = $db->prepare("INSERT INTO kategori (id_dompet, id_penjual , saldo) 
                            VALUES (null, :saldo)");
        $query->bindParam(':saldo', $saldo);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function update_dompet($saldo = null)
{
    try {
        $db = connect();
        $query = $db->prepare("INSERT INTO kategori (id_dompet, id_penjual , saldo) 
                            VALUES (null, :saldo)");
        $query->bindParam(':saldo', $saldo);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function delete_dompet($id_dompet = null)
{
    try {
        $db = connect();
        $query = $db->prepare("DELETE FROM dompet WHERE id_dompet = :id_dompet");
        $query->bindParam(':id_dompet', $id_dompet);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}