
<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outllet PH</title>
    <link rel="stylesheet" href="Css/index.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <!--cabeçalho da página-->
    <header>
        <ol>
            <li><h2>Outllet PH</h2></li>
            <li><a href="<?php ?>"><img src="image/carrinho-de-compras.png" alt="Carrinho" class="icon_carrinho"></a></li>
        </ol>
    </header>
    <div class="teste">

    </div>

    <!--Logo abaixo-->
    <div class="logo">
        <img src="image/header.jpeg" alt="Logo">
    </div>

    <div class="h1">
            <h1>Produtos</h1>
    </div>
    <div class="carrinho-container">

        <?php

        //No caso de um sistema real, os dados abaixo devem vir do banco de dados
        $items = array(
            ['idProduto' => 1 ,'nomeProduto' => 'Gabinete Gamer', 'imagemProduto' => 'image/mizuno_pro3.jpeg', 'precoProduto' => '200.60'],
            ['idProduto' => 2, 'nomeProduto' => 'Webcam Logitech', 'imagemProduto' => 'image/mizuno_pro6.jpeg', 'precoProduto' => '100'],
            ['idProduto' => 3, 'nomeProduto' => 'Monitor Gamer', 'imagemProduto' => 'image/nike_dunk.jpeg', 'precoProduto' => '30000.78']
        );

        //print_r($items);

        foreach ($items as $value) {
        ?>
            <div class="prod_border">
                <img src="<?php echo $value['imagemProduto']; ?>" alt="Imagem do produto" class="img_prod">
                <br>
                <?php echo $value['nomeProduto']; ?>
                <br>
                <b>
                <?php echo "R$" . number_format($value['precoProduto'], 2, ",", ".") ?></b>
                <br>
                <a href="?idProduto=<?php echo $value['idProduto']-1; ?>">Adicionar ao carrinho</a>
            </div>
            <!--produto-->

        <?php
        }
        unset($value);
        ?>

    </div>
    <!--carrinho-container-->






    <!--Icones whatsapp e instagram-->
	<div class="whatsapp">
        <a href="https://api.whatsapp.com/send/?phone=5511940547458&text&type=phone_number&app_absent=0" target="_blank"><img src="https://storage.googleapis.com/neuro-cdn/uploads/72d189bd35267b7a5707699a3705e293.png" alt="whatsapp"></a>
        <a href="https://www.instagram.com/outllet_ph/" target="_blank"><img src="image/instagram.png" alt="Instagram" ></a>
    </div>
</body>
</html>