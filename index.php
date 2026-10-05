<?php
include "infra/database/conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de estoque</title>
</head>
<body>
    <h3>Cadastre um novo produto</h3>

    <form action="public/cadastrar.php" method="POST">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" placeholder="Digite o nome do produto" required><br><br>

        <label for="categoria">Categoria:</label>
        <input type="text" name="categoria" placeholder="Digite a categoria do produto" required><br><br>

        <label for="quantiaEstoque">Quantia em Estoque:</label>
        <input type="number" name="quantiaEstoque" placeholder="Digite a quantidade em estoque do produto" required><br><br>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" placeholder="Digite o preço do produto" required><br><br>

        <label for="dataValidade">Data de validade:</label>
        <input type="date" name="dataValidade"  required><br><br>

        <input type="submit" value="Cadastrar">
    </form>

    <br><br>
    <?php include "public/components/tabelaProdutos.php"; ?>
</body>
</html>