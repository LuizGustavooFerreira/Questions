<?php

include_once ('../conexão/conexao.php');

if(isset ($_POST['operacao'])){

    $id = $_POST['idtema'];
    $tema = $_POST['tema'];

    $sqlInsert = "UPDATE tema SET nome='$tema' WHERE IDTEMA = $id";
    $result = $conexao->query($sqlInsert);
    print_r('Location: ../pergunta.php');
    }
    header('Location: ../perguntas.php');
?>