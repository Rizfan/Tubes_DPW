<?php

require __DIR__ . '/database.php';

function create_kategori($nama_kategori = null)
{
    try {
        $db = connect();
        $query = $db->prepare("INSERT INTO kategori (id_kategori, nama_kategori) 
                            VALUES (null, :nama_kategori)");
        $query->bindParam(':nama_kategori', $nama_kategori);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function update_kategori($nama_kategori = null)
{
    try {
        $db = connect();
        $query = $db->prepare("INSERT INTO kategori (id_kategori, nama_kategori) 
                            VALUES (null, :nama_kategori)");
        $query->bindParam(':nama_kategori', $nama_kategori);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function delete_kategori($id_kategori = null)
{
    try {
        $db = connect();
        $query = $db->prepare("DELETE FROM kategori WHERE id_kategori = :id_kategori");
        $query->bindParam(':id_kategori', $id_kategori);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}