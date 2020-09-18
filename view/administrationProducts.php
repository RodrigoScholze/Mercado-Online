<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Administração de produtos</title>
</head>
<body>
    <p class="title">Administração de produtos</p>
    <table class="salesTable">
        <tr>
            <th>ID do produto</th>
            <th>Produto</th>
            <th>Valor (R$)</th>
            <th>Tipo</th>
        </tr>

        <?php
            require_once '../controller/showProducts.php';
            
            $arraySize = count($Products) - 1;

            for ($i = 0; $i <= $arraySize; $i++){
                echo "<tr>";
                foreach($Products[$i] as $value){
                        echo "<td>${value}</td>";
                    }
                echo "</tr>";        
            }
        ?>
    </table>

    <table class="salesTable">
        <tr>
            <th>Tipo</th>
            <th>Imposto (%)</th>
        </tr>

        <?php
            require_once '../controller/showTypes.php';

            $arraySize = count($productsTypes) - 1;

            for ($i = 0; $i <= $arraySize; $i++){
                echo "<tr>";
                foreach($productsTypes[$i] as $value){
                        echo "<td>${value}</td>";
                    }
                echo "</tr>";        
            }
        ?>
    </table>

    <button class='button' id='leftButtons' onclick="window.location.href='registerProduct.php'">Cadastrar produto</button>
    <button class='button' id='leftButtons' onclick="window.location.href='deleteProduct.php'">Deletar produto</button>
    <button class='button' id='leftButtons' onclick="window.location.href='modifyProduct.php'">Modificar produto</button>
    <button class='button' id='leftButtons' onclick="window.location.href='createType.php'">Cadastrar tipo de produto</button>
    <button class='button' id='leftButtons' onclick="window.location.href='removeType.php'">Remover tipo de produto</button>
    <button class="button" id="rightButtons" onclick="window.location.href='../index.php'">Inicio</button>
</body>
</html>