<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Médico</title>
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
            width: 350px;
        }
        h2 {
            text-align: center;
            color: #007BFF;
        }
        label {
            font-weight: bold;
            color: #333;
        }
        input[type="text"] {
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
    <form action="salvar_medico.php" method="POST">
        <h2>Cadastrar Médico</h2>
        
        <label for="nome">Nome completo:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="crm">CRM:</label>
        <input type="text" id="crm" name="crm" required>

        <label for="especialidade">Especialidade:</label>
        <input type="text" id="especialidade" name="especialidade">

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" placeholder="(92) 98888-9999">

        <button type="submit">Salvar</button>

        <?php
        if (isset($_GET['msg'])) {
            echo "<p class='msg' style='color:green;'>".htmlspecialchars($_GET['msg'])."</p>";
        }
        ?>
    </form>
</body>
</html>