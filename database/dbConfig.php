<?php
    $host = "localhost";
    $dbName = "marketDB";
    $login = "postgres";
    $password = "s3nh@";

    try{
        $PDO = new PDO("pgsql:host=${host};dbname=${dbName}", $login, $password);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $error){
        echo $error->getMessage();
    }