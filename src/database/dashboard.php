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
