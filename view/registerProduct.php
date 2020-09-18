<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Cadastrar produto</title>
</head>
<body>
    <p class="title">Cadastrar produto</p>

    <form class="form" action="../controller/registerProduct.php" method="POST">
        <input type="text" name="name" class="formInput" Placeholder="Nome do produto" required><br>
        <input type="text" name="value" class="formInput" Placeholder="Valor do produto" required><br>

        <p>Tipo do produto:</p>
        <?php
            require_once '../controller/showTypes.php';
            
            $arraySize = count($productsTypes) - 1;

            for ($i = 0; $i <= $arraySize; $i++){
                echo "<input type='radio' name='type' value=".$productsTypes[$i]["type"]." checked><label>".$productsTypes[$i]["type"]."</label></input><br>";        
            }
        ?>
        <br>

        <input type="submit" class="button" id="leftButtons" value="Cadastrar">
    </form>

    <button class="button" id="rightButtons" onclick="window.location.href='../index.php'">Inicio</button>
    <button class='button' id='rightButtons' onclick="window.location.href='administrationProducts.php'">Administração de produtos</button>
</body>
</html>