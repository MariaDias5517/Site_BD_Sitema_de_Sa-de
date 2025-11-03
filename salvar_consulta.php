<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario_id = $_POST['usuario_id'] ?? null;
    $medico_id = $_POST['medico_id'] ?? null;
    $data_consulta = $_POST['data_consulta'] ?? null;
    $status = $_POST['status'] ?? 'agendada';

    // Validações
    if (!is_numeric($usuario_id) || !is_numeric($medico_id) || empty($data_consulta)) {
        $msg = "Por favor, preencha todos os campos obrigatórios.";
        header("Location: cadastro_consulta.php?msg=" . urlencode($msg) . "&tipo=erro");
        exit;
    }

    try {
        // Verificar se usuário existe
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE id = ?");
        $stmt->execute([$usuario_id]);
        if (!$stmt->fetch()) {
            $msg = "Usuário não encontrado.";
            header("Location: cadastro_consulta.php?msg=" . urlencode($msg) . "&tipo=erro");
            exit;
        }

        // Verificar se médico existe
        $stmt = $pdo->prepare("SELECT id FROM medicos WHERE id = ?");
        $stmt->execute([$medico_id]);
        if (!$stmt->fetch()) {
            $msg = "Médico não encontrado.";
            header("Location: cadastro_consulta.php?msg=" . urlencode($msg) . "&tipo=erro");
            exit;
        }

        // Inserir consulta
        $sql = "INSERT INTO consultas (usuario_id, medico_id, data_consulta, status) 
                VALUES (:usuario_id, :medico_id, :data_consulta, :status)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':usuario_id' => $usuario_id,
            ':medico_id' => $medico_id,
            ':data_consulta' => $data_consulta,
            ':status' => $status
        ]);

        $msg = "Consulta agendada com sucesso!";
        header("Location: cadastro_consulta.php?msg=" . urlencode($msg) . "&tipo=sucesso");
        exit;

    } catch (PDOException $e) {
        $msg = "Erro ao agendar consulta. Tente novamente mais tarde.";
        header("Location: cadastro_consulta.php?msg=" . urlencode($msg) . "&tipo=erro");
        exit;
    }
} else {
    // Se acessado diretamente, redirecionar
    header("Location: cadastro_consulta.php");
    exit;
}
?>