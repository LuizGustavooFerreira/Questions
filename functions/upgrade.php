<?php

include_once ('../conexão/conexao.php');

if(isset ($_POST['operacao'])){

    $id = $_POST['idpergunta'];
    $pergunta = $_POST['pergunta'];
    $pergunta1 = $_POST['pergunta1'];
    $pergunta2 = $_POST['pergunta2'];
    $pergunta3 = $_POST['pergunta3'];
    $pergunta4 = $_POST['pergunta4'];
    $alternativacorreta = $_POST['alternativacorreta'];

    $sqlInsert = "UPDATE perguntas SET pergunta='$pergunta', opcao_a='$pergunta1', opcao_b='$pergunta2', opcao_c='$pergunta3', opcao_d='$pergunta4', correta='$alternativacorreta' WHERE idperguntas = $id";
    $result = $conexao->query($sqlInsert);
    print_r('Location: ../pergunta.php');
    }
    header('Location: ../perguntas.php');
?>