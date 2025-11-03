<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $consulta_id = $_POST['consulta_id'];
    $medicamento_id = $_POST['medicamento_id'];
    $dosagem = $_POST['dosagem'];
    $duracao = $_POST['duracao'];

    try {
        $sql = "INSERT INTO prescricoes (consulta_id, medicamento_id, dosagem, duracao) 
                VALUES (:consulta_id, :medicamento_id, :dosagem, :duracao)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':consulta_id' => $consulta_id,
            ':medicamento_id' => $medicamento_id,
            ':dosagem' => $dosagem,
            ':duracao' => $duracao
        ]);

        header("Location: cadastro_prescricao.php?msg=Prescrição registrada com sucesso!");
        exit;
    } catch (PDOException $e) {
        die("Erro ao salvar: " . $e->getMessage());
    }
}
?>