<style>
    body{
        background-color: #41644a;
    }
    label{
        color: #f2e3db;
    }
    th, td {
    text-align: center;
    padding: 1.5rem;
    
    }
    .table-one{
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 100%;
    }
    .text-center{
    text-align: center;
    }
    .leandro {
    display: flex;
    align-items: center;
    justify-content: space-around;
    flex-direction: column;
    height: 90vh;
    }
    legend{
    border: 1px solid #f2e3db;
    padding: 5px;
    text-align: center;
    background-color: #f2e3db;
    border-radius: 8px;
    }
    fieldset{
    border: 3px solid #f2e3db;
    border-radius: 8px;
    background-color: #263a29;
    padding: 40px;
    width: 500px;
    }
    table{
    color: #f2e3db;
    }
    </style>

<?php
include_once('../conexão/conexao.php');
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM PERGUNTAS WHERE idperguntas = $id";
    $result = $conexao->query($sqlSelect);
    if($result->num_rows > 0){
        while($user_data = mysqli_fetch_assoc($result)){
            $id = $user_data['idperguntas'];
            $pergunta = $user_data['pergunta'];
            $pergunta1 = $user_data['opcao_a'];
            $pergunta2 = $user_data['opcao_b'];
            $pergunta3 = $user_data['opcao_c'];
            $pergunta4 = $user_data['opcao_d'];
        }
    }else {
        header('location: ../perguntas.php');
    }
}else {
    header('location: ../perguntas.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salas</title>
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/salas.css">
</head>
<body>
<div class="salas">
        <nav> 
           
          
            <form method="POST" action="upgrade.php" class="table-one">
            <fieldset>
            <legend>Salas</legend>
                <input type="hidden" name="operacao" value="update">
                <input type="hidden" name="idpergunta" value="<?php echo $id ?>">

                <div class="pergunta-tema">
                <label for="tema">Pergunta:</label>
                <textarea name="pergunta" id="name sala" rows="10" cols="30"><?php echo $pergunta ?></textarea>
                <br>
                <label for="op1">Opção1</label>
                <textarea name="pergunta1" id="pergunta1" cols="30" rows="10"><?php echo $pergunta1 ?></textarea>
                <br>
                <label for="op2">Opção2</label>
                <textarea name="pergunta2" id="pergunta2" cols="30" rows="10"><?php echo $pergunta2 ?></textarea>
                <br>
                <label for="op3">Opção3</label>
                <textarea name="pergunta3" id="pergunta3" cols="30" rows="10"><?php echo $pergunta3 ?></textarea>
                <br>
                <label for="op4">Opção4</label>
                <textarea name="pergunta4" id="pergunta4" cols="30" rows="10"><?php echo $pergunta4 ?></textarea>
                <br>
                </select>
                <br>
                </div>
                <input type="submit" value="guardar Pergunta">
                <button>
                <a href="../perguntas.php">Voltar</a> 
                </button>
            </fieldset>
            </form>
        </nav>
    </div>
</body>
</html>
