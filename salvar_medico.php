<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $crm = $_POST['crm'];
    $especialidade = $_POST['especialidade'];
    $telefone = $_POST['telefone'];

    try {
        $sql = "INSERT INTO medicos (nome, crm, especialidade, telefone) 
                VALUES (:nome, :crm, :especialidade, :telefone)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':crm' => $crm,
            ':especialidade' => $especialidade,
            ':telefone' => $telefone
        ]);

        header("Location: cadastro_medico.php?msg=Médico cadastrado com sucesso!");
        exit;
    } catch (PDOException $e) {
        die("Erro ao salvar: " . $e->getMessage());
    }
}
?>