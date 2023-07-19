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

function update_kategori($id_kategori = null, $nama_kategori = null)
{
    try {
        $db = connect();
        $query = $db->prepare("UPDATE kategori SET nama_kategori = :nama_kategori WHERE id_kategori = :id_kategori");
        $query->bindParam(':id_kategori', $id_kategori);
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

function get_all_kategori()
{
    try {
        $db = connect();
        $query = $db->prepare("SELECT * FROM kategori");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}
