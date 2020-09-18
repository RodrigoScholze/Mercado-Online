<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Deletar produto</title>
</head>
<body>
    <p class="title">Deletar produto</p>

    <form class="form" action="../controller/deleteProduct.php" method="POST">
        <input type="text" name="id" class="formInput" Placeholder="ID do produto" required><br>

        <input type="submit" class="button" id="leftButtons" value="Deletar">
    </form>

    <button class="button" id="rightButtons" onclick="window.location.href='../index.php'">Inicio</button>
    <button class='button' id='rightButtons' onclick="window.location.href='administrationProducts.php'">Administração de produtos</button>
</body>
</html>