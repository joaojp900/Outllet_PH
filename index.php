<?php
include_once 'controler/HomeController.php';
include_once 'controler/Conexao.php';
include_once 'controler/ServicoController.php';

//minha url
define('URL','http://localhost/Outllet_PH/');

if(isset($_GET['url']))
{
    $url = explode('/', $_GET['url']);
    switch($url[0])
    {
        //rotas para categoria
              
        case'home':
            $usu = new abrir();
            $usu->home();
        break;

        case 'cadastrar':
                $sla = new Abrir();
                $sla->cadastro();
        break;
           

        case'carrinho':
            $usu = new abrir();
            $usu->carrinho();
        break;

        default:
            echo "página não encontrada<br>
            Verificar se existe a rota criada<br>
            Tentando acessar a rota: $url[0]";
            //poderá depois abrir uma página de aviso
        break;

    }

}
else
{
    //abrir a página inicial
    
}


?>