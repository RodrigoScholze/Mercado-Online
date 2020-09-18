<?php
    $host = "";
    $dbName = "marketDB";
    $login = "";
    $password = "";

    try{
        $PDO = new PDO("pgsql:host=${host};dbname=${dbName}", $login, $password);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $error){
        echo $error->getMessage();
    }
