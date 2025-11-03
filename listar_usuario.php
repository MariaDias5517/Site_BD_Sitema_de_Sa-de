<?php
require 'conexao.php';

$stmt = $pdo->query("SELECT id, nome, email, telefone, data_nascimento FROM usuarios");
$usuarios = $stmt->fetchAll();

header('Content-Type: application/json; charset=utf-8');
echo json_encode($usuarios, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
