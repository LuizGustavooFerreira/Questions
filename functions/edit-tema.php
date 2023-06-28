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
    $sqlSelect = "SELECT * FROM TEMA WHERE idtema= $id";
    $result = $conexao->query($sqlSelect);
    if($result->num_rows > 0){
        while($user_data = mysqli_fetch_assoc($result)){
            $id = $user_data['idtema'];
            $tema = $user_data['nome'];
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
            <form method="POST" action="upgrade_tema.php" class="form-tema">
                <input type="hidden" name="operacao" value="update">
                <input type="hidden" name="idtema" value="<?php echo $id ?>">
                <fieldset>
                <legend>Salas</legend>

                <div class="tema">
                    <nav>
                        <label>Tema</label>
                        <input type="text" name="tema" id="tema" value="<?php echo $tema ?>">
                        </div>
                    </nav>
                </div>
                <input type="submit" value="guardar Pergunta">
                <a href="../perguntas.php">Voltar</a>
                </fieldset>
            </form>
        </nav>
    </div>
</body>
</html>
