<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="estilo/stylepainel.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gordolando Pizza</title>
</head>
<body>
<?php
session_start();
try {
    // Conexão com o banco de dados usando PDO
    $pdo = new PDO('mysql:host=localhost;dbname=modulo_database', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configura o PDO para lançar exceções em erros

    // Verifica se o usuário está logado
    if (!isset($_SESSION["email"])) {
        header("Location: index.php"); // Redireciona para a página de login
        exit; // Encerra o script após o redirecionamento
    } 
} catch (PDOException $e) {
    // Tratamento de erro ao conectar ao banco de dados
    echo "Erro de conexão: " . $e->getMessage();
}
?>

    <div class="container">
        <h1>Pedido de Pizza</h1>

        <form action="finalizar.php" method="post">
            <label for="sabor">Sabores de Pizza:</label>
            <select id="sabor" name="sabor">
                <option value="marguerita">Marguerita</option>
                <option value="calabresa">Calabresa</option>
                <option value="portuguesa">Portuguesa</option>
                <option value="frango">Frango com Catupiry</option>
                <option value="quatro_queijos">Quatro Queijos</option>
            </select>

            <label for="tamanho">Tamanho da Pizza:</label>
            <select id="tamanho" name="tamanho">
                <option value="pequena">Pequena</option>
                <option value="media">Média</option>
                <option value="grande">Grande</option>
            </select>

            <label>Adicionais:</label>
            <label><input type="checkbox" name="adicionais[]" value="maionese"> Maionese</label>
            <label><input type="checkbox" name="adicionais[]" value="ketchup"> Ketchup</label>
            <label><input type="checkbox" name="adicionais[]" value="bordadourada"> Borda</label>

            <label for="bebidas">Bebidas:</label>
            <select id="bebidas" name="bebidas">
                <option value="refrigerante">Refrigerante</option>
                <option value="suco">Suco Natural</option>
                <option value="agua">Água</option>
            </select>

            <button type="submit">Realizar Pedido</button>
        </form>

        <a href="logout.php">Sair</a>
    </div>

</body>
</html>
