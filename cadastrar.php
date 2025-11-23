<?php
include('conexao.php');
$sucesso = $erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        $sucesso = "Usuário cadastrado com sucesso! <a href='login.php'>Faça login</a>.";
    } else {
        $erro = "Erro: " . $conn->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Cadastro</h2>

        <?php
        if ($sucesso) {
            echo "<p style='color:green; margin-bottom:15px;'>$sucesso</p>";
        }
        if ($erro) {
            echo "<p style='color:red; margin-bottom:15px;'>$erro</p>";
        }
        ?>

        <form method="POST">
            <input type="text" name="nome" placeholder="Nome completo" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Cadastrar</button>
        </form>

        <p>Já tem conta? <a href="login.php">Entrar</a></p>
    </div>
</body>
</html>
