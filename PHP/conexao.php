<?php 


    // Conexão
    try {
        $pdo = new PDO("mysql: host=localhost; dbname=2dsa_nathan_matheusj_login", "root", "");
        // dbname host usuario e senha
    } catch (PDOException $e) {
        echo "Erro com Banco de Dados: " . $e -> getMessage();
    } catch (Exception $e) {
        echo "Erro generico: " . $e -> getMessage();
    }
    

    // Inserção de Dados

     /*
     $res = $pdo -> prepare("INSERT INTO tb01_user(tb01_nome, tb01_email, tb01_senha) VALUES (:n, :e, :s)");

    $res -> bindValue(":n", "Matheus");
    $res -> bindValue(":e", "teste@gmail.com");
    $res -> bindValue(":s", "00000000");

    $res -> execute();

    */

    /*
    $nome = "Matheus";
    $res -> bindParam(":n", $nome);

    */

    /*
     $pdo -> query("INSERT INTO tb01_user(tb01_nome, tb01_email, tb01_senha) VALUES ('Nathan', '11111111', 'teste2@gmail.com')");
    */


    // Delete

    /*
    $cmd = $pdo -> prepare("DELETE FROM tb01_user WHERE tb01_cod_user = :cod");
    $cod = 2;
    $cmd -> bindValue(":cod", $cod);
    $cmd -> execute();
    */ 

    // $res = $pdo -> query("DELETE FROM tb01_user WHERE tb01_cod_user = 5");

    /*
    $cmd = $pdo -> prepare("UPDATE tb01_user SET tb01_email = :e WHERE tb01_cod_user = :cod");
    $cmd -> bindValue(":e", "matheus014x@gmail.com");
    $cmd -> bindValue(":cod", "1");
    $cmd -> execute();
    */

    /*
    $res = $pdo -> query("UPDATE tb01_user SET tb01_email = 'nathanzin@gmail.com' WHERE tb01_cod_user = '6'");
    */

    /*
    $res = $pdo -> query("UPDATE tb01_user SET tb01_senha = 'nathan2009' WHERE tb01_cod_user = '6'");
    */


    // Select

    $cmd = $pdo -> prepare("SELECT * FROM tb01_user WHERE tb01_cod_user = :cod");
    $cmd -> bindValue(":cod", 6);
    $cmd -> execute();

    $resultado = $cmd -> fetch(PDO::FETCH_ASSOC);

    /*
    echo "<pre>";
    print_r($resultado);
    echo "</pre>";
    echo "<br>" . $resultado['tb01_nome'];
    */

    foreach ($resultado as $key => $value) {
        echo $key.": ".$value."<br>";
    }

?>