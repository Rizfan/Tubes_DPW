<?php
/*
 *
 * Database Connector 
 */

require __DIR__ . './../config/configParser.php';

function connect(){
    try{
        $config = get_config();
        $db = new PDO("mysql:host=".$config['db']['host'].";dbname=".$config['db']['name'].";charset=utf8", $config['db']['user'], $config['db']['pass']);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch(PDOException $e){
        die("Error: ".$e->getMessage());
    }
}