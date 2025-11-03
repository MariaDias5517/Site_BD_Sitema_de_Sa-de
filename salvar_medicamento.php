<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $principio_ativo = $_POST['principio_ativo'];
    $laboratorio = $_POST['laboratorio'];
    $estoque = $_POST['estoque'];

    try {
        $sql = "INSERT INTO medicamentos (nome, principio_ativo, laboratorio, estoque) 
                VALUES (:nome, :principio_ativo, :laboratorio, :estoque)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':principio_ativo' => $principio_ativo,
            ':laboratorio' => $laboratorio,
            ':estoque' => $estoque
        ]);

        header("Location: cadastro_medicamento.php?msg=Medicamento cadastrado com sucesso!");
        exit;
    } catch (PDOException $e) {
        die("Erro ao salvar: " . $e->getMessage());
    }
}
?>