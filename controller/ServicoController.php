<?php
    include_once'model/servico.php';

    class ServicoController{
        public $login;
        //desloga da pagina cadastro
        function logoff(){
            if(!isset($login)){
                session_destroy();
                header('login');
            }
        }

        //verifica se tem sessão para o login
        function valid_login(){
            if(!isset($_SESSION['usuario'])){
                echo "<script>
                        window.location='".URL."login';
                    </script>";
                exit;
            }
        }

        public function cadastrar(){
    
    
            $cad = new servico();

            $cad->nome = $_POST["nome"];
            $cad->preco = $_POST["preco"];
            $cad->descricao = $_POST["descricao"];
            $cad->imagem = 'semimagem.jpg';

            if(isset($_FILES['image'])){

                $extensão = strtolower(substr($_FILES['image']['name'], -5));
                $novo_nome = md5(time()).$extensão;
                $diretorio = "img/";

                move_uploaded_file($_FILES['image']['tmp_name'],$diretorio .$novo_nome);

                $cad->imagem = $novo_nome;
                $cad->cadastrar();

                echo "<script>
                        alert('Dados gravados com sucesso!');
                        window.location='".URL."home';
                        </script>";

            }
        
        }
    }
?>