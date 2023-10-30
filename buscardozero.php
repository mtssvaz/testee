<?php

include 'conexao.php';

$buscar_cadastros = " SELECT * FROM  CADASTRO";
$query_cadastros = mysqli_query($conn, $buscar_cadastros);

    ?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="shortcut icon" href="imagens/fav_icon.png" type="image/x-icon"/>
	
	<link rel="stylesheet" href="/styles/buscar.css" />

	<title> Diretório de Contratos </title>

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
                <h4 class="col-12 mt-3 mb-3 font-weight-bold text-center" >
                    Diretório de Contratos
                </h4>
            </div>
		</div>
		<div class="form-group input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
			<input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control">
		</div>
		<div class="container-busca">
			<div class="row">
				<div class="col-10">
					<h4>Resultados</h4>
				</div>

				<div class="row">
					<div class="col-12">
						<nav aria-label="Navegação de página exemplo">
							<ul class="pagination justify-content-end">
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Anterior">
										<span aria-hidden="true">&laquo;</span>
										<span class="sr-only">Anterior</span>
									</a>
								</li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item">
									<a class="page-link" href="#" aria-label="Próximo">
										<span aria-hidden="true">&raquo;</span>
										<span class="sr-only">Próximo</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>

			<table id="tabela" class="table table-hover">
				<thead>
					<tr>
					    <th>ID</th>
						<th>Aluno</th>
						<th>RM</th>
						<th>Atendente</th>
						<th>ID Chromebook</th>
						<th>Data de entrega</th>
						<th>Contrato</th>
						<th>Ações</th>
					</tr>
				</thead>
				
                <tbody>
					<?php
						while($receber_cadastros = mysqli_fetch_array($query_cadastros))
						{
						    echo "<tr>";
						    echo "<td>".$receber_cadastros['ID']."</td>";
						    echo "<td>".$receber_cadastros['aluno']."</td>";
						    echo "<td>".$receber_cadastros['matricula']."</td>";
						    echo "<td>".$receber_cadastros['atendente']."</td>";
						    echo "<td>".$receber_cadastros['idchrome']."</td>";
						    echo "<td>".$receber_cadastros['dt_entrega']."</td>";
						    echo "<td>".$receber_cadastros['contrato']."</td>";
						    echo "<td>
    			                    
    			                    <button onclick=\"location.href='editar_usuario.php?ID=$receber_cadastros[ID]';\" class='btn btn-primary'>EDITAR</button>
    			                    <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='excluir.php?ID=$receber_cadastros[ID]';}else{false;}\" class='btn btn-danger'>EXCLUIR</button>
        				    	    
    			                  </td>";
						    echo "</tr>";
					?>
				    <?php }; ?>
				</tbody>
            </table>
		</div>
	</div>


	

	<script>
		$('input#txt_consulta').quicksearch('table#tabela tbody tr');
	</script>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>
</html>
