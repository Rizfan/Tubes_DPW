<?php

require_once __DIR__ . '/database.php';

function cek_id_user($id_user = null)
{
    try {
        $db = connect();
        $query = $db->prepare("SELECT * FROM penjual WHERE id_user = :id_user");
        $query->bindParam(':id_user', $id_user);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function create_penjual($id_user = null, $nama_toko = null, $status_toko = null, $deskripsi_toko = null)
{
    try {
        $db = connect();
        if (cek_id_user($id_user)) {
            return false;
        } else {
            $query = $db->prepare("INSERT INTO penjual (id_penjual, id_user, nama_toko, status_toko, deskripsi_toko) VALUES (null,:id_user, :nama_toko, :status_toko, :deskripsi_toko)");
            $query->bindParam(':id_user', $id_user);
            $query->bindParam(':nama_toko', $nama_toko);
            $query->bindParam(':status_toko', $status_toko);
            $query->bindParam(':deskripsi_toko', $deskripsi_toko);
            $query->execute();
            return true;
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function update_penjual($id_penjual = null, $nama_toko = null, $status_toko = null, $deskripsi_toko = null)
{
    try {
        $db = connect();
        $query = $db->prepare("UPDATE penjual SET nama_toko = :nama_toko, status_toko = :status_toko, deskripsi_toko = :deskripsi_toko WHERE id_penjual = :id_penjual");
        $query->bindParam(':id_penjual', $id_penjual);
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

function get_all_penjual()
{
    try {
        $db = connect();
        $query = $db->prepare("SELECT * FROM penjual JOIN user ON penjual.id_user = user.id_user");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}
