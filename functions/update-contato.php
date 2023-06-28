<?php

include_once ('../conexão/conexao.php');

if(isset ($_POST['operacao'])){

    $id = $user_data['idcontato'];
    $nome = $user_data['nome'];
    $idade = $user_data['idade'];
    $cidade = $user_data['cidade'];
    $mensagem = $user_data['mensagem'];

    $sqlInsert = "UPDATE perguntas SET pergunta='$pergunta', opcao_a='$pergunta1', opcao_b='$pergunta2', opcao_c='$pergunta3', opcao_d='$pergunta4', correta='$alternativacorreta' WHERE idperguntas = $id";
    $result = $conexao->query($sqlInsert);
    print_r('Location: ../pergunta.php');
    }
    header('Location: ../perguntas.php');
?>