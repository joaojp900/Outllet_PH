<?php
include_once 'controller/HomeController.php';
include_once 'controller/Conexao.php';
include_once 'controller/ServicoController.php';
include_once 'model/servico.php';

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

        case'login':
            $usu = new abrir();
            $usu->login();
        break;

        case'produtos':
            $usu = new abrir();
            $usu->produtos();
        break;

        case'form_whats':
            $usu = new abrir();
            $usu->form_whats();
        break;

        case 'ver_login':
            $usu = new servico();
            $usu->logar();
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