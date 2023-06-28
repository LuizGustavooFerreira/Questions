<?php

function obterTodosTemas(){
    include("conexao.php");
    $query = "SELECT * FROM tema";
    $result = mysqli_query($conexao, $query);
    return $result;
}
    ?>

    