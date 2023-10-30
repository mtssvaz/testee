<?php

    if(!empty($_GET['ID']))
    {

        include 'conexao.php';
        
        $ID = $_GET['ID'];
        
        $buscar_cadastros = " SELECT * FROM  CADASTROALUNO WHERE ID=$ID";
        $query_cadastros = mysqli_query($conn, $buscar_cadastros);
        
        if($query_cadastros->num_rows > 0)
        {
        	while($receber_cadastros = mysqli_fetch_array($query_cadastros))
        	{
            	 $aluno = $receber_cadastros['aluno'];
            $responsavel = $receber_cadastros['responsavel'];
            $ano = $receber_cadastros['ano'];
            $cep = $receber_cadastros['cep'];
            $numero = $receber_cadastros['numero'];
            $rua = $receber_cadastros['rua'];
            $bairro = $receber_cadastros['bairro'];
            $cidade = $receber_cadastros['cidade'];
            $uf = $receber_cadastros['uf'];
        	}
        }
        else{
            header('Location: diretorioaluno.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <link rel="shortcut icon" href="imagens/fav_icon.png" type="image/x-icon"/>

    <link rel="stylesheet" href="/styles/cadastrar.css" />

 <!-- Adicionando JavaScript -->
    <script>
    function limpa_formulário_cep() {
        // Limpa valores do formulário de CEP.
        document.getElementById('rua').value = "";
        document.getElementById('bairro').value = "";
        document.getElementById('cidade').value = "";
        document.getElementById('uf').value = "";
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            // Atualiza os campos com os valores.
            document.getElementById('rua').value = conteudo.logradouro;
            document.getElementById('bairro').value = conteudo.bairro;
            document.getElementById('cidade').value = conteudo.localidade;
            document.getElementById('uf').value = conteudo.uf;
        } else {
            // CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {
        var cep = valor.replace(/\D/g, '');

        if (cep != "") {
            var validacep = /^[0-9]{8}$/;

            if (validacep.test(cep)) {
                // Preenche os campos com "..." enquanto consulta o webservice.
                document.getElementById('rua').value = "...";
                document.getElementById('bairro').value = "...";
                document.getElementById('cidade').value = "...";
                document.getElementById('uf').value = "...";

                // Cria um elemento javascript.
                var script = document.createElement('script');

                // Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                // Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);
            } else {
                // CEP é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } else {
            // CEP sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
    </script>
  
    <title>Editar Cadastro</title>

</head>

<body>

   <nav class="navbar navbar-expand-md fixed-top" style="background-color: #324572;">
        <a class="navbar-brand" href="#">
            <img class="logo" src="imagens/logo.png" alt="Logo do colégio Nahim Ahmad">
        </a>
		<!-- INICIO ACESSIBILIDADE -->
		<span class="font-con"><button id="ativaContraste" onClick="contrasteON()" class="btn btn-secondary btn-sm">Alto Constraste</button>
		<button onClick="tamanhoFonte('mais');">A+</button>
		<button onClick="tamanhoFonte('menos');">A-</button>
		</span>
		<!-- FIM ACESSIBILIDADE -->			
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                   <li class="nav-item">
    <a class="nav-link link-nav" href="inicio.html">Início</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle link-nav" href="#" id="menuCadastro" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Cadastro
    </a>
    <div class="dropdown-menu" aria-labelledby="menuCadastro">
	<a class="dropdown-item" href="cadastraraluno.html">Cadastrar Aluno</a>
	<a class="dropdown-item" href="cadastrarchrome.html">Cadastrar Chromebook</a>
        <a class="dropdown-item" href="cadastrar.html">Cadastrar Contrato</a>
      
	 
    </div>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle link-nav" href="#" id="menuDiretorio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Diretório
    </a>
    <div class="dropdown-menu" aria-labelledby="menuDiretorio">
	<a class="dropdown-item" href="diretorioaluno.php">Diretório de Alunos</a>
	<a class="dropdown-item" href="estoque.php">Diretório de Chromebooks</a>
        <a class="dropdown-item" href="buscardozero.php">Diretório de Contratos</a>
      
    </div>
</li>
<li class="nav-item">
    <a class="nav-link link-nav" href="duvidas.html">Dúvidas</a>
</li>
<li class="nav-item">
    <a class="nav-link link-nav-logout ml-md-3 pl-3 pr-3" onclick="logout()">Sair</a>
</li>

            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center align-items-center"> <!--style="height: 100vh;"-->
            <div class="col-12 col-sm-9 col-md-6 col-lg-7 col-xl-7 pt-1 pb-1 pr-5 pl-5">
                <h4 class="col-12 mt-3 mb-3 font-weight-bold text-center " >
                    Editar Cadastro
                </h4>
            </div>
        
        
            
            <div class="col-12 col-md-11 col-lg-9 col-xl-8 col-xxl-7 pt-2 pb-4 pr-3 pr-sm-4 pr-md-5 pl-3 pl-sm-4 pl-md-5 mb-1 container-form">
                <form action="aeditaraluno.php" method="post">
        <label>Aluno:
            <input name="aluno" type="text" id="aluno" size="60" value="<?php echo $aluno; ?>" /></label><br />
        <label>Responsável:
            <input name="responsavel" type="text" id="responsavel" size="60" value="<?php echo $responsavel; ?>" /></label><br />
        <label>Ano:
            <select id="ano" name="ano" class="form-control input" required>
                <option value="" selected disabled>Selecione</option>
                <option value="6" <?php if ($ano == "6") echo "selected"; ?>>6º ano</option>
                <option value="7" <?php if ($ano == "7") echo "selected"; ?>>7º ano</option>
                <option value="8" <?php if ($ano == "8") echo "selected"; ?>>8º ano</option>
                <option value="9" <?php if ($ano == "9") echo "selected"; ?>>9º ano</option>
                <option value="1" <?php if ($ano == "1") echo "selected"; ?>>1° Ano - Ensino Médio</option>
                <option value="2" <?php if ($ano == "2") echo "selected"; ?>>2° Ano - Ensino Médio</option>
                <option value="3" <?php if ($ano == "3") echo "selected"; ?>>3° Ano - Ensino Médio</option>
            </select>
        </label><br />
        <label>Cep:
            <input name="cep" type="text" id="cep" value="<?php echo $cep; ?>" size="10" maxlength="8"
                   onblur="pesquisacep(this.value);" /></label><br />
        <label>Nº:
            <input name="numero" type="number" id="numero" value="<?php echo $numero; ?>" size="60" /></label><br />
        <label>Rua:
            <input name="rua" type="text" id="rua" value="<?php echo $rua; ?>" size="60" /></label><br />
        <label>Bairro:
            <input name="bairro" type="text" id="bairro" value="<?php echo $bairro; ?>" size="40" /></label><br />
        <label>Cidade:
            <input name="cidade" type="text" id="cidade" value="<?php echo $cidade; ?>" size="40" /></label><br />
        <label>Estado:
            <input name="uf" type="text" id="uf" value="<?php echo $uf; ?>" size="2" /></label><br />

     
        <input type="hidden" name="ID" value="<?php echo $ID; ?>">
        <div class="row justify-content-center align-items-center">
            <input class="col-7 mt-4 button" type="submit" value="Salvar Alterações">
        </div>
    </form>
            </div>
        </div>
    </div>

  

</body>

</html>
