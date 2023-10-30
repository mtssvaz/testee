
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
$matricula = mysqli_real_escape_string($conn, $_POST['matricula']);
$ano = mysqli_real_escape_string($conn, $_POST['ano']);
$atendente = mysqli_real_escape_string($conn, $_POST['atendente']);
$idchrome = mysqli_real_escape_string($conn, $_POST['idchrome']);
$dt_entrega = mysqli_real_escape_string($conn, $_POST['dt_entrega']);
$contrato = mysqli_real_escape_string($conn, $_POST['contrato']);

// Prepara uma consulta SQL segura para inserir os dados na tabela
$sql = "INSERT INTO cadastro (aluno, matricula, ano, atendente, idchrome, dt_entrega, contrato) VALUES ('$aluno', '$matricula', '$ano', '$atendente', '$idchrome', '$dt_entrega', '$contrato')";



// Executa a consulta e verifica se foi bem-sucedida
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Cadastro realizado com sucesso!');</script>";
    echo "<script>location.href='buscardozero.php';</script>";
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conn);
}

// Fecha a conexão
mysqli_close($conn);
?>
