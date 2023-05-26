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
            <li><a href=""><img src="image/carrinho-de-compras.png" alt="Carrinho" class="icon_carrinho"></a></li>
            <li><a href="<?php $login=false;?>login"><img src="image/sair.png" alt="sair" class="icon_sair"></a></li>
            <li><a href="<?php echo URL?>consulta-produto"><img src="image/sair.png" alt=""></a></li>
        </ol>
    </header>

    <!--Logo abaixo-->
    <div class="logo">
        <img src="image/header.jpg" alt="Logo" style="width: 599px; height: 300px;">
    </div>
                  <?php
                  
                  $fun = new servico();
                  $fun->consultar();
                  $result  = $_SESSION['pegas'];
                  
                  foreach($result as $value){

                  
                  ?>
            
    <h1 class="center">Cadastro de novos produtos.</h1>
    <form action="<?php echo URL;?>atualizar-produtos" method="post" enctype="multipart/form-data">
        <div class="center">
            <ul>
            <input type="text" name="codusuario" id="codusuario" class="form-control" value="<?php echo $value->codproduto?> " readonly required>
                <br>
                <br>
                <li><input type="text" name="nome" placeholder="Nome " value=" <?php echo $value->nome ?>" required ></li>
                <br>
                <li><input type="text" name="preco" placeholder="Preço" value="<?php echo $value->preco ?>"  required></li>
                <br>
                <li><textarea name="descricao" cols="30" rows="10" placeholder="Descrição do produto" value="<?php echo $value->descricao ?>" required></textarea></li>
                <br>
               <?php
               }
               ?>
            </ul>
        </div>
        <div class="btn_center">
            <button type="submit">Enviar</button>
        </div>
        <br>
    </form>
</body>
</html>