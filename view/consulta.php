<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- FontAwesome CSS -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS DataTables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="shortcut icon" href="images/p.png" type="image/x-icon">
    <link rel="stylesheet" href="css/consulta.css">


    <title> Excluir produtos</title>
</head>
<body id="diversos">
 
    <div class="voltarDiv">
        <a href="cadastrar">
            <figure>
                <img src="image/voltar.png" alt="Voltar" class="voltar">
                <figcaption>Voltar</figcaption>
            </figure>
        </a>
    </div>

    <div class="container">
            <div class="col-sm-12 rounded ">
                <a href="javascript:history.back()" type="button" style="margin-left: 75em;" class="btn-close btn-close-white" aria-label="Close" ></a>
                <h3 >Excluir Produtos</h4>
                    <table id="tabela">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome Do Produto</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Imagem</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $fun = new servico();
                            $fun->consultar();
                            $results  = $_SESSION['pegas'];

                            foreach($results  as $value)
                                                 
                            if($_SESSION["pegas"]) {
                            //caso não tenha imagem irá buscar uma imagem padrão    
                            if(!is_file("img/$value->imagem")) $value->imagem = "semimagem.jpeg";
                            echo "<tr>
                                    <th scope='row'>$value->codproduto</th>
                                    <td>$value->nome</td>
                                    <td>$value->preco</td>
                                    <td>$value->descricao</td>
                                    <td><img src='img/$value->imagem' class='img-thumbnail' width='100px'></td>
                                    <td>
                                    <a href='". URL ."excluir-noticia/$value->codproduto' onclick='return confirm(\"Tem certeza?\")' class='btn btn-outline-light btn-sm'><i class='fa fa-trash'></i> Excluir</a>
                                    </td>
                                    <td>
                                    <a href='". URL ."alterar/$value->codproduto' onclick='return confirm(\"Tem certeza?\")' class='btn btn-outline-light btn-sm'><i class='fa fa-trash'></i> Excluir</a>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
            </div>
        </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- JQuery-->
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <!-- JS DataTables -->
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
    <script>
        $(document).ready( function () {
            $('#tabela').DataTable();
        } );
    </script>
</body>
</html>