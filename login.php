<?php 

    require_once 'PHP/Pessoa.php';
    $p = new Pessoa("localhost", "2dsa_nathan_matheusj_login", "root", "");

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Images/iconLogin.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="CSS/login.css">
    <title>Projeto Login</title>
</head>
<body>

<?php 

    if (isset($_POST['nome'])) { // Clicou no botão Cadastrar ou Editar

        // ------------------------Editar----------------------
        if (isset($_GET['cod_up']) && !empty($_GET['cod_up'])) {
            $cod_update = addslashes($_GET['cod_up']);
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            if (!empty($nome) && !empty($email) && !empty($senha)) {
            // Atualizar
            $p -> atualizarDados($cod_update, $nome,  $email, $senha);  
            header("Refresh:0; url=index.php");
        } else {
                // echo "Preencha todos os campos!";
                $p -> mensagens("Preencha todos os campos!");
            }
        } else { // --------------Cadastrar------------------
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            if (!empty($nome) && !empty($email) && !empty($senha)) {
            // Cadastrar
            if(!$p -> cadastrarPessoa($nome, $email, $senha)) {
                // echo "Email já existente";
                // echo "<script>alert('Email já existente')</script>";
                $p -> mensagens("Email já existente");
            } else {
                header("Refresh:0; url=index.php");
            }
            } else {
            // echo "Preencha todos os campos!";
            $p -> mensagens("Preencha todos os campos!");
            }
        }    
    }

?>

<?php 

    if (isset($_GET['cod_up'])) { // Se a pessoa cliclou em editar
        $cod_update = addslashes($_GET['cod_up']);
        $res = $p -> buscarDadosPessoa($cod_update);
    }

?>


<!--Forms-->

    <div class="container">
        <div class="signin-signup">
            <form action="index.php" method="post" class="sign-in-form">
                <h2 class="title">
                    Entrar
                </h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Nome de Usuário" id="user" name="user">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Senha" id="senha" name="senha">
                </div>
                <input type="button" value="Login" class="btn">
                <p class="social-text">
                    Ou entre com suas redes sociais
                </p>
                <div class="social-media">
                    <a href="#" class="social-icon" id="icon-facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="social-icon" id="icon-instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-icon" id="icon-twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon" id="icon-google">
                        <i class="fab fa-google"></i>
                    </a>
                </div>
                <p class="account-text">
                    Não possui conta? <a href="#" id="sign-up-btn2">Cadastre-se</a>
                </p>
            </form>
            <form method="post" class="sign-up-form">
                <h2 class="title">
                    Cadastre-se
                </h2>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" name="email" value="<?php if (isset($res)) {echo $res['tb01_email'];} ?>">
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Nome de Usuário" name="nome" value="<?php if (isset($res)) {echo $res['tb01_nome'];}?>">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Senha" name="senha" value="<?php if (isset($res)) {echo $res['tb01_senha'];} ?>">
                </div>
                <input type="submit" class="btn" id="button-register" value="<?php if (isset($res)) {echo 'atualizar';} else {echo 'Cadastrar';} ?>">
                <p class="social-text">
                    Ou cadastre-se com suas redes sociais
                </p>
                <div class="social-media">
                    <a href="#" class="social-icon" id="icon-facebook2">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="social-icon" id="icon-instagram2">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-icon" id="icon-twitter2">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon" id="icon-google2">
                        <i class="fab fa-google"></i>
                    </a>
                </div>
                <p class="account-text">
                    Já possui conta? <a href="#" id="sign-in-btn2">Entrar</a>
                </p>
            </form>
        </div>

<!--Fim Forms-->

<!--Panels-->

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>
                        Já possui conta?
                    </h3>
                    <p>
                        Para se conectar faça login com suas informações pessoais
                    </p>
                    <button class="btn" id="sign-in-btn">Login</button>
                </div>
                <img src="Images/sign-in.svg" alt="" class="image">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>
                        Não possui conta?
                    </h3>
                    <p>
                        Insira seus dados pessoais e comece sua jornada conosco
                    </p>
                    <button class="btn" id="sign-up-btn">Cadastrar</button>
                </div>
                <img src="Images/sign-up.svg" alt="" class="image">
            </div>
        </div>
    </div>

<!--Fim Panels-->

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="JS/login.js"></script>

</body>
</html>