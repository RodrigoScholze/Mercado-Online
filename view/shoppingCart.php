<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Carrinho de compras</title>
</head>
<body>
    <p class="title">Carrinho de compras</p>
    <table class='salesTable'>
        <tr>
            <th>ID do produto</th>
            <th>Produto</th>
            <th>Tipo</th>
            <th>Quantidade</th>
            <th>Valor (R$)</th>
            <th>Imposto (R$)</th>
        </tr>

        <?php
            require_once '../controller/showShoppingCart.php';
            
            $arraySize = count($productsShoppingCart) - 1;

            for ($i = 0; $i <= $arraySize; $i++){
                echo "<tr>";
                foreach($productsShoppingCart[$i] as $value){
                        echo "<td>${value}</td>";
                    }
                echo "</tr>";        
            }
        ?>
    </table>

    <table class="salesTable">
        <tr>
            <th>Valor Total (R$)</th>
            <th>Imposto Total (R$)</th>
        </tr>

        <?php
            require_once '../controller/totalShoppingCart.php';

            echo "<tr>";
                echo "<td>".$totalShoppingCart[0]."</td>";
                echo "<td>".$totalShoppingCart[1]."</td>";
            echo "<tr>";
        ?>
    </table>

    <button class='button' id='leftButtons' onclick="window.location.href='addShoppingCart.php'">Adicionar produto ao carrinho de compras</button>
    <button class='button' id='leftButtons' onclick="window.location.href='removeShoppingCart.php'">Remover produto do carrinho de compras</button>
    <button class="button" id="rightButtons" onclick="window.location.href='../index.php'">Inicio</button>
</body>
</html>