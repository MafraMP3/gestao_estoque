<?php 
include "../infra/database/conn.php";

$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$preco = $_POST["preco"];
$quantiaEstoque = $_POST["quantiaEstoque"];
$dataValidade = $_POST["dataValidade"];

if ($nome == null || $categoria == null || $dataValidade == null || $preco == null || $quantiaEstoque == null){
    echo "<script>
          alert('Erro no cadastro de produtos, não é permitido campos vazios');
          window.location.href = 'index.php'
          </script>";
    die();
}


$sql = "INSERT INTO produtos (nome,categoria,preco,quantiaEstoque,dataValidade) VALUES (?,?,?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdis", $nome, $categoria, $preco, $quantiaEstoque, $dataValidade);

if ($stmt->execute()) {
    header("Location: ../index.php");
    exit();
} else {
    echo "Erro ao cadastrar: " . $stmt->error;
}