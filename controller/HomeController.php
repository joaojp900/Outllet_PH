<?php
    class abrir{

        
        public function home(){
            include_once 'view/home.php';
        }

        public function cadastro(){
            include_once 'view/cadastro.php';
        }

        public function carrinho(){
            include_once 'view/carrinho.php';
        }

        public function login(){
            include_once 'view/login.php';
        }

        public function produtos(){
            include_once 'view/produto.php';
        }

        public function form_whats(){
            include_once 'view/form_whats.php';
        }
        public function consulta(){
            include_once 'view/consulta.php';
        }
        public function atualizarprod(){
            include_once 'view/alterar.php';;
        }

    }

?>