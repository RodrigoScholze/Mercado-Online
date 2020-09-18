<?php
    require_once '../model/products.php';
    require_once '../database/dbConfig.php';

    $productID = addslashes($_POST["id"]);
    $productName = addslashes($_POST["name"]);
    $productType = addslashes($_POST["type"]);
    $productValue = addslashes($_POST["value"]);

    $objectProducts = new products($PDO);
    $modifyBool = $objectProducts->modify($productID, $productName, $productType, $productValue);

    if ($modifyBool) {
        echo "<script>alert('Produto modificado')
              window.location.href='../view/modifyProduct.php'</script>";
    }else{
        echo "<script>alert('Produto não modificado')
        window.location.href='../view/modifyProduct.php'</script>";
    }
