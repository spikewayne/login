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
    <div id="form-cad">
        <h1>Cadastro</h1>
        <form method="POST">
            <input type="text" name="usuario" placeholder="Insira o Usuário" maxlength="30"></input>
            <input type="email" name="email" placeholder="Insira o E-mail" maxlength="40"></input>
            <input type="password" name="senha" placeholder="Insira a Senha" maxlength="15"></input>
            <input type="password" name="confisenha" placeholder="Confirme a Senha" maxlength="15"></input>
            <input type="submit" value="Cadastrar"></input>
            <a href="login.php">Já possui uma conta? <strong>Logue-se</stronge></a>
        </form>
    </div>
    <?php
        if(isset($_POST['usuario'])){
            $nome = addslashes($_POST["usuario"]);
            $email = addslashes($_POST["email"]);
            $senha = addslashes($_POST["senha"]);
            $confisenha = addslashes($_POST["confisenha"]);
            if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confisenha)){
                $u->conectar("projeto_login", "localhost", "root", "");
                if($u->msgErro == ""){
                    if($senha == $confisenha){
                        if($u->cadastrar($nome, $email, $senha)){
                            ?>
                            <div id="msgsu">
                                Cadastrado com sucesso!
                            <div>
                            <?php
                        } else{
                            ?>
                            <div class="msgerro">
                                E-mail ja cadastrado!
                            </div>
                            <?php

                        }
                    } else{
                        ?>
                        <div class="msgerro">
                            Senha e confirmar senha não correspondem
                        </div>
                        <?php
                        
                    }
                } else{
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