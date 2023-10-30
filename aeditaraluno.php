<?php
$dbhost = "chromelocalhost.mysql.database.azure.com";
$dbuser = "chromelocalhost";
$dbpass = "mateus@2023";
$db = "colegiocontrolechrome";

// Inicializa o MySQLi
$conn = mysqli_init();

// Estabelece a conexão
mysqli_real_connect(
    $conn,
    $dbhost,
    $dbuser,
    $dbpass,
    $db,
    3306,
    NULL,
    0 // Sem SSL
);
// Obtém os dados do formulário
$ID = $_POST['ID'];
$aluno = $_POST['aluno'];
$responsavel = $_POST['responsavel'];
$ano = $_POST['ano'];
$cep = $_POST['cep'];
$numero = $_POST['numero'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];

// Prepara uma consulta SQL para atualizar os dados na tabela
$sql = "UPDATE CADASTROALUNO SET
            aluno='{$aluno}',
            responsavel='{$responsavel}',
            ano='{$ano}',
            cep='{$cep}',
            numero='{$numero}',
            rua='{$rua}',
            bairro='{$bairro}',
            cidade='{$cidade}',
            uf='{$uf}'
        WHERE
            ID='{$ID}'"; // Substitui REQUEST por POST e adiciona aspas simples

// Executa a consulta e verifica se foi bem-sucedida
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Cadastro editado com sucesso!');</script>";
    echo "<script>location.href='diretorioaluno.php';</script>";
} else {
    echo "Erro ao editar cadastro: " . mysqli_error($conn);
}

// Fecha a conexão
mysqli_close($conn);
?>
