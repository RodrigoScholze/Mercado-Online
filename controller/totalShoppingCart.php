<?php
    require_once '../model/shoppingCart.php';
    require_once '../database/dbConfig.php';

    $objectShoppingCart = new shoppingCart($PDO);
    $totalShoppingCart = $objectShoppingCart->total();