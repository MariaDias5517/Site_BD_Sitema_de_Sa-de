<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Sala</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f7fb;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            color: #007BFF;
        }
        label {
            font-weight: bold;
            color: #333;
        }
        select, input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 6px 0 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        button {
            width: 100%;
            background: #007BFF;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .msg {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <form action="salvar_sala.php" method="POST">
        <h2>Cadastrar Sala</h2>
        
        <label for="ubs_id">UBS:</label>
        <select id="ubs_id" name="ubs_id" required>
            <option value="">Selecione a UBS</option>
            <?php
            require 'conexao.php';
            $stmt = $pdo->query("SELECT id, nome FROM ubs");
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
            }
            ?>
        </select>

        <label for="nome">Nome da Sala:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" placeholder="Ex: Consultório, Pediatria">

        <label for="capacidade">Capacidade:</label>
        <input type="number" id="capacidade" name="capacidade" min="1" value="1">

        <button type="submit">Cadastrar Sala</button>

        <?php
        if (isset($_GET['msg'])) {
            echo "<p class='msg' style='color:green;'>".htmlspecialchars($_GET['msg'])."</p>";
        }
        ?>
    </form>
</body>
</html>