<?php 
require_once('funciones.php');
if (estaLogueado()) {
    header('location: home.php');
    exit;
}

$user = '';
$errores = [];
if ($_POST) {
    $user = trim($_POST['user']);
    $pass = trim($_POST['pass']);
    $errores = validarLogin();
    if (empty($errores)) {
        loguear($user);

    if (isset($_POST['recordar'])){

        setcookie('id', $user['id'], time() + 3600 *24 *30);
        var_dump($usuario['id']);
        exit;
    }
    header('location:index.php');
    exit;
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
    <link rel="stylesheet" href="css/login.css">
    <title>Random Choose- Login</title>
</head>
<body>
    <section class="container">
        <article class="semi-container">
            <div class="titulo">
                <h1>Logueate!</h1>
                <h4>Para poder loguearte completa los siguientes campos.</h4>
            </div>
            <?php if (!empty($errores)): ?>
			<div class="div-errores alert alert-danger">
				<ul>
					<?php foreach ($errores as $value): ?>
					<li><?=$value?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>
            <form method="post">
                <input type="text" name="user" placeholder="Ingresa tu usuario..." value="<?= $user ?>">
                <br>
                <input type="password" name="pass" placeholder="Ingresa tu contraseña....">
                <br>
                <input type="submit" name="submit">
                <div class="checkbox">
                    <label for="recordar" style="font-family: 'Oswald', sans-serif;">Recuerdame</label>
                    <input type="checkbox" name="recordar">
                </div>
            </form>
        </article>
    </section>
</body>
</html>