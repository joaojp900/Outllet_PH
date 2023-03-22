<?php
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
    }
    
?>