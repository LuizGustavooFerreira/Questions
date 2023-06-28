<?php
include './conexão/conexao.php';

function getRanking($conexao)
{
    $sql = "SELECT estatisticas.Pessoa_idPessoa, estatisticas.score, Pessoa.nome, tema.nome as tema FROM estatisticas JOIN Pessoa ON estatisticas.Pessoa_idPessoa = Pessoa.idPessoa 
    JOIN tema ON tema.idTema = estatisticas.tema_idtema 
    ORDER BY estatisticas.score DESC, tema.nome";
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado === false) {
        echo "Erro na consulta: " . mysqli_error($conexao);
        return array();
    }
    $ranking = array();
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $ranking[] = $linha;
    }
    return $ranking;
}

session_start();
if (!$_SESSION['usuarioLogado']) {
    header("Location:login.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <link rel="stylesheet" href="css/css.css">  
    <link rel="stylesheet" href="css/ranking.css">  
</head>

<body>
    <div class="conteiner">
        <img class="logo" src="image/chapeu.png" alt="">
        <div class="menu">
            <nav>
                <ul>
                    <li style="--clr:#23238E">
                        <a href="index.php" data-text="&nbsp;Menu">&nbsp;Menu&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="jogo.php" data-text="&nbsp;Jogo">&nbsp;Jogo&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="creditos.php" data-text="&nbsp;Creditos">&nbsp;Creditos&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="perguntas.php" data-text="&nbsp;perguntas">&nbsp;perguntas&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="Contato.php" data-text="&nbsp;Contato">&nbsp;Contato&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="salas.php" data-text="&nbsp;Salas">&nbsp;Salas&nbsp;</a>
                    </li>
                    <li style="--clr:#23238E">
                        <a href="Avatar.php" data-text="&nbsp;Avatar">&nbsp;Avatar&nbsp;</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <nav>
        <div>
            <form action="ranking.php" method="POST" class="forms">
                <input type="hidden" name="operacao">
                    <?php
                    echo '<div class="table-one">';
                    echo '<fieldset>';
                    echo '<legend class="text-center">Ranking</legend>';
                    echo '<table>';  
                    echo "<thead><tr><th>Tema</th><th>Colocação</th><th>Nome</th><th>Score</th></th></thead>";
                    echo '</fieldset>';
                    echo '<tbody>'; 
                    $ranking = getRanking($conexao);
                    foreach ($ranking as $posicao => $jogador) {
                        $nome = $jogador['nome'];
                        $score = $jogador['score'];
                        $tema = $jogador['tema'];
                        $colocacao = $posicao +1;

                        echo "<tr><td>" . $tema. "</td><td>" . $colocacao . "</td><td>" . $nome. "</td><td>" . $score . "</td></tr>";
                    }
                    ?>
                    </table>
                </fieldset>
            </form>
        </div>
    </nav>
</body>

</html>