<?php
    session_start();

    class servico{

        public function __construct()
        {
            include_once 'controller/Conexao.php';
        }

        //Função para verificar login no banco de dados
        function logar(){
            
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if(!empty($dados['sendLogin'])){
                $con = Conexao::conectar();

                //query para verificar no banco se o usuário e senha existe
                $query = "SELECT * FROM usuario WHERE nome = :usuario && senha =:senha  LIMIT 1";
                $cmd = $con->prepare($query);
                $cmd->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
                $cmd->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);
                $cmd->execute();
                $row_usuario = $cmd->fetch(PDO::FETCH_ASSOC);

                //valida se pegou o registro do usuário
                if($row_usuario > 0){
                    $_SESSION['usuario'] = 'logado';
                    header('Location: cadastrar');
                }else{
                    echo "<script>
                            alert('Usuário ou senha incorreto!');
                            window.location='".URL."login';
                        </script>";
                }
            }
        }
         
    }
?>