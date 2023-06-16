<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
    <link rel="stylesheet" href="css/produto.css">
</head>

<body>
    <!--cabeçalho da página-->
    <header>
        <ol>
            <li><a href="home">
                    <h2 class="ph_txt">OUTLLET PH</h2>
                </a></li>
            <li>
                <a href="carrinho">
                    <figure class="pos_carrinho">
                        <img src="image/carrinho-de-compras.png" alt="Carrinho" class="icon_carrinho">
                        <figcaption>Carrinho</figcaption>
                    </figure>
                </a>
            </li>
        </ol>
    </header>

    <!--Logo abaixo-->
    <div class="logo">
        <img src="image/header.jpg" alt="Logo" style="width: 599px; height: 300px;">
    </div>

    <?php
    $id = $_POST['id'];
    $fun = new ServicoController;
    $fun->info_prod($id);
    $produto = $_SESSION['pega_descri'];
    $img = 'img/' . $produto[0]["imagem"];
    $img2 = 'img/' . $produto[0]["imagens"];
    if(isset($produto[1]["imagens"])){
        $img3 = 'img/' . $produto[1]["imagens"];
    }
    

    // Verifica se um produto foi adicionado ao carrinho
    if (isset($_POST['txt_quant'])) {
        // Adiciona o produto ao carrinho
        $id = $_POST['id'];
        $quant = $_POST['txt_quant'];
        if (isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id]['quantidade']++;
            header("location: carrinho");
        } else {
            $_SESSION['carrinho'][$id] = array(
                "codproduto" => $id,
                "quantidade" => $quant,
                "preco" => $produto[0]['preco'],
                "nome" => $produto[0]['nome'],
            );
            header("location: carrinho");
        }
    }
    ?>

    <div class="conteudo">
        <section>
            <ul>
                <li><?php echo "<img src=$img id='img1'>"; ?></li>
                <li><?php echo "<img class='img_prod' id='img2' src=$img>"; ?><input type="text" hidden value="<?php echo"$img"?>" id='img2Src'></li>
                <li><?php echo "<img class='img_prod' id='img3' src=$img2>"; ?><input type="text" hidden value="<?php echo"$img2"?>" id='img3Src'></li>
                <?php
                    if(isset($img3)){
                ?>
                    <li><img class='img_prod' id="img4" src="<?php echo"$img3"?>"><input type="text" hidden value="<?php echo"$img3"?>" id='img4Src'></li>
                <?php
                    }
                ?>
            </ul>
        </section>


        <form method="post">
            <ol class="info">
                <li>
                    <h3><?php echo ($produto[0]['nome']) ?></h3>
                </li>
                <li>
                    <h2><?php echo ('R$: ' . $produto[0]['preco'] . ',00') ?></h2>
                </li>
                <li>
                    <div class="quantidade">
                        <input type="button" value="+" class="btn_quantidade" id="mais">
                        <input type="text" name="txt_quant" readonly value="0" id='txt_quant'>
                        <input type="button" value="-" class="btn_quantidade" id="menos">
                    </div>
                </li>
                <li><button>Adicionar ao carrinho</button></li>
            </ol>
            <input type="hidden" name="id" value="<?php echo ($produto[0]['codproduto']); ?>">
        </form>
    </div>

        <div class="descricao">
            <h3>Descrição:</h3>
            <p><?php echo ($produto[0]['descricao']) ?></p>
        </div>


    <!--Icones whatsapp e instagram-->
    <div class="whatsapp">
        <a href="https://api.whatsapp.com/send/?phone=5511940547458&text&type=phone_number&app_absent=0" target="_blank"><img src="https://storage.googleapis.com/neuro-cdn/uploads/72d189bd35267b7a5707699a3705e293.png" alt="whatsapp"></a>
        <a href="https://www.instagram.com/outllet_ph/" target="_blank"><img src="image/instagram.png" alt="Instagram"></a>
    </div>

    <script src="/Outllet_PH/js/quant_prod.js"></script>
    <script src="/Outllet_PH/js/img_prod.js"></script>

</body>

</html>