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

            $targetDir = "img/"; // Pasta de destino para os arquivos enviados
            $uploadedFiles = $_FILES['image']; // Arquivos enviados
            $numFiles = count($uploadedFiles['name']); // Número de arquivos enviados
            $fileName = basename($uploadedFiles['name'][0]);
            $targetFilePath = $targetDir . $fileName;
                // Tenta mover o arquivo enviado para a pasta de destino
                if (move_uploaded_file($uploadedFiles['tmp_name'][0], $targetFilePath)) {
                    $cad->imagem = $fileName;
                    $cad->cadastrar();
                    echo "<script>

                        alert('Dados gravados com sucesso!');
                        window.location='".URL."home';
                        </script>";
                } else {
                    echo "<script>
                    alert('Erro ao enviar os arquivos!');
                    window.location='".URL."home';
                    </script>";
                }
            // Loop através de todos os arquivos enviados
            for ($i = 1; $i < $numFiles; $i++) {
                $fileName = basename($uploadedFiles['name'][$i]); // Nome do arquivo
                $targetFilePath = $targetDir . $fileName; // Caminho completo do arquivo de destino
                 // Tenta mover o arquivo enviado para a pasta de destino
               if (move_uploaded_file($uploadedFiles['tmp_name'][$i], $targetFilePath)) {
                    $cad->imagem = $fileName;
                    //colocar na tabela nova
                    $cad->cods($cad);
                    echo "<script>
                        alert('Dados gravados com sucesso!');
                        window.location='".URL."home';
                        </script>";
                } else {
                    echo "<script>
                    alert('Erro ao enviar os arquivos!');
                    window.location='".URL."home';
                    </script>";
                }
            }
       
        }

        public function inicio(){
            $fun = new servico;
            $fun->inicio();
        }


        public function info_prod($id){
            $fun = new servico;
            $fun->info_prod($id);
        }
    }
?>