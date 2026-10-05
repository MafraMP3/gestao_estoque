<?php
include "../infra/database/conexao.php";
$id = isset($_GET["id"]) ? (int)$_GET["id"] : null;
$sql = "DELETE FROM produtos WHERE id = ?";

if ($id) {
    $sql = "DELETE FROM produtos WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close(); 
    }
}
header("location: index.php");
exit();
?>