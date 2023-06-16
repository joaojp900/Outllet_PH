<?php
    include_once 'controller/ServicoController.php';
    $fun = new ServicoController();
    $fun->valid_login();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produtos</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>

    <!--cabeçalho da página-->
    <header>
        <ol>
            <li><a href="<?php ?>home"><h2>OUTLLET PH</h2></a></li>
            <li>
                <a href="<?php $login=false;?>login">
                    <figure class="icon_sair">
                        <img src="image/sair.png" alt="sair" class="img_icon">
                        <Figcaption>Sair</Figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="consulta-produto">
                    <figure class="icon_excluir">
                        <img src="image/lixeira.png" alt="sair" class="img_icon">
                        <figcaption>Exlcuir</figcaption>
                    </figure>
                </a>
            </li>
            <li>
                <a href="alterar">
                    <figure class="icon_alterar">
                        <img src="image/editar.png" alt="sair" class="img_icon">
                        <figcaption>Alterar</figcaption>
                    </figure>
                </a>
            </li>
        </ol>
    </header>

    <!--Logo abaixo-->
    <div class="logo">
        <img src="image/header.jpg" alt="Logo" style="width: 599px; height: 300px;">
    </div>

    <h1 class="center">Cadastro de novos produtos.</h1>
    <form action="enviar" method="post" enctype="multipart/form-data">
        <div class="center">
            <ul>
                <li><input type="text" name="nome" placeholder="Nome do produto"></li>
                <br>
                <li><input type="text" name="preco" placeholder="Preço"></li>
                <br>
                <li><textarea name="descricao" cols="30" rows="10" placeholder="Descrição do produto"></textarea></li>
                <br>
                <li><input type="file" name="image[]" accept="image/*" multiple require></li>
            </ul>
        </div>
        <div class="btn_center">
            <button type="submit">Enviar</button>
        </div>
        <br>
    </form>
</body>
</html>