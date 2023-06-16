<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outllet PH</title>
    <link rel="stylesheet" href="css/carrinho.css">
</head>

<body>
    <header>
        <ol>
            <li><a href="<?php ?>home">
                    <h2>OUTLLET PH</h2>
                </a></li>
        </ol>
    </header>

    <div class="logo">
        <img src="image/header.jpg" alt="Logo" style="width: 599px; height: 300px;">
    </div>
    <div class="bodycarrinho">
        <h1 class="carrinhoTxt">Carrinho</h1>

        <?php

        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }

        if (isset($_SESSION['carrinho'])) {
            // Calcula o total do carrinho
            $total = 0;
        ?>

            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Valor</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <?php
                foreach ($_SESSION['carrinho'] as $item) {
                    $total += $item['preco'] * $item['quantidade'];
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo ($item["nome"]); ?></td>
                            <td><?php echo ("R$:" . $item["preco"] . ",00"); ?></td>
                            <td><?php echo ($item["quantidade"]); ?></td>
                        </tr>
                    </tbody>
                <?php
                }
                ?>
                <tfoot>
                    <td>
                        <form action="limpaCarrinho">
                            <button type="submit" class="btn">Limpa Carrinho</button>
                        </form>
                    </td>
                    <td>
                        <a href="home"><button class="btn">Continuar comprando</button></a>
                    </td>
                    <td>
                        <form action="form_whats" method="post">
                            <button class="btn">Finalizar compra</button>
                        </form>
                    </td>
                    <td>
                        <p class="txtCenter"><b><?php echo ("Total: R$:" . $total . ",00" . "<br>"); ?></b></p>
                    </td>
                </tfoot>
    </div>
    </table>
<?php
        } else {
            echo ("<p class='vazio'>O carrinho está vazio!</p>");
?>
    <a href="home"><button class="btn">Adicionar produtos</button></a>
<?php
        }
?>
</div>


<div class="whatsapp">
    <a href="https://api.whatsapp.com/send/?phone=5511940547458&text&type=phone_number&app_absent=0" target="_blank"><img src="https://storage.googleapis.com/neuro-cdn/uploads/72d189bd35267b7a5707699a3705e293.png" alt="whatsapp"></a>
    <a href="https://www.instagram.com/outllet_ph/" target="_blank"><img src="image/instagram.png" alt="Instagram"></a>
</div>

<script src="/Outllet_PH/js/quant_prod.js"></script>

</body>

</html>