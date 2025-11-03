<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario_id = $_POST['usuario_id'];
    $vacina = $_POST['vacina'];
    $data_vacina = $_POST['data_vacina'];
    $dose = $_POST['dose'];

    try {
        $sql = "INSERT INTO vacinacoes (usuario_id, vacina, data_vacina, dose) 
                VALUES (:usuario_id, :vacina, :data_vacina, :dose)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':usuario_id' => $usuario_id,
            ':vacina' => $vacina,
            ':data_vacina' => $data_vacina,
            ':dose' => $dose
        ]);

        header("Location: cadastro_vacinacao.php?msg=Vacinação registrada com sucesso!");
        exit;
    } catch (PDOException $e) {
        die("Erro ao salvar: " . $e->getMessage());
    }
}
?>