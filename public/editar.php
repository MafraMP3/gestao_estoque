
<?php
include "../infra/database/conn.php";

$id = isset($_GET["id"]) ? (int)$_GET["id"] : null;

if (!$id) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $categoria = $_POST["categoria"];
    $preco = $_POST["preco"];
    $quantiaEstoque = $_POST["quantiaEstoque"];
    $dataValidade = $_POST["dataValidade"];

    if ($nome == null || $categoria == null || $preco == null || $quantiaEstoque == null || $dataValidade == null) {
        echo "<script>
            alert('Não é permitido deixar campos vazios');
            window.location.href = 'editar.php?id=$id';
        </script>";
        exit();
    }

    $sql = "UPDATE produtos SET nome = ?, categoria = ?, preco = ?, quantiaEstoque = ?, dataValidade = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdisi", $nome, $categoria, $preco, $quantiaEstoque, $dataValidade, $id);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Erro ao editar: " . $stmt->error;
    }
}

$sql = "SELECT * FROM produtos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$produto = $resultado->fetch_assoc();

if (!$produto) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto</title>
</head>
<body>

    <h1>Editar produto</h1>

    <form method="POST">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $produto["nome"]; ?>" required>
        <br><br>

        <label for="categoria">Categoria:</label>
        <input type="text" name="categoria" value="<?php echo $produto["categoria"]; ?>" required>
        <br><br>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" step="0.01" value="<?php echo $produto["preco"]; ?>" required>
        <br><br>

        <label for="quantiaEstoque">Quantia em Estoque:</label>
        <input type="number" name="quantiaEstoque" value="<?php echo $produto["quantiaEstoque"]; ?>" required>
        <br><br>

        <label for="dataValidade">Data de validade:</label>
        <input type="date" name="dataValidade" value="<?php echo $produto["dataValidade"]; ?>" required>
        <br><br>

        <input type="submit" value="Salvar alterações">

    </form>

</body>
</html>