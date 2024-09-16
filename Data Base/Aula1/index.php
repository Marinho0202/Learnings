<?php
    date_default_timezone_set('America/Sao_Paulo');
    $pdo = new PDO('mysql:host=localhost;dbname=aprendendo', 'root', '');
    if(isset($_POST['acao'])){
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $momento_registro= date('Y-m-d H:i:s');
    $sql = $pdo->prepare("INSERT INTO `clientes` VALUES (null,?,?,?)");
    $sql->execute(array($nome,$sobrenome,$momento_registro));
    echo 'Você foi cadastrado com sucesso';
}
    $id = 3;
    //UPDATE = CASO EU QUEIRA ATUALIZAR DENTRO DO MEU BANCO DE DADOS LOCAL ;3
    $sql_up = $pdo->prepare("UPDATE `clientes` SET nome='Fizz', sobrenome='Now' WHERE nome='Alex' OR sobrenome='Dias Moutinho'");

    if($sql_up->execute()){
        echo 'O cliente foi atualizado com sucesso!';
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
        <form method="post">
            <input type="text" name="nome" required>
            <input type="text" name="sobrenome" required>
            <input type="submit" name="acao" value="Enviar!">
        </form>
</body>
</html>