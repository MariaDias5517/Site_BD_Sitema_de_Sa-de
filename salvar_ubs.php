<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $telefone = $_POST['telefone'];

    try {
        $sql = "INSERT INTO ubs (nome, endereco, bairro, telefone) 
                VALUES (:nome, :endereco, :bairro, :telefone)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':endereco' => $endereco,
            ':bairro' => $bairro,
            ':telefone' => $telefone
        ]);

        header("Location: cadastro_ubs.php?msg=UBS cadastrada com sucesso!");
        exit;
    } catch (PDOException $e) {
        die("Erro ao salvar: " . $e->getMessage());
    }
}
?>