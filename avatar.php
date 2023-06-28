<?php 
    session_start();
    if (!$_SESSION['usuarioLogado']) {
        header("Location:login.php");
}
?>

<?php
include './conexão/conexao.php';
    $id = $_SESSION['usuarioLogado']['idPessoa'];
    $sqlSelecion = "SELECT * from pessoa where idPessoa = $id";
    $result = $conexao->query($sqlSelecion);
    if($result->num_rows > 0){
        while($pessoauser = mysqli_fetch_assoc($result)){
            $id = $pessoauser['idPessoa'];
            $name = $pessoauser['nome'];
            $email = $pessoauser['email'];
            $idade = $pessoauser['idade'];
            $senha = $pessoauser['password'];
        }
    }else {
        header('Location: ./avatar.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avatar</title>
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/avatar.css">
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
                        <a href="perguntas.php" data-text="&nbsp;perguntas">&nbsp;perguntas&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="Contato.php" data-text="&nbsp;Contato">&nbsp;Contato&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="salas.php" data-text="&nbsp;Salas">&nbsp;Salas&nbsp;</a>
                    </li>
                    <?php
                    echo '<button class="deslogar">
                            <a href="deslogar.php">deslogar</a>
                        </button>'
                        ?>
                </ul>
            </nav>
        </div>
    </div>
    <nav class="forms"> 
        <div class="form-ava">
            <fieldset>
                <legend>Avatar</legend>
                <form id="form" method="POST" action="./functions/update_avatar.php">
                    <input type="hidden" value="alterar" name="operacao">
                    <input type="hidden" value="<?= $id ?>" name="idPessoa">

                    <div class="imguser">
                        <img src="./image/istockphoto-474001892-612x612.jpg" alt="">
                    </div>

                    <div class="inputs">
                        <div class="lele">
                            <label for="name">Nome:</label>
                            <input type="text" id="name" name="name" value="<?= $name ?>">
                        </div>
                        <div class="lele">
                            <label for="email">Email</label>
                            <input type="text" name="email" value="<?= $email ?>">
                        </div>
                        <div class="lele">
                            <label for="idade">Idade</label>
                            <input type="text" name="idade" value="<?= $idade ?>">
                        </div>
                        <div class="lele">
                            <label for="password">Password</label>
                            <input type="text" name="password" value="<?= $senha ?>">
                        </div>
                        <input type="submit" value="alterar" class="but">
                    </div>
            </fieldset>
            </div>
        </form>
    </nav>
</body>
</html>
