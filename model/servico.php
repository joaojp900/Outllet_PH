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

        //outra função para cadastrar as outras fotos no banco
        public function cadastrar2(){
            $con = Conexao::conectar(); //conectar no BD
            //comando SQL para cadastrar (INSERT)
            $cmd = $con->prepare("INSERT INTO imagens (imagem, nome) 
            VALUES (:imagem, :nome)");

            //enviando o valor dos parâmetros
            $cmd->bindParam(":imagem",          $this->imagem);
            $cmd->bindParam(":nome",          $this->nome);
            $cmd->execute(); //executar o comando
        }
        //seleciona produtos que aparece na home
        public function inicio(){
            $con = Conexao::conectar();
            $query = 'SELECT * FROM produtos';
            $cmd = $con->query($query);
            $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['pega_produt'] = $result;
        }

        //seleciona produto que aparece na descrição do produto
        public function info_prod($id){
            $con = Conexao::conectar();
            $query = 'SELECT * from produtos WHERE codproduto = :id';
            $cmd = $con->prepare($query);
            $cmd->bindParam(":id", $id);
            $cmd->execute();
            $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['pega_descri'] = $result;
        }

         
    }
?>