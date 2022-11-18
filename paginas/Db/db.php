<?php

function connect(){
    try {
        $host="db";
        $user="ikasdev";
        $pass="ACai7925";
        $dbname="db_aergibide";
    # MySQL
    return new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    }
    catch(PDOException $e) {
    echo $e->getMessage();
    }
}

?>