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
    
    <link rel="stylesheet" href="/styles/login.css"/>
    
    <title>Gerenciador de Chromebooks - Nahim Ahmad</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-12 col-md-8 col-lg-7 col-xl-6 col-xxl-5 pt-4 pb-5 pr-5 pl-5 container-login">
                <div class="row justify-content-center">
                    <img class="imagem" src="/imagens/logo.png" alt="Logo do colégio Nahim Ahmad">
                </div>
                <div class="row justify-content-center">
                    <div class="col-autos login-form-title mt-3 mb-3">
                        Faça o Login
                    </div>
                </div>
                <form>
                    <div class="form-group">
                        <label for="usuario" class="row justify-content-center label">Usuário</label>
                        <input type="usuario" class="form-control input" id="usuario" aria-describedby="emailHelp" placeholder="Digite seu usuário">
                    </div>
                    <div class="form-group mb-2">
                        <label for="password" class="row justify-content-center label">Senha</label>
                        <input type="password" class="form-control input" id="password" placeholder="Digite sua senha">
                        <i class="bi bi-eye eye" id="btn-password" onclick="mostrarSenha()"></i>
                    </div>
                    <div class="row mb-3 mt-3">
                        <div class="col">
                            <div class="form-check">
                                <input type="checkbox" name="manterConectado" id="manterConectado" class="form-check-input">
                                <label for="remember" class="form-check-label">Manter conectado</label>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center">
                        <input class="btn-primary button_a" onclick="logar()" value="Entrar">
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        function mostrarSenha(){
            var inputPass = document.getElementById('password')
            var bntShowPass = document.getElementById('btn-password')

            if(inputPass.type == 'password'){
                inputPass.setAttribute('type','text')
                bntShowPass.classList.replace('bi-eye','bi-eye-slash')
            }else{
                inputPass.setAttribute('type','password')
                bntShowPass.classList.replace('bi-eye-slash','bi-eye')
            }
        }
        
          function logar() {
            var login = document.getElementById('usuario').value;
            var senha = document.getElementById('password').value;
            var manterConectado = document.getElementById('manterConectado').checked;
        
            if (login == "admin" && senha == "admin") {
              sessionStorage.setItem("loggedIn", "true");
        
              if (manterConectado) {
                localStorage.setItem("loggedIn", "true");
              } else {
                localStorage.removeItem("loggedIn");
              }
              
              window.location.href = "inicio.html";
            } else {
              alert('Usuário e/ou senha incorretos, tente novamente!');
            }
          }
        
          function verificarAcesso() {
            var loggedIn = sessionStorage.getItem("loggedIn");
        
            // Verifica se o usuário não está logado no sessionStorage
            if (loggedIn !== "true") {
              loggedIn = localStorage.getItem("loggedIn");
            }
        
            // Verifica se o usuário não está logado no localStorage
            if (loggedIn !== "true") {
              window.location.href = "index.php";
            }
          }
        
          function logout() {
            sessionStorage.removeItem("loggedIn");
            localStorage.removeItem("loggedIn");
            window.location.href = "index.php";
          }
    </script>
    
</body>
</html>
