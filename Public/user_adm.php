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
   
        <script>
            function editar(id, txt_area){

                let form = document.createElement('form')
                form.action = 'User_Controller.php?acao=atualizar'
                form.method = 'post'
                form.className = 'row'

            }

            
        </script>
   
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
                        <a class="nav-link" href="../Privado/User_Controller.php?acao=sair">Sair</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <span id="msgAlertaPermissao"></span>
        
        <div>
            <div>
                
                
                <table class="table table-striped container-md">
                    <div>AQUI</div>
                    <thead>
                                    <td>ID</td>
                                    <td>NOME</td>
                                    <td>LOGIN</td>
                                    <td>PERMISSÃO</td>
                                    <td>SITUAÇÃO</td>
                                    <td>MATRÍCULA</td>
                                    <td>AÇÕES</td>
                                    
                    </thead>
                    
                    <?php foreach($users as $user): ?>
                        <?php if(!empty($user)): ?>
                            <tbody>
                                <tr>
                                    <td><?= $user->id ?? '' ?></td>
                                    <td><?= $user->username ?? '' ?></td>
                                    <td><?= $user->login ?? '' ?></td>
                                    <td><?= $user->permissao ?? '' ?></td>
                                    <td><?= $user->situacao ?? '' ?></td>
                                    <td>NºMat</td>
                                    <td><i type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Modal-<?= $user->username ?>">Editar</i>
                                        <div class="modal fade" id="Modal-<?= $user->username ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Editar usuário <?= $user->username ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <form id="att_user" action="../Privado/User_Controller.php?acao=atualizar" method="post">
                                                            <input hidden type="id" name="id" value="<?= $user->id ?? '' ?>">
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Nome:</label>
                                                                <input type="text" class="form-control" id="recipient-name" name="username" value="<?= $user->username ?? '' ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Login:</label>
                                                                <input type="text" class="form-control" id="recipient-name" name="login" value="<?= $user->login ?? '' ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Permissão:</label>
                                                                <input type="text" class="form-control" id="recipient-name" name="permissao" value="<?= $user->permissao ?? '' ?>">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Situação:</label>
                                                                <input hidden type="text" class="form-control" id="situacao" name="situacao" value="<?= $user->situacao ?? '' ?>" list="situacao-list">
                                                                <select class="form-select" id="situacao" name="situacao">
                                                                    <option value="Ativo" <?= isset($user->situacao) && $user->situacao == 'Ativo' ? 'selected' : '' ?>>Ativo</option>
                                                                    <option value="Inativo" <?= isset($user->situacao) && $user->situacao == 'Inativo' ? 'selected' : '' ?>>Inativo</option>
                                                                </select>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                        <button form="att_user" type="submit" class="btn btn-primary">Salvar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <i type="button" class = "btn btn-danger" onclick = "desativar()">Desativar</i>
                                        <i type="button" class = "btn btn-warning">Permissão</i>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endif; ?>
                    <?php endforeach; ?>                                                                      
                </table>    
            </div>
                
        </div>

    </body>
</html>