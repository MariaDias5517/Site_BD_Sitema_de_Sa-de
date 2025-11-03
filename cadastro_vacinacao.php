<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registrar Vacinação</title>
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
        select, input[type="text"], input[type="date"] {
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
    <form action="salvar_vacinacao.php" method="POST">
        <h2>Registrar Vacinação</h2>
        
        <label for="usuario_id">Paciente:</label>
        <select id="usuario_id" name="usuario_id" required>
            <option value="">Selecione o paciente</option>
            <?php
            // Conectar ao banco e buscar usuários
            require 'conexao.php';
            $stmt = $pdo->query("SELECT id, nome FROM usuarios");
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
            }
            ?>
        </select>

        <label for="vacina">Vacina:</label>
        <input type="text" id="vacina" name="vacina" required>

        <label for="data_vacina">Data da Vacina:</label>
        <input type="date" id="data_vacina" name="data_vacina" required>

        <label for="dose">Dose:</label>
        <input type="text" id="dose" name="dose" placeholder="Ex: 1ª dose, 2ª dose, Reforço">

        <button type="submit">Registrar Vacinação</button>

        <?php
        if (isset($_GET['msg'])) {
            echo "<p class='msg' style='color:green;'>".htmlspecialchars($_GET['msg'])."</p>";
        }
        ?>
    </form>
</body>
</html>