<?php
require_once (dirname(__FILE__) . '/db.php');
session_start();

if ($_POST)
{
$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE usuario=:usuario";
$query = $pdo->prepare($sql);
$query->bindParam(':usuario', $usuario, PDO::PARAM_STR);
$query->execute();
$resultado = $query->fetchAll();

if (count($resultado) > 0)
{
$password_bd = $resultado[0]['password'];
$estado = $resultado[0]['estado'];

$pass_c = $password;

if ($password_bd == $pass_c){
	
if ($estado == "Activo"){
$_SESSION['id'] = $resultado[0]['id'];
$_SESSION['usuario'] = $resultado[0]['usuario'];
$_SESSION['password'] = $resultado[0]['password'];
$_SESSION['tipo_usuario'] = $resultado[0]['tipo_usuario'];
$_SESSION['token'] = $resultado[0]['token'];	
header("Location: cookie");
}

else { echo "<script>alert('Usuario Inactivo')</script> <script>window.location = '/'</script>"; }

}

else{ echo "<script>alert('Contraseña incorrecta')</script> <script>window.location = '/'</script>"; }
}

else { echo "<script>alert('usuario o contraseña invalido')</script> <script>window.location = '/'</script>";}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" sizes="16x16" href="./img/favicon.png">
<!--<link href="https://cdn.jsdelivr.net/gh/busine011/utilty/loginciclex2.css" rel="stylesheet">-->
<title>Login</title>
<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap');

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Open Sans', sans-serif;
}

body {
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	background-color: #1d1128;
	background-image: radial-gradient(ellipse at 70% 0%,hsla(257deg,62%,32%,0.7) 0%,rgba(60,31,132,0) 30%),radial-gradient(circle at 90% 0%,hsla(347deg,83%,60%,0.5) 0%,rgba(238,68,105,0) 30%),radial-gradient(ellipse at 0% 0%,hsla(175deg,51%,48%,0.15) 0%,rgba(60,185,174,0) 40%),radial-gradient(circle at 30% 100%,hsla(257deg,62%,32%,0.7) 0%,rgba(60,31,132,0) 40%),radial-gradient(ellipse at 10% 100%,hsla(347deg,83%,60%,0.5) 0%,rgba(238,68,105,0) 40%),radial-gradient(ellipse at 100% 100%,hsla(175deg,51%,48%,0.15) 0%,rgba(60,185,174,0) 40%);
	background-size: 100% 100%;
	-webkit-text-size-adjust: 100%;
	-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

.square {
	position: relative;
	width: 500px;
	height: 500px;
	display: flex;
	justify-content: center;
	align-items: center;
}

.square i {
	position: absolute;
	inset: 0;
	border: 2px solid #fff;
	transition: 0.5s;
}

.square i:nth-child(1) {
	border-radius: 38% 62% 63% 37% / 41% 44% 56% 59%;
	animation: animate 6s linear infinite;
}

.square i:nth-child(2) {
	border-radius: 41% 44% 56% 59%/38% 62% 63% 37%;
	animation: animate 4s linear infinite;
}

.square i:nth-child(3) {
	border-radius: 41% 44% 56% 59%/38% 62% 63% 37%;
	animation: animate2 10s linear infinite;
}

.square:hover i {
	border: 6px solid var(--clr);
	filter: drop-shadow(0 0 20px var(--clr));
}

@keyframes animate {
	0% {
		transform: rotate(0deg);
	}

	100% {
		transform: rotate(360deg);
	}
}

@keyframes animate2 {
	0% {
		transform: rotate(360deg);
	}

	100% {
		transform: rotate(0deg);
	}
}

.login {
	position: absolute;
	width: 300px;
	height: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	gap: 10px;
}

.login h2 {
	font-size: 2em;
	color: #fff;
}

.login .inputBx {
	position: relative;
	width: 100%;
}

.login .inputBx input {
	position: relative;
	width: 100%;
	padding: 12px 20px;
	background: transparent;
	border: 2px solid #fff;
	border-radius: 40px;
	font-size: 1.2em;
	color: #fff;
	box-shadow: none;
	outline: none;
}

.login .inputBx input[type="submit"] {
	width: 100%;
	background-color: #2a2a72;
	background-image: linear-gradient(315deg, #431f67 0%, #6e2646 74%);
	box-shadow: 0 1px 20px 0 rgba(0, 0, 0, .8);
	border: none;
	cursor: pointer;
}

.login .inputBx:hover {
	color: #000;
}	
	
	
.login .inputBx input::placeholder {
	color: rgba(255,255,255,0.75);
}

.login .links {
	position: relative;
	width: 100%;
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 0 20px;
}

.login .links a {
	color: #fff;
	text-decoration: none;
}			
</style>	
</head>
<body>
<form method="post" action="index.php">	
<div class="square">
<i style="--clr:#b83d7e;"></i>
<i style="--clr:#421e67;"></i>
<i style="--clr:#6940ad;"></i>
<div class="login">
<h2>Login</h2>
<div class="inputBx">
<input type="text" name="usuario" placeholder="Usuario" required>
</div>
<div class="inputBx">
<input type="password" name="password" placeholder="Password" required>	
</div>
<div class="inputBx">
<input type="submit" value="Iniciar Seccion">
</div>
</div>
</div>
</form>	
</body>
</html>

















