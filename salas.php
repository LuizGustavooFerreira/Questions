<?php 
    session_start();
    if (!$_SESSION['usuarioLogado']) {
        header("Location:login.php");
}

include './conexão/conexao.php';

if(!empty($_POST)) {
    $operacao = $_POST['operacao'];

    if($operacao=='incluir'){

        if((!empty($_POST['pergunta'])) && (!empty($_POST['pergunta1'])) && (!empty($_POST['pergunta2'])) && (!empty($_POST['pergunta3'])) && (!empty($_POST['pergunta4'])) && (!empty($_POST['alternativacorreta'])) && (!empty($_POST['tema']))){
            $tema = $_POST['tema'];
            $pergunta = $_POST['pergunta'];
            $pergunta1 = $_POST['pergunta1'];
            $pergunta2 = $_POST['pergunta2'];
            $pergunta3 = $_POST['pergunta3'];
            $pergunta4 = $_POST['pergunta4'];
            $alternativacorreta = $_POST['alternativacorreta'];
            $sql = "INSERT INTO PERGUNTAS VALUES('', '$pergunta', '$pergunta1', '$pergunta2', '$pergunta3', '$pergunta4', '$alternativacorreta', '$tema');";
                if(mysqli_query($conexao, $sql)){
                    $mensagem =  '<p class="text-center">Perguntas cadastrado!</p>';
                }else {
                    $mensagem =  '<p>Erro ao Pergunta no banco de dados.</p>';
                }
            }else {
                $mensagem =  '<p class="text-center">Favor preencher todos os campos.</p>';
            }
    } else if ($operacao =='colocar') {
        if ((!empty($_POST['tema']))){
            $tema = $_POST['tema'];
            $pessoa = $_SESSION['usuarioLogado']['idPessoa'];
            $sql = "INSERT INTO TEMA values('', '$tema', '$pessoa')";
            if(mysqli_query($conexao, $sql)){
                $mensagem =  '<p class="text-center">Tema cadastrado!</p>';
            }else {
                $mensagem =  '<p class="text-center">Tema não efetuado.<br/>Favor preencher todos os campos.</p>';
            }
        }
    }
}
?>

<?php
include './conexão/conexao.php';


?>
    
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/salas.css">
    <title>Salas</title>
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/salas.css">
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
                        <a href="Avatar.php" data-text="&nbsp;Avatar">&nbsp;Avatar&nbsp;</a>
                    </li>
                </ul>
            </nav>
        </div>
        </div>
        <div class="tema">
            <nav>
                <form method="POST" action="salas.php" class="definir-salas">
                    <input class="label-input" type="hidden" name="operacao" value="colocar">
                    <fieldset>
                        <legend><b>Criar Temas</b></legend>
                        <label class="label-input"><b>Temas</b></label>
                        <input type="text" name="tema" id="tema">
                        <div class="bota-incluir-tema">
                        <button>
                        <input class="botao" type="submit" value="incluir">
                        </button>
                        <br>
                        <br>
                        <p class="text"><b>Cadastre primeramen  te os temas e selecione-os no campo ao criar as salas</b></p>
                        <br>
                        <br>
                        </fieldset>
                    </div>
                </form>
            </nav>
        </div>
        <div class="salas">
        <nav> 
            <form method="POST" action="salas.php" class="form-pergunta">
                <input class="label-input" type="hidden" name="operacao" value="incluir">
                <fieldset>
                    <legend><b>Criar salas</b></legend>
                    <div class="pergunta-tema">
                        <label for="tema" class="label-input"><b>Pergunta:</b></label>
                        <input  name="pergunta" id="name sala" rows="10" cols="30"></input>
                        <label for="op1" class="label-input"><b>opção1</b></label>
                        <input name="pergunta1" id="pergunta1" cols="30" rows="10"></input>
                        <br>
                        <label for="op2" class="label-input"><b>opção2</b></label>
                        <input name="pergunta2" id="pergunta2" cols="30" rows="10"></input>
                        <label for="op3" class="label-input"><b>opção3</b></label>
                        <input name="pergunta3" id="pergunta3" cols="30" rows="10"></input>
                        <br>
                        <label for="op4" class="label-input"><b>opção4</b></label>
                        <input name="pergunta4" id="pergunta4" cols="30" rows="10"></input>
                        <label for="correta" class="label-input"><b>Alternativa Correta</b></label>
                        <select name="alternativacorreta" id="correta" class="select">
                            <option value="A"><b>A</b></option>
                            <option value="B"><b>B</b></option>
                            <option value="C"><b>C</b></option>
                            <option value="D"><b>D</b></option>
                        </select>
                        <label for="tema" class="label-input"><b>Selecione um tema</b></label>
                        <select name="tema" id="tema">
                            <?php
                                 include './conexão/conexao.php';
                                 $query = $conexao->query("SELECT * FROM tema");
                                 while($reg = $query->fetch_array()) {
                                   echo "<option value=".$reg["idtema"]."\">". $reg['nome'] ."</option>";
                                 }
                            ?>
                        <option value="">Selecione um tema</option>
                        </select>
                       
                        <button>    
                        <input class="botao" type="submit" value="guardar Pergunta">
                        </button>
                    </div>
                </fieldset>
            </form>

            <?php if(isset($mensagem)) {
                echo $mensagem;
             } ?>
        </nav>
    </div>
</body>
</html>
