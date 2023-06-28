<?php
    session_start();
    if (!$_SESSION['usuarioLogado']) {
        header("Location:login.php");
}
function getNomeTema($conexao, $idTema) {
    $sql = "SELECT nome FROM TEMA WHERE idtema = $idTema";
    $resultado = mysqli_query($conexao, $sql);
    $tema = mysqli_fetch_assoc($resultado);
    return $tema['nome'];
}

if (!empty($_POST)) {
    $correta = $_POST['correta'];
    $usuario = $_POST['selecao_usuario'];
    if ($correta == $usuario) {
        $_SESSION['pontuacao']++;
    } else {
        $_SESSION['pontuacao']--;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css.css">
    <title>Quiz</title>
</head>
<body>
<?php

include './conexão/conexao.php';

if (!empty($_GET['idtema'])) {
    $tema = $_GET['idtema'];
    $nome = "tema".$tema;
    
    if (!empty($_GET['unset']) AND $_GET['unset'] === "true") {
        $_SESSION[$nome]['perguntas_respondidas'] = array();
        $_SESSION['pontuacao'] = 0;
    }
    
    // Verifica se a sessão de perguntas respondidas existe para o tema atual
    if (!isset($_SESSION[$nome]['perguntas_respondidas'])) {
        $_SESSION[$nome]['perguntas_respondidas'] = array(); // Inicializa o array de perguntas respondidas
    }
    $sqlPerguntas = "SELECT COUNT(*) FROM PERGUNTAS WHERE tema_idtema = $tema";
    $resultadoPerguntas = mysqli_query($conexao, $sqlPerguntas);
    $totalPerguntas = mysqli_fetch_row($resultadoPerguntas)[0];

    $sql = "SELECT * FROM PERGUNTAS WHERE tema_idtema = $tema ORDER BY Rand()";
    $selecao = mysqli_query($conexao, $sql);

    // Obtém a próxima pergunta não respondida
    while ($vetor = mysqli_fetch_row($selecao)) {
        if (!in_array($vetor[1], $_SESSION[$nome]['perguntas_respondidas'])) {
            $_SESSION[$nome]['perguntas_respondidas'][] = $vetor[1]; // Adiciona a pergunta ao array de perguntas respondidas
            break;
        }
    }

    if (!isset($vetor)) { ?>
        <p>Todas as perguntas já foram respondidas.</p>
        <?php
        echo "Sua ponntuação foi $_SESSION[pontuacao]"; echo '<br>';
        $nomeTema = getNomeTema($conexao, $tema);
        echo "O tema foi $nomeTema"; echo '<br>';
        echo "O total de perguntas foi $totalPerguntas"; echo "<br>";
        echo '<a href="jogo.php">Voltar</a>';
        ?>
        <?php
        $idtema = $_GET['idtema'];
        $usuario = $_SESSION['usuarioLogado']['idPessoa'];
        $score = $_SESSION['pontuacao'];
        $sql = "SELECT * FROM estatisticas WHERE Pessoa_idPessoa = $usuario AND tema_idtema = $idtema";
        $tabela = mysqli_num_rows(mysqli_query($conexao, $sql));
        if(($tabela > 0)){
            $sql = "UPDATE estatisticas SET score = $score WHERE Pessoa_idPessoa = $usuario AND tema_idtema = $idtema";

        }else {
            $sql = "INSERT INTO estatisticas values ('', '$idtema', '$score', '$usuario')";
        }
        mysqli_query($conexao, $sql);

        ?>
    <?php    return;
    }
   

    // Resto do seu código para exibir a pergunta e processar a resposta
    ?>
    <h1><?= $vetor[1] ?></h1>

    <p>A) <?= $vetor[2] ?></p>
    <p>B) <?= $vetor[3] ?></p>
    <p>C) <?= $vetor[4] ?></p>
    <p>D) <?= $vetor[5] ?></p>

    <form action="jogo2.php?idtema=<?= $tema ?>" method="POST">
        <input type="hidden" name="correta" value="<?= $vetor[6] ?>">
        <select name="selecao_usuario" id="correta">
            <option value="A"><b>A</b></option>
            <option value="B"><b>B</b></option>
            <option value="C"><b>C</b></option>
            <option value="D"><b>D</b></option>
        </select>
        <input type="submit" name="val_resposta" value="enviar">
    </form>
    </body>
    </html>
<?php
}