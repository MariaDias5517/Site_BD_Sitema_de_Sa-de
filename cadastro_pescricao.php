<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registrar Prescrição</title>
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
        select, input[type="text"] {
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
    <form action="salvar_prescricao.php" method="POST">
        <h2>Registrar Prescrição</h2>
        
        <label for="consulta_id">Consulta:</label>
        <select id="consulta_id" name="consulta_id" required>
            <option value="">Selecione a Consulta</option>
            <?php
            require 'conexao.php';
            $stmt = $pdo->query("SELECT c.id, u.nome as paciente, m.nome as medico, c.data_consulta 
                                FROM consultas c 
                                JOIN usuarios u ON c.usuario_id = u.id 
                                JOIN medicos m ON c.medico_id = m.id");
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$row['id']}'>Paciente: {$row['paciente']} - Médico: {$row['medico']} - Data: {$row['data_consulta']}</option>";
            }
            ?>
        </select>

        <label for="medicamento_id">Medicamento:</label>
        <select id="medicamento_id" name="medicamento_id" required>
            <option value="">Selecione o Medicamento</option>
            <?php
            $stmt = $pdo->query("SELECT id, nome FROM medicamentos");
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
            }
            ?>
        </select>

        <label for="dosagem">Dosagem:</label>
        <input type="text" id="dosagem" name="dosagem" required>

        <label for="duracao">Duração:</label>
        <input type="text" id="duracao" name="duracao" required>

        <button type="submit">Registrar Prescrição</button>

        <?php
        if (isset($_GET['msg'])) {
            echo "<p class='msg' style='color:green;'>".htmlspecialchars($_GET['msg'])."</p>";
        }
        ?>
    </form>
</body>
</html>