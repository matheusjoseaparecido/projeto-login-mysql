<?php 
    require_once 'PHP/Pessoa.php';
    $p = new Pessoa("localhost", "2dsa_nathan_matheusj_login", "root", "");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <section id="direita">
        <table>
            <tr id="titulo">
                <td>NOME</td>
                <td>EMAIL</td>
                <td colspan="2">SENHA</td>
            </tr>
        <?php 
            $dados = $p -> buscarDados();
            if (count($dados) > 0) { // Tem pessoas cadastradas
                for ($i=0; $i < count($dados); $i++) { 
                    foreach ($dados[$i] as $k => $v) {
                        if ($k != "tb01_cod_user") {
                            echo "<td>" . $v . "</td>";
                        }
                    }
                    ?>
                    <td>
                        <a href= "login.php?cod_up=<?php echo $dados[$i]['tb01_cod_user'];?>">Editar</a>
                        <a href = "index.php?cod=<?php echo $dados[$i]['tb01_cod_user'] ?>">Excluir</a></td>
                    <?php
                    echo "<tr>";
                }
            ?>
            <?php
            } else { // Banco Vazio
                echo "Ainda não há pessoas cadastradas";
            }
        ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </section>
    <a href="login.php">Return</a>
</body>
</html>


<?php 

    if (isset($_GET['cod'])) {
        $cod_pessoa = addslashes($_GET['cod']);
        $p -> excluirPessoa($cod_pessoa);
        header("location: index.php");
    }

?>