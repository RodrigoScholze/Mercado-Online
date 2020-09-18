<?php
    require_once '../model/products.php';
    require_once '../database/dbConfig.php';

    $productName = addslashes($_POST["name"]);
    $productType = addslashes($_POST["type"]);
    $productValue = addslashes($_POST["value"]);

    $objectProducts = new products($PDO);
    $registerBool = $objectProducts->register($productName, $productType, $productValue);

    if ($registerBool) {
        echo "<script>alert('Produto cadastrado')
              window.location.href='../view/registerProduct.php'</script>";
    }else{
        echo "<script>alert('Produto não cadastrado')
        window.location.href='../view/registerProduct.php'</script>";
    }

