<?php
    session_start();

    class servico{
        public $nome;
        public $preco;
        public $codproduto;
        public $descricao;
        public $imagem;

        public function __construct()
        {
            include_once 'model/Conexao.php';
        }

        //Função para verificar login no banco de dados
        public function logar(){
            
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

        public function cadastrar(){
            $con = Conexao::conectar(); //conectar no BD
            //comando SQL para cadastrar (INSERT)
            $cmd = $con->prepare("INSERT INTO produtos (nome, preco, descricao, imagem) 
            VALUES (:nome, :preco, :descricao,:imagem)");
            //enviando o valor dos parâmetros
            $cmd->bindParam(":nome",          $this->nome);
            $cmd->bindParam(":preco",            $this->preco);
            $cmd->bindParam(":descricao",    $this->descricao);
            $cmd->bindParam(":imagem",          $this->imagem);
            $cmd->execute(); //executar o comando
        }

        public function inicio(){
            $con = Conexao::conectar();
            $query = 'SELECT * FROM produtos';
            $cmd = $con->query($query);
            $_SESSION['pega_produt'] = $cmd;
        }

         
    }
?>