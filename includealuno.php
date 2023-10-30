
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

// Se a conexão falhar, exibe o erro
if (mysqli_connect_errno()) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Obtém os dados do formulário e previne ataques de injeção de SQL
$aluno = mysqli_real_escape_string($conn, $_POST['aluno']);
$responsavel = mysqli_real_escape_string($conn, $_POST['responsavel']);
$ano = mysqli_real_escape_string($conn, $_POST['ano']);
$cep = mysqli_real_escape_string($conn, $_POST['cep']);
$numero = mysqli_real_escape_string($conn, $_POST['numero']);
$rua = mysqli_real_escape_string($conn, $_POST['rua']);
$bairro = mysqli_real_escape_string($conn, $_POST['bairro']);
$cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
$uf = mysqli_real_escape_string($conn, $_POST['uf']);

// Prepara uma consulta SQL segura para inserir os dados na tabela
$sql = "INSERT INTO CADASTROALUNO (aluno, responsavel, ano, cep, numero, rua, bairro, cidade, uf) VALUES ('$aluno', '$responsavel', '$ano', '$cep', '$numero', '$rua', '$bairro', '$cidade', '$uf')";



// Executa a consulta e verifica se foi bem-sucedida
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Cadastro realizado com sucesso!');</script>";
    echo "<script>location.href='diretorioaluno.php';</script>";
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conn);
}

// Fecha a conexão
mysqli_close($conn);
?>
