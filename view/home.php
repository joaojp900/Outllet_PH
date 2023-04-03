<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outllet PH</title>
    <link rel="stylesheet" href="css/home.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
    <!--cabeçalho da página-->
    <header>
        <ol>
            <li><h2>OUTLLET PH</h2></li>
            <li><a href="<?php ?>carrinho"><img src="image/carrinho-de-compras.png" alt="Carrinho" class="icon_carrinho"></a></li>
        </ol>
        <div class="icon_login">
            <a href="<?php ?>login"><img src="image/login.png" alt="login"></a>
        </div>
    </header>

    <!--Logo abaixo-->
    <div class="logo">
        <img src="image/header.jpeg" alt="Logo">
    </div>

    <div class="h1">
        <h1 class="prod_txt">Produtos</h1></li>
        
    </div>

    <!--Categoria e organizar por-->
    <div>
        <ul>
            <li><h2 class="categoria_h2">Categorias</h2></li>
            <li>
                <select name="filter" id="filter" class="select">
                    <option disabled="" selected="">Ordernar por </option>
                    <option value="highPrice">Maior preço</option>
                    <option value="alphabeticalOrder">Ordem alfabética</option>
                    <option value="inclusionDateOld">Data de inclusão (mais antigo)</option>
                    <option value="inclusionDateLast">Data de inclusão (mais recente)</option>
                </select>
            </li>    
        </ul>
    </div>

    <!--Categorias-->
    <ol>
        <li><input type="checkbox" name="" id="" class="check_cate"></li>
        <li><p>Tenis de primeira linha</p></li>
    </ol>

    <section class="grid1">
        <?php
                include_once'model/servico.php';
                $fun = new servico;
                $fun->inicio();
                $produtos = $_SESSION['pega_produt'];
                foreach ($produtos as $produto) {
                    $img = 'img/'.$produto['imagem'];
                    $nome = $produto['nome'];
                    $preco = 'R$: '.$produto['preco'].',00';
                    ?>
                        <div class="prod_border">
                            <?php echo "<img src=$img class='img_prod'>"; ?>
                            <?php echo "<p class='prod_txt'> $nome </p>"?>
                            <?php echo "<p class='prod_txt'>$preco</p>"?>
                            <button type="submit"> Adicionar ao carrinho</button>
                        </div>
        <?php }?>
    </section>
   
    <!--Icones whatsapp e instagram-->
	<div class="whatsapp">
        <a href="https://api.whatsapp.com/send/?phone=5511940547458&text&type=phone_number&app_absent=0" target="_blank"><img src="https://storage.googleapis.com/neuro-cdn/uploads/72d189bd35267b7a5707699a3705e293.png" alt="whatsapp"></a>
        <a href="https://www.instagram.com/outllet_ph/" target="_blank"><img src="image/instagram.png" alt="Instagram" ></a>
    </div>
</body>
</html>