<?php
	include_once "conection/conex.php";
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
    		<form action="User_Validation/User_Validation.php" method="POST">
    			<label for="email">E-mail</label>
    			<input type="email" name="email" id="email" placeholder="E-mail" autocomplete="off">
    			<label for="password">Senha</label>
    			<input type="password" name="senha" id="senha" placeholder="Senha" autocomplete="off">
    			<a href="#" id="forgot-pass">Esqueceu a senha?</a>
    			<input type="submit" value="Login" method="POST">
    		</form>
    	</div>
        
    </body>
</html>