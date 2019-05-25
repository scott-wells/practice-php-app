<?php
    $dbhost = 'localhost';
    $dbname = 'nerdsocial';
    $dbuser = 'nerduser';
    $dbpass = 'password';

    $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if($connection->connect_error) die("Fatal Error");

    function createTable($name, $query) {
        queryMysql("CREATE TABLE IF NONE EXISTS $name($query)");
        echo "Table '$name' created or already exists.<br>";
    }

    function queryMysql($query) {
        global $connection;
        $result = $connection->query($query);
        if(!$result) die("Fatal Error");
        return $result;
    }

    function destroySession() {
        
    }