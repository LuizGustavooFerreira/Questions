<?php

if(!empty($_GET['id'])){
    include_once('../conexão/conexao.php');

    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM PERGUNTAS WHERE IDPERGUNTAS=$id";
    $result = $conexao->query($sqlSelect);
    if($result->num_rows > 0){
        $sqlDelete = "DELETE FROM PERGUNTAS WHERE IDPERGUNTAS=$id";
        $resultDelete = $conexao->query($sqlDelete);
    }
}
header('location: ../perguntas.php');
?>