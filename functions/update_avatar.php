<?php
include_once ('../conexão/conexao.php');

if(isset ($_POST['operacao'])){
    $id = $_POST['idPessoa'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];
    $senha = $_POST['password'];


    $sqlInsertt = "UPDATE pessoa set nome='$name', email='$email', idade='$idade', `password`='$senha' where idPessoa = $id";
    $result = $conexao->query($sqlInsertt);
    if($result){
        header('Location: ../avatar.php');
    }
}
?>