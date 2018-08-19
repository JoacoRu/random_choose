<?php
    require_once('funciones.php');
    $nombre = '';
    $apellido = '';
    $user = '';
    $errore = [];
    if($_POST){
        $user = trim($_POST['user']);
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $pass = trim($_POST['pass']);
        $rpass = trim($_POST['rpass']);

        $errores = validar();

        if(empty($errores)){
            guardarUsuario();
            header('location:index.php');
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv=”Last-Modified” content="0">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="css/registrarse.css">
    <title>Random Choose Register</title>
</head>
<body>
<section class="container">
    <article class="semi-container">
        <div class="titulo">
            <h1>Bienvenido a Random Choose!</h1>
            <p>Para registrarte rellena los siguientes campos</p>
        </div>
        <?php if (!empty($errores)): ?>
			<div class="div-errores alert alert-danger">
				<ul>
					<?php foreach ($errores as $value): ?>
					<li style="font-family: 'Oswald', sans-serif;">-<?=$value?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>
        <form method="post">
            <input type="text" name="user" placeholder="Ingrese su usuario" value="<?= $user ?>">
            <br>
            <input type="text" name="nombre" placeholder="Ingrese su nombre" value="<?= $nombre ?>">
            <br>
            <input type="text" name="apellido" placeholder="Ingrese su apellido" value="<?= $apellido ?>">
            <br>
            <input type="password" name="pass" placeholder="Ingrese su contraseña">
            <br>
            <input type="password" name="rpass" placeholder="Ingrese su contraseña">
            <br>
            <input type="submit" value="Registrarse!">
        </form>
    </article>
</section>
</body>
</html>