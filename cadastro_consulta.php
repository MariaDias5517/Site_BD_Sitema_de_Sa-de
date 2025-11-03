<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Consulta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f7fb;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
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
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }
        select, input[type="datetime-local"] {
            width: 100%;
            padding: 10px;
            margin: 6px 0 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            background: #007BFF;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background: #0056b3;
        }
        .msg {
            text-align: center;
            margin-top: 15px;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        .sucesso {
            color: green;
            background-color: #f0fff0;
            border: 1px solid green;
        }
        .erro {
            color: red;
            background-color: #fff0f0;
            border: 1px solid red;
        }
    </style>
</head>
<body>
    <form action="salvar_consulta.php" method="POST">
        <h2>Cadastrar Consulta</h2>
        
        <label for="usuario_id">Paciente:</label>
        <select id="usuario_id" name="usuario_id" required>
            <option value="">Selecione o paciente</option>
            <?php
            try {
                require 'conexao.php';
                $stmt = $pdo->query("SELECT id, nome FROM usuarios ORDER BY nome");
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                }
            } catch (PDOException $e) {
                echo "<option value=''>Erro ao carregar pacientes</option>";
            }
            ?>
        </select>

        <label for="medico_id">Médico:</label>
        <select id="medico_id" name="medico_id" required>
            <option value="">Selecione o médico</option>
            <?php
            try {
                $stmt = $pdo->query("SELECT id, nome, especialidade FROM medicos ORDER BY nome");
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$row['id']}'>{$row['nome']} - {$row['especialidade']}</option>";
                }
            } catch (PDOException $e) {
                echo "<option value=''>Erro ao carregar médicos</option>";
            }
            ?>
        </select>

        <label for="data_consulta">Data e Hora:</label>
        <input type="datetime-local" id="data_consulta" name="data_consulta" required>

        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="agendada">Agendada</option>
            <option value="confirmada">Confirmada</option>
            <option value="realizada">Realizada</option>
            <option value="cancelada">Cancelada</option>
        </select>

        <button type="submit">Cadastrar Consulta</button>

        <?php
        if (isset($_GET['msg'])) {
            $tipo = $_GET['tipo'] ?? 'erro';
            $classe = ($tipo === 'sucesso') ? 'sucesso' : 'erro';
            echo "<div class='msg $classe'>" . htmlspecialchars($_GET['msg']) . "</div>";
        }
        ?>
    </form>
</body>
</html>