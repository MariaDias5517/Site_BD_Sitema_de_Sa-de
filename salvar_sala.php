<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ubs_id = $_POST['ubs_id'];
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $capacidade = $_POST['capacidade'];

    try {
        $sql = "INSERT INTO salas (ubs_id, nome, tipo, capacidade) 
                VALUES (:ubs_id, :nome, :tipo, :capacidade)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':ubs_id' => $ubs_id,
            ':nome' => $nome,
            ':tipo' => $tipo,
            ':capacidade' => $capacidade
        ]);

        header("Location: cadastro_sala.php?msg=Sala cadastrada com sucesso!");
        exit;
    } catch (PDOException $e) {
        die("Erro ao salvar: " . $e->getMessage());
    }
}
?>