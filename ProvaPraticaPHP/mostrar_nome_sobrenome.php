<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Telefonica SENAI Norte</title>
    <link rel="stylesheet" href="css/agenda.css" />
</head>

<body>
    <h1>
        <center>Pedro Henrique Soares Merenciano</center>
    </h1>
    <hr width="100%" align="center" color="blue" size="3">
    <h2>Agenda Telefonica em Ordem Alfabética:</h2>
    <table class="tabela" align="center" border="1">
        <tr>
            <th class="elemento1">Nome</th>
            <th class="elemento2">Sobrenome</th>
        </tr>

        <?php
require_once("conexao.php");

$conexao = conectadb();
if ($conexao->connect_errno) {
    die("Erro de conexão: " . $conexao->connect_error);
}

$conexao->set_charset("utf8");

$sql = "SELECT primeiro_nome, sobrenome FROM agenda_telefonica ORDER BY primeiro_nome ASC";
$result = $conexao->query($sql);

if (!$result) {
    die("Erro na consulta: " . $conexao->error);
}

if ($result->num_rows > 0) {
    while ($linha = $result->fetch_assoc()) {
        echo "Nome: " . $linha["primeiro_nome"] . " - Sobrenome: " . $linha["sobrenome"] . "<br>";
    }
} else {
    echo "Não há resultados.";
}

$conexao->close();
?>

    </table>

    <hr width="100%" align="center" size="3" color="blue">
    <div class="agenda1">
        <hr width="100%" align="center" size="3" color="blue">

        <div id="container">
            <table align="center">
                <tr>
                    <td>
                        <form method="POST" action="form.php">
                            <center align="right">
                                <input type="submit" value="Novo Cadastro">
                            </center>
                        </form>
                    </td>

                    <td>
                        <form method="POST" action="mostrar_nome.php">
                            <center align="left">
                                <input type="submit" value="Listar Nome">
                            </center>
                        </form>
                    </td>

                    <td>
                        <form method="POST" action="mostrar_nome_sobrenome.php">
                            <center align="left">
                                <input type="submit" value="Listar Nome e Sobrenome">
                            </center>
                        </form>
                    </td>

                    <td>
                        <form method="POST" action="listar_agenda_completa.php">
                            <center align="right">
                                <input type="submit" value="Listar Agenda Telefone">
                            </center>
                        </form>
                    </td>

                    <td>
                        <form method="POST" action="mostrar_nome.php">
                            <center align="left">
                                <input type="submit" value="Consultar Nome">
                            </center>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        
        <hr width="100%" align="center" size="3" color="blue">
        <div id="container">
            <table align="center">
                <tr>
                    <td>
                        <form method="POST" action="menu.php">
                            <center align="right">
                                <input type="submit" value="Home">
                            </center>
                        </form>
                    </td>

                    <td>
                        <form method="POST" action="alterar_contato.php">
                            <center align="right">
                                <input type="submit" value="Alterar Contato">
                            </center>
                        </form>
                    </td>

                    <td>
                        <form method="POST" action="procura_deletar.php">
                            <center align="right">
                                <input type="submit" value="Excluir Contato">
                            </center>
                        </form>
                    </td>
                </tr>

            </table>
        </div>
    </div>

    <h4>
        <center>Senai Norte - Joinvile - SC</center>
    </h4>

</body>

</html>
