<?php
/*
 *
 * Users Database
 * 
 */

require __DIR__ . '/database.php';

function create_user($id_user=null, $username=null, $password=null, $email=null, $name=null, $no_hp=null, $link_foto_user=null, $tanggal_lahir=null, $role="User" ){
    try{
        $db = connect();
        $query = $db->prepare("INSERT INTO user (id_user, username, password, email, nama, no_hp, link_foto_user, tanggal_lahir, role) VALUES (null, :username, :password, :email, :nama, :no_hp, :link_foto_user, :tanggal_lahir, :role)");
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
    } catch(PDOException $e){
        die("Error: ".$e->getMessage());
    } finally {
        $db = null;
    }
}

function get_all_user(){

    try{
        $db = connect();
        $query = $db->prepare("SELECT * FROM user");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch(PDOException $e){
        die("Error: ".$e->getMessage());
    } finally {
        $db = null;
    }


}