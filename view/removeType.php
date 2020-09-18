<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Remover tipo de produto</title>
</head>
<body>
    <p class="title">Remover tipo de produto</p>

    <form class="form" action="../controller/removeType.php" method="POST">
        <input type="text" name="name" class="formInput" Placeholder="Nome do tipo de produto" required><br>

        <input type="submit" class="button" id="leftButtons" value="Remover">
    </form>

    <button class="button" id="rightButtons" onclick="window.location.href='../index.php'">Inicio</button>
    <button class='button' id='rightButtons' onclick="window.location.href='administrationProducts.php'">Administração de produtos</button>
</body>
</html>