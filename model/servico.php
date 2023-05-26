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
            $cmd = $con->prepare("INSERT INTO produtos (nome, preco, descricao, imagem,codproduto) 
            VALUES (:nome, :preco, :descricao,:imagem,:codproduto )");

            //enviando o valor dos parâmetros
            $cmd->bindParam(":nome",          $this->nome);
            $cmd->bindParam(":preco",            $this->preco);
            $cmd->bindParam(":descricao",    $this->descricao);
            $cmd->bindParam(":imagem",          $this->imagem);
            $cmd->bindParam(":codproduto", $this->codproduto);
            
            $cmd->execute(); //executar o comando
            //pega ultimo codproduto cadastrado no banco
            $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['pegos'] = $result;
            $this->codproduto = $con->lastInsertId();
        }
             
         

        //outra função para cadastrar as outras fotos no banco
        public function cadastrar2(){
            $con = Conexao::conectar(); //conectar no BD
            //comando SQL para cadastrar (INSERT)
            $cmd = $con->prepare("INSERT INTO imagens (imagem,codproduto) VALUE (:imagem, :codproduto) ");

            //enviando o valor dos parâmetros
            $cmd->bindParam(":imagem",          $this->imagem);
            $cmd->bindParam(":codproduto",          $this->codproduto);
            $cmd->execute(); //executar o comando
        }

        public function jp(){
            $con = Conexao::conectar();
            $cmd = $con->prepare("SELECT * FROM imagens JOIN produtos 
             ON produto.codproduto = imagens.codproduto 
             WHERE produto.codproduto = :codproduto");
             $cmd->bindParam(":codproduto", $this->codproduto);
             $cmd->execute();
             return $cmd->fetchAll(PDO::FETCH_OBJ);

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
        public function info_prod(){
            $con = Conexao::conectar();
            $query = "SELECT * FROM produtos JOIN imagens
            ON produtos.codproduto = imagens.codproduto 
            WHERE produtos.codproduto = :codproduto";
            $cmd = $con->prepare($query);
            $cmd->bindParam(":codproduto", $this->codproduto );
            $cmd->execute();
            $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['pega_descri'] = $result;
        }

        public function consultar()
    {
        $con = Conexao::conectar();//acessar o BD
        $cmd = $con->prepare("SELECT * FROM produtos "); //comando SQL
        $cmd->execute();//executar o comando SQL
        $results =  $cmd->fetchAll(PDO::FETCH_OBJ);
        $_SESSION['pegas'] = $results;
    }







         //CRUD PH

         public function atualizado(){
            
            $con = Conexao::conectar();
            

            $cmd = $con->prepare("UPDATE produtos SET 
             nome = :nome,
             preco = :preco,
             descricao = :descricao
             WHERE codproduto = :codproduto");
             //enviando o valor dos parametros
             $cmd->bindParam(":codproduto", $this->codproduto);
             $cmd->bindParam(":nome", $this->nome);
             $cmd->bindParam(":preco", $this->preco);
             $cmd->bindParam(":descricao", $this->descricao);
             $cmd->execute();
             var_dump($cmd);
         }


         public function excluir(){
            $con = Conexao::conectar();

            $cmd = $con->prepare("DELETE FROM produtos 
            WHERE codproduto = :codproduto");
            //enviar valores
            $cmd->bindParam(":codproduto", $this->codproduto);
            $cmd->execute();
            $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
             
            
         }

         public function retornar()
         {
             $con = Conexao::conectar();//acessar o BD
             $cmd = $con->prepare("SELECT * FROM produtos
             WHERE codproduto = :codproduto"); //comando SQL
             $cmd->bindParam(":codproduto", $this->codproduto);
             $cmd->execute();//executar o comando SQL
            
             
         }
     
         
    }
?>