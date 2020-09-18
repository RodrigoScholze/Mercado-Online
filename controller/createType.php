<?php
    require_once '../model/types.php';
    require_once '../database/dbConfig.php';

    $typeName = addslashes($_POST["name"]);
    $typePercent = addslashes($_POST["percent"]);

    $objectType = new types($PDO);
    $createBool = $objectType->createType($typeName, $typePercent);

    if ($createBool) {
        echo "<script>alert('Tipo de produto cadastrado')
              window.location.href='../view/createType.php'</script>";
    }else{
        echo "<script>alert('Tipo de produto não cadastrado')
        window.location.href='../view/createType.php'</script>";
    }