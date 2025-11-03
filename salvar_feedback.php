<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario_id = $_POST['usuario_id'] ?? null;
    $ubs_id = $_POST['ubs_id'] ?? null;
    $nota = $_POST['nota'] ?? null;
    $comentario = $_POST['comentario'] ?? '';

    if (!is_numeric($usuario_id) || !is_numeric($ubs_id) || !is_numeric($nota)) {
        $msg = "Por favor, selecione dados válidos.";
        header("Location: cadastro_feedback.php?msg=".urlencode($msg)."&tipo=erro");
        exit;
    }

    $comentario = htmlspecialchars($comentario, ENT_QUOTES, 'UTF-8');

    try {
        $sql = "INSERT INTO feedbacks (usuario_id, ubs_id, nota, comentario)
                VALUES (:usuario_id, :ubs_id, :nota, :comentario)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':usuario_id' => $usuario_id,
            ':ubs_id' => $ubs_id,
            ':nota' => $nota,
            ':comentario' => $comentario
        ]);

        $msg = "Feedback registrado com sucesso!";
        header("Location: cadastro_feedback.php?msg=".urlencode($msg)."&tipo=sucesso");
        exit;
    } catch (PDOException $e) {
        $msg = "Erro ao salvar o feedback. Tente novamente mais tarde.";
        header("Location: cadastro_feedback.php?msg=".urlencode($msg)."&tipo=erro");
        exit;
    }
}
