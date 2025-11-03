<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ubs_id = $_POST['ubs_id'];
    $usuario_id = $_POST['usuario_id'];
    $motivo = $_POST['motivo'];
    $data_atendimento = $_POST['data_atendimento'];

    try {
        $sql = "INSERT INTO atendimentos (ubs_id, usuario_id, motivo, data_atendimento) 
                VALUES (:ubs_id, :usuario_id, :motivo, :data_atendimento)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':ubs_id' => $ubs_id,
            ':usuario_id' => $usuario_id,
            ':motivo' => $motivo,
            ':data_atendimento' => $data_atendimento
        ]);

        header("Location: cadastro_atendimento.php?msg=Atendimento registrado com sucesso!");
        exit;
    } catch (PDOException $e) {
        die("Erro ao salvar: " . $e->getMessage());
    }
}
?>