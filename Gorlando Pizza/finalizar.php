<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="estilo/styleaguardo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aguardando Pedido</title>
</head>
<body>
    <div class="container">
        <h1>Aguardando seu Pedido!</h1>
        <p>Sua pizza está sendo preparada com muito carinho.</p>
        <p>Agradecemos pela sua preferência! Aguarde um momento, e logo sua deliciosa pizza estará a caminho.</p>
        <div class="loader"></div>
        <p>Redirecionando para a página inicial em <span id="countdown">5</span> segundos...</p>
    </div>

    <script>
        // Contagem regressiva para redirecionamento
        let countdown = 5;
        const countdownElement = document.getElementById('countdown');
        
        const interval = setInterval(() => {
            countdown--;
            countdownElement.textContent = countdown;
            if (countdown <= 0) {
                clearInterval(interval);
                window.location.href = 'index.php'; // Redireciona para a página inicial
            }
        }, 1000);
    </script>
</body>
</html>
