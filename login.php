<?php
    require_once 'CLASSES/usuarios.php';
    $u = new Usuario;
?>


<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <title>Projeto Login</title>
    <link rel="stylesheet" href="CSS/style.css"/>
</head>
<body>
    <div id="form">
        <h1>Login</h1>
        <form method="POST">
            <input type="email" name="email" placeholder="E-Mail"></input>
            <input type="password" name="senha" placeholder="Senha"></input>
            <input type="submit" value="Logar"></input>
            <a href="cadastrar.php">Ainda não possui uma conta? <strong>Cadastre-se</stronge></a>
        </form>
    </div>
    <?php
        if(isset($_POST['email'])){
            $email = addslashes($_POST["email"]);
            $senha = addslashes($_POST["senha"]);
            if(!empty($email) && !empty($senha)){
                $u->conectar("projeto_login", "localhost", "root", "");
                if($u->msgErro == ""){
                    if($u->logar($email, $senha)){
                        header("location: private.php");
                    } else{
                        ?>
                        <div class="msgerro">
                            E-mail e/ou senha estão incorretos!
                        </div>
                        <?php
                    }
                }else{
                    ?>
                    <div class="msgerro">
                        <?php echo "Erro: ".$u->msgErro;?>
                    </div>
                    <?php
                }
            }else{
                ?>
                <div class="msgerro">
                Preencha todos os campos!
                </div>
                <?php
            }
        }
    ?>
</body>
</html>