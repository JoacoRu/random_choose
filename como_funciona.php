<?php 
    if (!estaLogueado()) {
		header('location: login.php');
		exit;
	}
	$usuario = traerPorID($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="css/como_funciona.css">
    <title>Como Funciona- Random Choose</title>
</head>
<body>
    <header class="container-header">
        <div class="header">
            <ul>
                <li><a href="home.php">Ir a Elecciones</a></li>
            </ul>
        </div>
    </header>
    <section class="container">
        <article class="semi-container">
            <div class="titulo">
                <h1>¿Como funciona Random Choose?</h1>
            </div>
            <div class="preguntas">
                <h4>Es muy facil!</h4> <br>
                    <p>1-Llenas el primer campo, con una decision.</p>
                    <p>2-Llenas el segundo campo, con la otra decision.</p>
                    <p>3-Apretas el boton amarillo, que dice <span class="enviar">"Enviar!"</span>, y <span>Random Choose elige por vos una decision aleatoriamente!.</span></p> 
            </div>
        </article>
    </section>
</body>
</html>