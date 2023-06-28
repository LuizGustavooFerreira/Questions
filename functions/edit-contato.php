<?php
include_once('../conexão/conexao.php');
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM contato WHERE idcontato = $id";
    $result = $conexao->query($sqlSelect);
    if($result->num_rows > 0){
        while($user_data = mysqli_fetch_assoc($result)){
            $id = $user_data['idcontato'];
            $nome = $user_data['nome'];
            $idade = $user_data['idade'];
            $cidade = $user_data['cidade'];
            $mensagem = $user_data['mensagem'];
        }
    }else {
        header('location: ../contato.php');
    }
}else {
    header('location: ../perguntas.php');
}

?>
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
                    <input type="submit" value="Enviar">
                    <button >
                        <a href="./functions/contato_ver.php">ver</a>
                    </button>
                </form>
            </fieldset>
        </nav>
    </div> 