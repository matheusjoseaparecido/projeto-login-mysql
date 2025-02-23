<?php 

    class Pessoa {
        
        private $pdo;

        // Conexão
        public function __construct($host, $dbname, $user, $senha) {
            try {
                $this -> pdo = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $user, $senha);            
            } catch (PDOException $e) {
                echo "Erro com o banco de dados: " . $e -> getMessage();
                exit();
            } catch (Exception $e) {
                echo "Erro generico: " . $e -> getMessage();
            }
        }

        public function buscarDados() {

            $res = array();
            
            $cmd = $this -> pdo -> query("SELECT * FROM tb01_user ORDER BY tb01_nome");

            $res = $cmd -> fetchAll(PDO::FETCH_ASSOC);

            return $res;
        }

        public function cadastrarPessoa($nome, $email, $senha) {

            // Verificação de Duplicidade
            $cmd = $this -> pdo -> prepare("SELECT tb01_cod_user FROM tb01_user WHERE tb01_email = :e");
            $cmd -> bindValue(":e", $email);
            $cmd -> execute();

            if ($cmd -> rowCount() > 0) { // Email já existe
                return false;
            } else { // Email não existe
                $cmd = $this -> pdo -> prepare("INSERT INTO tb01_user(tb01_nome, tb01_email, tb01_senha) VALUES (:n, :e, :s)");
                $cmd -> bindValue(":n", $nome);
                $cmd -> bindValue(":e", $email);
                $cmd -> bindValue(":s", $senha); 
                $cmd -> execute();
                return true;
            }
        }

        public function mensagens($mensagem) {
            echo "<script>alert('$mensagem')</script>";
        }    

        public function excluirPessoa($cod) {
            $cmd = $this -> pdo -> prepare("DELETE FROM tb01_user WHERE tb01_cod_user = :cod");
            $cmd -> bindValue(":cod", $cod);
            $cmd -> execute();
        }


        // Buscar dados de uma pessoa
        public function buscarDadosPessoa($cod) {
            $res = array();
            $cmd = $this -> pdo -> prepare("SELECT * FROM tb01_user WHERE tb01_cod_user = :cod");
            $cmd -> bindValue(":cod", $cod);
            $cmd -> execute();
            $res = $cmd -> fetch(PDO::FETCH_ASSOC);
            return $res;
        }

        // Atualizar dados no banco de dados
        public function atualizarDados($cod, $nome, $email, $senha) {
            $cmd = $this -> pdo -> prepare("UPDATE tb01_user SET tb01_nome = :n, tb01_email = :e, tb01_senha = :s WHERE tb01_cod_user = :cod");
            $cmd -> bindValue(":n", $nome);
            $cmd -> bindValue(":e", $email);
            $cmd -> bindValue(":s", $senha);
            $cmd -> bindValue(":cod", $cod);
            $cmd -> execute();
            return true;
        }
    
    }
?>