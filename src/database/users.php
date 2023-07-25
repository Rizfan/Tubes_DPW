<?php
/*
 *
 * Users Database
 *
 */

require_once __DIR__ . '/database.php';

function create_user($username = null, $password = null, $email = null, $name = null, $no_hp = null, $link_foto_user = null, $tanggal_lahir = null, $role = null, $alamat_user = null)
{
    try {
        $db = connect();
        $query = $db->prepare("INSERT INTO user (id_user, username, password, email, nama, no_hp, link_foto_user, role, tanggal_lahir, alamat_user) VALUES (null, :username, :password, :email, :nama, :no_hp, :link_foto_user, :role, :tanggal_lahir, :alamat_user)");
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);
        $query->bindParam(':email', $email);
        $query->bindParam(':nama', $name);
        $query->bindParam(':no_hp', $no_hp);
        $query->bindParam(':link_foto_user', $link_foto_user);
        $query->bindParam(':tanggal_lahir', $tanggal_lahir);
        $query->bindParam(':role', $role);
        $query->bindParam(':alamat_user', $alamat_user);
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
        $query = $db->prepare("SELECT * FROM user Order By id_user DESC");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function update_user($id_user = null, $username = null, $password = null, $email = null, $name = null, $no_hp = null, $link_foto_user = null, $tanggal_lahir = null, $role = null)
{
    try {
        $db = connect();
        $query = $db->prepare("UPDATE user SET username = :username, password = :password, email = :email, nama = :nama, no_hp = :no_hp, link_foto_user = :link_foto_user, tanggal_lahir = :tanggal_lahir, role = :role WHERE id_user = :id_user");
        $query->bindParam(':id_user', $id_user);
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);
        $query->bindParam(':email', $email);
        $query->bindParam(':nama', $name);
        $query->bindParam(':no_hp', $no_hp);
        $query->bindParam(':link_foto_user', $link_foto_user);
        $query->bindParam(':tanggal_lahir', $tanggal_lahir);
        $query->bindParam(':role', $role);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function delete_user($id_user = null)
{
    try {
        $db = connect();
        $query = $db->prepare("DELETE FROM user WHERE id_user = :id_user");
        $query->bindParam(':id_user', $id_user);
        $query->execute();
        return true;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}

function get_user_by_email_password($email = null, $password = null)
{
    try {
        $db = connect();
        $query = $db->prepare("SELECT * FROM user WHERE email = :email AND password = :password");
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $db = null;
    }
}