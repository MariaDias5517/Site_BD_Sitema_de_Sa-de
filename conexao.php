<?php
// conexao.php
$host = "127.0.0.1";    // ou "localhost"
$user = "root";
$pass = "";             // senha padrão do XAMPP é vazia
$dbname = "app_saude";
$port = 3307;

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    // echo "Conectado com sucesso!";
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
