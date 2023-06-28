<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>
    <div class="conteiner">
        <img class="logo" src="image/chapeu.png" alt="">
        <div class menu>
            <nav>
                <ul>
                    <li style="--clr:#23238E">
                        <a href="index.php" data-text="&nbsp;Menu">&nbsp;Menu&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="jogo.php" data-text="&nbsp;Jogo">&nbsp;Jogo&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="Ranking.php" data-text="&nbsp;Ranking">&nbsp;Ranking&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="creditos.php" data-text="&nbsp;Creditos">&nbsp;Creditos&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="login.php" data-text="&nbsp;Login">&nbsp;Login&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="perguntas.php" data-text="&nbsp;perguntas">&nbsp;perguntas&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="Contato.php" data-text="&nbsp;Contato">&nbsp;Contato&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="salas.php" data-text="&nbsp;Salas">&nbsp;Salas&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="Avatar.php" data-text="&nbsp;Avatar">&nbsp;Avatar&nbsp;</a>
                    </li>
                </ul>
            </nav>
        </div>
        </div>
            <nav class="forms"> 
                <form id="form" action="cadastro.php" method="POST">
                    <input type="hidden" value="cadastro" name="operacao">
                    <fieldset>
                        <legend><b>cadastre-se</b></legend>
                        <h2 class="paragrafo"><b>Cadastre seu usuario ao lado!</b></h2>
                        <div class="lele">
                        <label for="name">Nome:</label>
                        <input type="text" id="name" name="nome">
                        </div>
                        <div class="lele">
                        <label for="email">Email:</label>
                        <input type="email" id="email"  name="email">
                        </div>
                        <div class="lele">
                        <label for="anos">Idade:</label>
                        <input type="number" id="idade"  name="idade">
                        </div>
                        <div class="lele">
                        <label for="senha">Senha:</label>
                        <input type="password" id="senha"  name="password">
                        </div>
                        <div class="cadastro">
                        <input type="submit" value="Cadastrar" class="btn">
                        </div>
                    </fieldset>
            </form>
           
        </nav>
    
</body>
</html>

<?php

include './conexão/conexao.php';

if(!empty($_POST)){
    $operacao = $_POST['operacao'];

    if($operacao == 'cadastro'){
        if((!empty($_POST['nome'])) && (!empty($_POST['email'])) && (!empty($_POST['idade']))  && (!empty($_POST['password']))){
            $name = $_POST['nome'];
            $email = $_POST['email'];
            $anos = $_POST['idade'];
            $senha = $_POST['password'];
            $sql = "INSERT INTO PESSOA VALUES('', '$name', '$email', '$anos', '$senha');";
                if(mysqli_query($conexao, $sql)){
                    $mensagem = '<p class="text-center">cadastrado!</p>';
                }else {
                    $mensagem =  '<p>Erroao cadastrar no banco de dados.</p>';
                }
            }else {
                $mensagem =  '<p class="text-center">Favor preencher todos os campos.</p>';
            }
        }
        echo $mensagem;
    }
    



?>

