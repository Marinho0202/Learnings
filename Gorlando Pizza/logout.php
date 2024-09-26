<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="estilo/stylelogout.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (isset($_SESSION['email'])) {
    // Exibe a mensagem de despedida
    echo "Obrigado " . htmlspecialchars($_SESSION['nome']) . ", pela preferência! Volte sempre!";
    
    // Destrói a sessão
    session_destroy(); // Encerra a sessão

    // Redireciona para a página de login após 3 segundos
    header("refresh:3;url=index.php");
    exit; // Encerra o script após o redirecionamento
} else {
    // Se não estiver logado, redireciona para a página de login
    header("Location: index.php");
    exit;
}
?>
</body>
</html>
