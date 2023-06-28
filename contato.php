<?php 
    session_start();
    if (!$_SESSION['usuarioLogado']) {
        header("Location:login.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/contato.css">
    <title>Contato</title>
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
                        <a href="salas.php" data-text="&nbsp;Salas">&nbsp;Salas&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="Avatar.php" data-text="&nbsp;Avatar">&nbsp;Avatar&nbsp;</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="cont">
        <nav class="forms"> 
            <fieldset>
            <legend>Contato</legend>
                <form method="POST" action="Contato.php" class="formulario">
                    <input type="hidden" value="espor" name="operacao">
                    <div class="lele">
                        <label for="name">Nome:</label>
                        <input type="text" id="name" name="name">
                    </div>
                    <div class="lele">
                        <label for="idade">Idade</label>
                        <input type="number" id="idade" name="idade">
                    </div>
                    <div  class="lele">
                        <label for="cidade">Cidade:</label>
                        <input type="text" id="cidade" name="cidade">
                    </div>
                    <div class="lele">
                        <label for="mensagem">Mensagem:</label>
                        <textarea name="mensagem" id="mensagem" name="mensagem" cols="30" rows="10"></textarea>
                    </div>
                    <div class="lele">
                    <input type="submit" value="Enviar" class="enviar">
                    </div>
                </form>
                <button class="ver">
                    <a href="./functions/contato_ver.php">ver</a>
                </button>
            </fieldset>
        </nav>
    </div> 
</body>
</html>


<?php
include './conexão/conexao.php';

if(!empty($_POST)) {
    $operacao = $_POST['operacao'];

    if($operacao=='espor'){

        if((!empty($_POST['name'])) && (!empty($_POST['idade'])) && (!empty($_POST['cidade'])) && (!empty($_POST['mensagem']))){
            $name = $_POST['name'];
            $idade = $_POST['idade'];
            $cidade = $_POST['cidade'];
            $mensagem = $_POST['mensagem'];
            $sql = "INSERT INTO contato VALUES('', '$name', '$idade', '$cidade', '$mensagem');";
                if(mysqli_query($conexao, $sql)){
                    $mensagem =  '<p class="text-center">Contato enviado!</p>';
                }else {
                    $mensagem =  '<p>Erro ao Pergunta no banco de dados.</p>';
                }
            }else {
                $mensagem =  '<p class="text-center">Favor preencher todos os campos.</p>';
            }
        }
    }
?>

<?php if(isset($mensagem)) {
    echo $mensagem;
} ?>
