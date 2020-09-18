<?php
    require_once '../model/shoppingCart.php';
    require_once '../database/dbConfig.php';

    $productID = addslashes($_POST["id"]);
    $amount = addslashes($_POST["amount"]);

    $objectShoppingCart = new shoppingCart($PDO);
    $addBool = $objectShoppingCart->add($productID, $amount);

    if ($addBool) {
        echo "<script>alert('Produto adicionado')
              window.location.href='../view/addShoppingCart.php'</script>";
    }else{
        echo "<script>alert('Produto não adicionado')
        window.location.href='../view/addShoppingCart.php'</script>";
    }