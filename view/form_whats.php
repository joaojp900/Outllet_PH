<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar compra</title>
    <link rel="stylesheet" href="css/form_whats.css">
</head>
<body>
    <!--cabeçalho da página-->
    <header>
        <ol>
            <li><h2>Outllet PH</h2></li>
            <li><a href=""><img src="image/carrinho-de-compras.png" alt="Carrinho" class="icon_carrinho"></a></li>
        </ol>
    </header>

    <!--Logo abaixo-->
    <div class="logo">
        <img src="image/header.jpeg" alt="Logo">
    </div>


    <form action="" method="post">
        <div class="center">
            <ol>
                <li><h1>Preencha os campos para finalizar a compra:</h1></li>
                <br>
                <li><input type="text" name="nome" id="" placeholder="Digite seu nome" required></li>
                <br>
                <li><input type="text" name="endereco" id="" placeholder="Digite seu endereço" required></li>
                <br>
                <li><input type="text" name="CPF" id="" placeholder="Digite seu CPF" required></li>
                <br>
                <li><input type="text" name="num_tenis" id="" placeholder="Digite seu numero do tenis" required></li>
                <br>
            </ol>
        </div>
        <div class="btn_center">
            <button type="submit">Enviar</button>
        </div>
    </form>

    <!--Icones whatsapp e instagram-->
	<div class="whatsapp">
        <a href="https://api.whatsapp.com/send/?phone=5511940547458&text&type=phone_number&app_absent=0" target="_blank"><img src="https://storage.googleapis.com/neuro-cdn/uploads/72d189bd35267b7a5707699a3705e293.png" alt="whatsapp"></a>
        <a href="https://www.instagram.com/outllet_ph/" target="_blank"><img src="image/instagram.png" alt="Instagram" ></a>
    </div>
</body>
</html>