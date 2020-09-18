<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Adicionar ao carrinho de compras</title>
</head>
<body>
    <p class="title">Adicionar produto ao carrinho de compras</p>

    <form class="form" action="../controller/addShoppingCart.php" method="POST">
        <input type="text" name="id" class="formInput" Placeholder="Digite o ID do produto que deseja adicionar" required><br>
        <input type="text" name="amount" class="formInput" Placeholder="Digite a quantidade que deseja adicionar" required><br>

        <input type="submit" class="button" id="leftButtons" value="Adicionar">
    </form>
    
    <button class="button" id="rightButtons" onclick="window.location.href='../index.php'">Inicio</button>
    <button class="button" id="rightButtons" onclick="window.location.href='shoppingCart.php'">Carrinho de compras</button>
</body>
</html>