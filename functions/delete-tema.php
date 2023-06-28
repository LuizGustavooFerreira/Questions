<?php

if(!empty($_GET['id'])){
    include_once('../conexão/conexao.php');

    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM TEMA WHERE IDTEMA =$id";
    $result = $conexao->query($sqlSelect);
    if($result->num_rows > 0){
        $sqlDelete = "DELETE FROM TEMA WHERE IDTEMA=$id";
        if ($conexao->query($sqlDelete)) echo $conexao->errno;
    }
}
header('location: ../perguntas.php');
?>