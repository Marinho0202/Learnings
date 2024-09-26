<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="estilo/cadastrando.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastramento</title>
    <script type="text/javascript">
        function cadok() {
            setTimeout("window.location='index.php'", 2000);
        }
    </script>
</head>
<body>
    <?php
    session_start();
    $pdo = new PDO('mysql:host=localhost;dbname=modulo_database', 'root', '');
    if (isset($_POST['acao'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $sql = $pdo->prepare("INSERT INTO `usuarios` VALUES (null,?,?,?)");
        $sql->execute(array($nome, $email, $senha));
        echo '<div class="message">Você foi cadastrado com sucesso!</div>';
        echo "<script>cadok()</script>";
    }
    ?>
   
    <div class="container">
        <h1>Cadastrar</h1>
        <form method="post">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type="submit" name="acao" value="Cadastrar">
        </form>
    </div>
</body>
</html>
