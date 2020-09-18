<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Remover do carrinho de compras</title>
</head>
<body>
    <p class="title">Remover produto do carrinho de compras</p>

    <form class="form" action="../controller/removeShoppingCart.php" method="POST">
        <input type="text" name="id" class="formInput" Placeholder="Digite o ID do produto que deseja remover" required><br>

        <input type="submit" class="button" id="leftButtons" value="Remover">
    </form>
     
    <button class="button" id="rightButtons" onclick="window.location.href='../index.php'">Inicio</button>
    <button class="button" id="rightButtons" onclick="window.location.href='shoppingCart.php'">Carrinho de compras</button>
</body>
</html>