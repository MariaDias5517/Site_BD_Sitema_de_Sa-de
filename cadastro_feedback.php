<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registrar Feedback</title>
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
        select, input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            margin: 6px 0 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        textarea {
            height: 100px;
            resize: vertical;
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
    <form action="salvar_feedback.php" method="POST">
        <h2>Registrar Feedback</h2>
        
        <label for="usuario_id">Usuário:</label>
        <select id="usuario_id" name="usuario_id" required>
            <option value="">Selecione o usuário</option>
            <?php
            require 'conexao.php';
            $stmt = $pdo->query("SELECT id, nome FROM usuarios");
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
            }
            ?>
        </select>

        <label for="ubs_id">UBS:</label>
        <select id="ubs_id" name="ubs_id" required>
            <option value="">Selecione a UBS</option>
            <?php
            $stmt = $pdo->query("SELECT id, nome FROM ubs");
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
            }
            ?>
        </select>

        <label for="nota">Nota (0-5):</label>
        <input type="number" id="nota" name="nota" min="0" max="5" step="1" required>

        <label for="comentario">Comentário:</label>
        <textarea id="comentario" name="comentario"></textarea>

        <button type="submit">Registrar Feedback</button>

        <?php
        if (isset($_GET['msg'])) {
            echo "<p class='msg' style='color:green;'>".htmlspecialchars($_GET['msg'])."</p>";
        }
        ?>
    </form>
</body>
</html>