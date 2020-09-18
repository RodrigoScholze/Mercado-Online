<?php
    require_once '../model/products.php';
    require_once '../database/dbConfig.php';

    $productID = addslashes($_POST["id"]);

    $objectProducts = new products($PDO);
    $deleteBool = $objectProducts->delete($productID);

    if ($deleteBool) {
        echo "<script>alert('Produto deletado')
              window.location.href='../view/deleteProduct.php'</script>";
    }else{
        echo "<script>alert('Produto não deletado')
        window.location.href='../view/deleteProduct.php'</script>";
    }
