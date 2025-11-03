<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];

    try {
        $sql = "INSERT INTO usuarios (nome, email, telefone, data_nascimento) 
                VALUES (:nome, :email, :telefone, :data_nascimento)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':telefone' => $telefone,
            ':data_nascimento' => $data_nascimento
        ]);

        header("Location: cadastro_usuario.php?msg=Usuário cadastrado com sucesso!");
        exit;
    } catch (PDOException $e) {
        die("Erro ao salvar: " . $e->getMessage());
    }
}
?>
