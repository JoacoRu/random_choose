<?php
    require_once('funciones.php');
    if (!estaLogueado()) {
		header('location: login.php');
		exit;
    }
    
	$usuario = traerPorID($_SESSION['id']);
    $value_uno = trim(isset($_POST['value']));
    $value_dos = trim(isset($_POST['value_dos']));
    $value_uno = '';
    $value_dos= '';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv=”Last-Modified” content="0">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <title>Random Choose</title>
</head>
<body>
    <section class="container">
        <article class="container-header">
            <header class="header">
                <ul>
                    <li><a href="como_funciona.php">¿Como Funciona?</a></li>
                </ul>
            </header>
        </article> 
        <br>
        <article class="semi-container">
            <form method="POST">
                <label for="value" class="label">Ingrese la primera opcion</label> <br>
                <input type="text" name="value" value="<?= $value_uno; ?>">
                <br> 
                <br>
                <label for="value_dos" class="label">Ingrese la primera opcion</label><br>
                <input type="text" name="value_dos" value="<?= $value_dos ?>"> <br> <br>
                <input type="submit" value="Enviar!"> 
                <br> 
            </form>
            <div class="resultado">
                <h4><?= randomChoose();?></h4>
            </div>
        </article>
    </section>
</body>
</html>