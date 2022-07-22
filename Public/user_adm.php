<?php
   $acao = 'listar';
   require '../Privado/User_Controller.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../assets/home.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Logo Empresa</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Menu Inicial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Estoque</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Transações</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Administração
                        </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="User/User_Creation.php">Usuários</a></li>
                        <li><a class="dropdown-item" href="#">Estoque</a></li>
                        <li><a class="dropdown-item" href="#">Exemplo</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Privado/User_Controller.php?acao=sair">Sair</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <span id="msgAlertaPermissao"></span>
        
        <div>
            <div>
                <table class="table table-striped container-md">
                    <thead>
                                    <td>ID</td>
                                    <td>NOME</td>
                                    <td>LOGIN</td>
                                    <td>PERMISSÃO</td>
                                    <td>SITUAÇÃO</td>
                    </thead>
                    <? foreach($users as $indice => $user){?>
                                <tbody>
                                    <tr>
                                        <td><?= $user->id ?></td>
                                        <td><?= $user->nome ?></td>
                                        <td><?= $user->login ?></td>
                                        <td><?= $user->permissao ?></td>
                                        <td><?= $user->situacao ?></td>
                                        <td><i type="button" class = "btn btn-success">Editar</i>
                                            <i type="button" class = "btn btn-danger">Desativar</i>
                                            <i type="button" class = "btn btn-warning">Permissão</i>
                                        </td>
                                    </tr>
                                </tbody>
                    <? } ?>
                </table>    
            </div>
                
        </div>

    </body>
</html>