<?php

$acao = 'listar';
require __DIR__ . '/../Privado/Controller/User_Controller.php';
require __DIR__ . '/../Privado/Configs/config.php';

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
                            <li><a class="dropdown-item" href="#">Usuários</a></li>
                            <li><a class="dropdown-item" href="#">Estoque</a></li>
                            <li><a class="dropdown-item" href="#">Exemplo</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Privado/Controller/User_Controller.php?acao=sair">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <span id="msgAlertaPermissao"></span>



    <div>
        <button type="button" class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#Modal-criar">Adicionar Usuário</button>
        <input id="search_user" type="search" placeholder="Pesquisar"></input>
        <div>
            <table class="table table-striped container-md">

                <thead>
                    <td>ID</td>
                    <td>NOME</td>
                    <td>LOGIN</td>
                    <td>PERMISSÃO</td>
                    <td>SITUAÇÃO</td>
                    <td>MATRÍCULA</td>
                    <td>AÇÕES</td>

                </thead>

                <?php foreach ($users as $user): ?>
                    <?php if (!empty($user)): ?>
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
                                                    <form id="att_user-<?= $user->id ?>" action="..\Privado\User_Controller.php?acao=atualizar" method="post">
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
                                                                <option value="Ativo" <?= isset($user->situacao) && $user->situacao == 'ativo' ? 'selected' : '' ?>>Ativo</option>
                                                                <option value="Inativo" <?= isset($user->situacao) && $user->situacao == 'inativo' ? 'selected' : '' ?>>Inativo</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                    <button form="att_user-<?= $user->id ?>" type="submit" class="btn btn-primary">Salvar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form hidden id="desativar_user-<?= $user->id ?>" action="..\Privado\Controller\User_Controller.php?acao=desativar" method="post">
                                        <input hidden type="id" name="id" value="<?= $user->id ?? '' ?>">
                                        <input hidden name="username" value="<?= $user->username ?? '' ?>">
                                        <input hidden name="login" value="<?= $user->login ?? '' ?>">
                                        <input hidden name="permissao" value="<?= $user->permissao ?? '' ?>">
                                        <input hidden name="situacao" value="<?= $user->situacao ?? '' ?>">
                                    </form>
                                    <button form="desativar_user-<?= $user->id ?>" type="submit" class="btn btn-<?= $user->situacao == 'ativo' ? 'danger' : 'success' ?>"><?= $user->situacao == 'ativo' ? 'Desativar' : 'Ativar' ?></button>
                                    <button type="button" class="btn btn-warning">Permissão</button>
                                </td>
                            </tr>
                        </tbody>
                    <?php endif; ?>
                <?php endforeach; ?>
            </table>
        </div>

    </div>
    <div class="modal fade" id="Modal-criar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar usuário <?= $user->username ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="cria_user" action="..\Privado\Controller\User_Controller.php?acao=criar" method="post">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nome:</label>
                            <input type="text" class="form-control" id="username" name="username" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Login:</label>
                            <input type="text" class="form-control" id="login" name="login" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Permissão:</label>
                            <input type="text" class="form-control" id="permissao" name="permissao" value="Fazer um seletor de permissões">
                        </div>
                        <div class="mb-3">
                            <input hidden type="text" class="form-control" id="situacao" name="situacao" value="ativo" list="situacao-list">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Senha:</label>
                            <input type="password" class="form-control" id="recipient-name" name="senha" value="" required>
                        </div>
                    </form>
                </div>
                <div id="login-feedback"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button form="cria_user" type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>

            <script>
                document.getElementById('login').addEventListener('blur', function() {
                    const login = this.value; // Pega o valor do input de login

                    if (login !== '') {
                        // Faz a requisição AJAX para verificar se o login já existe
                        fetch('../Privado/Controller/User_Controller.php?acao=verificar&login=' + login, {
                                method: 'GET',
                            })
                            .then(response => response.json())
                            .then(data => {
                                const feedback = document.getElementById('login-feedback');
                                if (data.status === 'existe usuário cadastrado') {
                                    feedback.innerHTML = '<div class="alert alert-danger">Este login já existe.</div>';
                                } else if (data.status === 'não existe usuário cadastrado') {
                                    feedback.textContent = '';
                                }
                            })
                            .catch(error => console.error('Erro:', error));
                    }
                    console.log(login);
                });

                // Impede o envio do formul rio se o login já existir
                document.getElementById('cria_user').addEventListener('submit', function(event) {
                    const feedback = document.getElementById('login-feedback');
                    if (feedback.textContent !== '') {
                        event.preventDefault(); // Impede o envio do formul rio
                        alert('Por favor, escolha outro login.');
                    }
                });

                document.getElementById('search_user').addEventListener('keyup', function(event) {
                    var searchValue = this.value.toLowerCase();
                    var rows = document.getElementsByTagName('tr');
                    for (var i = 0; i < rows.length; i++) {
                        var row = rows[i];
                        if (row.parentNode.tagName === 'THEAD') {
                            continue;
                        }
                        var usernameCell = row.cells[1];
                        var username = usernameCell.textContent.toLowerCase();
                        if (username.indexOf(searchValue) > -1) {
                            row.style.display = '';
                        }else{
                            row.style.display = 'none';
                        }

                }})
            </script>

</body>

</html>