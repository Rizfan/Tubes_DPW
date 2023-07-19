<?php

require __DIR__ . '/database.php';

function create_penjual($nama_toko = null, $status_toko = null, $deskripsi_toko = null)
{
    try {
        $db = connect();
        $query = $db->prepare("INSERT INTO penjual (id_penjual, id_user, nama_toko, status_toko, deskripsi_toko) 
                            VALUES (null, :nama_toko, :status_toko, :deskripsi_toko)");
        $query->bindParam(':nama_toko', $nama_toko);
        $query->bindParam(':status_toko', $status_toko);
        $query->bindParam(':deskripsi_toko', $deskripsi_toko);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function get_all_user()
{

    try {
        $db = connect();
        $query = $db->prepare("SELECT * FROM penjual");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function update_penjual($nama_toko = null, $status_toko = null, $deskripsi_toko = null)
{
    try {
        $db = connect();
        $query = $db->prepare("INSERT INTO penjual (id_penjual, id_user, nama_toko, status_toko, deskripsi_toko) 
                            VALUES (null, :nama_toko, :status_toko, :deskripsi_toko)");
        $query->bindParam(':nama_toko', $nama_toko);
        $query->bindParam(':status_toko', $status_toko);
        $query->bindParam(':deskripsi_toko', $deskripsi_toko);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function delete_penjual($id_penjual = null)
{
    try {
        $db = connect();
        $query = $db->prepare("DELETE FROM penjual WHERE id_penjual = :id_penjual");
        $query->bindParam(':id_penjual', $id_penjual);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}