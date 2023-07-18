<?php
/*
 *
 * Config Parser
 * 
 */

 function get_config(){
    if (file_exists(dirname(__FILE__, 3) . '/config.json')) {
        $config = json_decode(file_get_contents(dirname(__FILE__, 3) . '/config.json'), true);
        return $config;
    } else {
        die('Config file not found');
    }
 }