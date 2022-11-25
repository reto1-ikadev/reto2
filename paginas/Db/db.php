<?php

function connect(){
    try {
        $host="localhost";
        $user="root";
        $pass="root";
        $dbname="db_aergibide";
    # MySQL
    return new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    }
    catch(PDOException $e) {
    echo $e->getMessage();
    }
}
