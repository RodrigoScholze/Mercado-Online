<?php
    require_once '../model/types.php';
    require_once '../database/dbConfig.php';

    $typeName = addslashes($_POST["name"]);

    $objectType = new types($PDO);
    $removeBool = $objectType->removeType($typeName);

    if ($removeBool) {
        echo "<script>alert('Tipo de produto removido')
              window.location.href='../view/removeType.php'</script>";
    }else{
        echo "<script>alert('Tipo de produto não removido')
        window.location.href='../view/removeType.php'</script>";
    }