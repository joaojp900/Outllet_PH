<?php
    session_start();
    if(isset($_SESSION['carrinho'])){
        $json = json_encode($_SESSION['carrinho']);
        echo($json);
    }
?>