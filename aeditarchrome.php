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
$serial = $_POST['serial'];
$modelo = $_POST['modelo'];
$dt_entrada = $_POST['dt_entrada'];
$localizacao = $_POST['localizacao'];

// Prepara uma consulta SQL para atualizar os dados na tabela
$sql = "UPDATE CADASTROCHROME SET
            serial='{$serial}',
            modelo='{$modelo}',
            dt_entrada='{$dt_entrada}',
            localizacao='{$localizacao}'
        WHERE
            ID='{$_POST["ID"]}'"; // Substitui REQUEST por POST e adiciona aspas simples

// Executa a consulta e verifica se foi bem sucedida
if (mysqli_query($conn, $sql)) {
  print "<script>alert('Cadastro editado com sucesso!');</script>";
  print "<script>location.href='estoque.php';</script>";
} else {
  print "Erro ao cadastrar: " . mysqli_error($conn);
}

// Fecha a conex���o
mysqli_close($conn);
?>
