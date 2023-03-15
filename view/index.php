
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
            <li><a href="carrinho.html"><img src="image/carrinho-de-compras.png" alt="Carrinho" class="icon_carrinho"></a></li>
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

    <?php
        $item = array(['nome' => 'mizuno_pro3', 'imagem'=>'image/mizuno_pro3.jpeg', 'preco' =>'340'], ['nome' => 'mizuno_pro6', 'imagem'=>'image/mizuno_pro6.jpeg', 'preco' =>'300'],
        ['nome' => 'nike_dunk','imagem'=>'image/nike_dunk.jpeg', 'preco' =>'150'], ['nome' => 'nike_tn3','imagem'=>'image/nike_tn3.jpeg', 'preco' =>'300']);
    
        foreach ($item as $key => $value){
    ?>

        <!--Grid de produtos-->
    <section class="grid1">
        <div class="prod_border">
            <img src="<?php echo $value ['imagem']?>" alt="MIZUNO PRO 3" class="produtos">
            <p class="text">MIZUNO PRO 3</p>
            <p class="text">R$: 340,00</p>
            <a href="?adicionar=<?php echo $key ?>"><button type="submit">COMPRAR</button></a>
        </div>
    </section>
        
    <?php
        }
    
    ?>

    <?php
        if(isset($_GET['adicionar'])){
            $idProduto = (int) $_GET['adicionar'];
            if(isset($item[$idProduto])){
                if(isset($_SESSION[$idProduto])){
                    $_SESSION['carrinho'][$idProduto]['quantidade']++;
                }else{
                    $_SESSION['carrinho'][$idProduto] = array('quantidade'=>1, 'nome'=>$item[$idProduto]['nome'], 'preco'=>$item[$idProduto]['preco']);
                }
                echo'<script>alert("Item adicionado ao carrinho");</script>)';
            }else{
                die('O produto não existe');
            }
        }
    ?>
    <h2 class="carrinho_php">Carrinho:</h2>
    <?php
        foreach($_SESSION['carrinho'] as $key => $value){
            echo $value['nome'], $value['quantidade'], $value['preco'];
        }
    ?>

    <!--Icones whatsapp e instagram-->
	<div class="whatsapp">
        <a href="https://api.whatsapp.com/send/?phone=5511940547458&text&type=phone_number&app_absent=0" target="_blank"><img src="https://storage.googleapis.com/neuro-cdn/uploads/72d189bd35267b7a5707699a3705e293.png" alt="whatsapp"></a>
        <a href="https://www.instagram.com/outllet_ph/" target="_blank"><img src="image/instagram.png" alt="Instagram" ></a>
    </div>
</body>
</html>