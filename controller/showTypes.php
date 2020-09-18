<?php
    require_once '../model/types.php';
    require_once '../database/dbConfig.php';

    $objectType = new types($PDO);
    $productsTypes = $objectType->showTypes();