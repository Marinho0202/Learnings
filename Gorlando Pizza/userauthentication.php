<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="estilo/stylepainel.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript">

function loginsuccessfully(){
 setTimeout ("window.location='painel.php'", 2000);
}
function loginfailed(){
setTimeout("window.location='index.php' ",2000);
}
</script>
</head>
<body>
<?php
session_start(); // Certifique-se de iniciar a sessão

// Conexão com o banco de dados usando PDO
$pdo = new PDO('mysql:host=localhost;dbname=modulo_database', 'root', '');

// Verifica se os dados foram enviados pelo formulário
if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Prepara a consulta para buscar o usuário pelo email
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");

    // Executa a consulta com o valor de email passado de forma segura
    $sql->execute(['email' => $email]);

    // Verifica se o usuário existe
    if ($sql->rowCount() > 0) {
        $user = $sql->fetch(PDO::FETCH_ASSOC);

        // Comparação simples da senha
        if ($senha === $user['senha']) { // Verifique se a senha enviada é igual à armazenada
            // Login bem-sucedido, cria sessão
            $_SESSION['email'] = $user['email'];
            $_SESSION['nome'] = $user['nome']; // Armazena outros dados do usuário

            echo "<center>Aguarde um instante! Você está sendo redirecionado.</center>";
            echo "<script>window.location.href='painel.php';</script>"; // Redireciona para uma página protegida
        } else {
            // Senha incorreta
            echo "<center>Senha incorreta! Tente novamente.</center>";
        }
    } else {
        // Usuário não encontrado
        echo "<center>Usuário não encontrado! Verifique o email e tente novamente.</center>";
    }
}
?>

   
</body>
</html>
