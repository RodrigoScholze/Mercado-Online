<?php
    require_once '../model/shoppingCart.php';
    require_once '../database/dbConfig.php';

    $productID = addslashes($_POST["id"]);

    $objectShoppingCart = new shoppingCart($PDO);
    $removeBool = $objectShoppingCart->remove($productID);

    if ($removeBool) {
        echo "<script>alert('Produto removido')
              window.location.href='../view/removeShoppingCart.php'</script>";
    }else{
        echo "<script>alert('Produto não removido')
        window.location.href='../view/removeShoppingCart.php'</script>";
    }