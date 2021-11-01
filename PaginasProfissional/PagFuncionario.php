<?php
require '../ConectBanco/Banco.php';
require '../Utilidades/Usuario.php';
session_start();

if(!isset($_SESSION['usuario'])) {
    header('Location: ../Login/Login.php');
    return;
}

$tipo = $_SESSION['usuario'] -> get_tipo();

$usuario =  $_SESSION['usuario'];
$resultado = obterFuncionarios();
$resultadoServico = obterServicos();
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>AREA FUNCIONARIO</title>
        <link rel="shortcut icon" href="../Detalhes/img/favicon.png">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="../Detalhes/css/dashboard.css" rel="stylesheet">
    </head>
    <body>
        <div id="preloader">
            <div class="inner">
                <div class="bolas">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>

        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap">
            <a href="../index.html#home"><img src="../Detalhes/img/logo.png" alt="logo mr barbers" class="nav-logo"></a>
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                <a class="nav-link px-3 d-none d-md-block" href="../Login/Logout.php"><span data-feather="log-out"></span> Sair</a>
                </div>
            </div>
            <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
            </button>
        </header>
        
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">            
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">MENU</h5>
                <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#">
                            <span data-feather="home"></span> Principal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="calendar"></span> Agendamentos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="scissors"></span> Perfil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="settings"></span> Configurações
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Login/Logout.php">
                            <span data-feather="log-out"></span> Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="sidebar col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="../AreaCliente/Cliente.php">
                                    <span data-feather="home"></span>
                                    Principal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="#">
                                    <span data-feather="users"></span>
                                    Funcionarios
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="../PaginasProfissional/PagCadastroServico.php">
                                    <span data-feather="file-text"></span> Serviços
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                
                <main class="conteudo col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <h2>Seus Funcionarios  <?php echo $usuario -> get_nome(); ?></h2>
                            <button type="button" class="btn btn-primary btn-sm" href="popupAgendamento" data-bs-toggle="modal" data-bs-target="#popupAgendamento">Cadastro Funcionário</button>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Status</th>  
                                    <th scope="col">Editar Funcionário</th>
                                    <th scope="col">Excluir Funcionário</th>       
                                </tr>         
                            </thead>
                                <tr>
                                    <th>João Pedro</th>
                                    <th style="color: red;">Ocupado</th>
                                    <th>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#popupFuncionario">
                                            Alterar
                                        </button>
                                    </th>
                                    <th>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#popupFuncionario">
                                            Excluir
                                        </button>
                                    </th>
                                </tr> 
                                <tr>
                                    <th>Manoel</th> 
                                    <th style="color: green;">LIvre</th>
                                    <th>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#popupFuncionario">
                                            Alterar
                                        </button>
                                    </th>
                                    <th>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#popupFuncionario">
                                            Excluir
                                        </button>
                                    </th>
                                </tr>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </main>

            <main class="conteudo col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="modal fade" id="popupAgendamento" tabindex="-1" aria-labelledby="popupAgendamentoLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg  modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cadastre Seu Funcionário</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="#" class="form-agendamento">
                                    <div class="input-group col-sm-12 input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Nome:</span>
                                        </div>
                                            <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                    <div class="row g-3 align-items-center">
                                        <div class="col-sm-6">
                                            <select name="" id="" class="form-select">
                                                <option selected>Status</option>
                                                <option>Livre</option>
                                            </select>
                                        </div>                                        
                                    </div>
                                </form>      
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </div>
                     </div>
                </div>                          
            </main>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
            <script src="../Detalhes/js/main.js"></script>
            <script> feather.replace();</script>
        </body>
</html>

