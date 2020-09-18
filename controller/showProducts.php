<?php
    require_once '../model/products.php';
    require_once '../database/dbConfig.php';

    $objectProducts = new products($PDO);
    $Products = $objectProducts->showAll();