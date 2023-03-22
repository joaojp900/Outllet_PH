<?php 
    include_once 'controller/ServicoController.php';
    $fun = new ServicoController;
    $fun->logoff();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login lojista</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <!--cabeçalho da página-->
    <header>
        <ol>
            <li><a href="<?php ?>home"><h2>OUTLLET PH</h2></a></li>
        </ol>
    </header>

    <!--Logo abaixo-->
    <div class="logo">
        <img src="image/header.jpeg" alt="Logo">
    </div>
    <h1>Logar</h1>
    <form action="ver_login" method="post">
        <div class="center">
            <ul>
                <li><input type="text" name="usuario" placeholder="Usuário" required></li>
                <br>
                <li><input type="password" name="senha" id="" placeholder="Senha" required></li>
                <br>
                <li><input type="submit" value="Entrar" name="sendLogin"></li>
            </ul>
                
        </div>
    </form>
</body>
</html>