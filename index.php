<?php
	session_start();
	require_once('Privado/conexao.php');	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Estoque</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
</head>
 	<body>
 	
    	<div class="login-container">
    		<h1>Login</h1>
    		<form method="POST" id="login_user_form" action="Privado/User_Controller.php?acao=login">
    			<label for="login">E-mail</label>
    			<input type="email" name="login" id="login" placeholder="E-mail" autocomplete="off" value="admin@gmail.com">
    			<label for="senha">Senha</label>
    			<input type="password" name="senha" id="senha" placeholder="Senha" autocomplete="off" value="123@Senha">
    			<a href="#" id="forgot-pass">Esqueceu a senha?</a>
    			<input form="login_user_form" type="submit" value="Login" id="login_user">
				<span id="msgAlerta"></span>
				<script src="scripts/login.js"></script>
    		</form>
    	</div>    
    </body>
</html>