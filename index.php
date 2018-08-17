<?php

function randomChoose(){
$unArray=[];
if(isset($_POST)){
    if(isset($_POST['value']) && isset($_POST['value_dos'])){
        $unArray[] = $_POST['value'];
        $unArray[] = $_POST['value_dos'];
        $aleatorio =mt_rand(0,2);
        return($unArray[$aleatorio]);
    } else{
        echo 'Ingresa algo xabaan';
    }
} elseif (empty($_POST)) {
    echo 'Ingrese valores';
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <title>Random Choose</title>
</head>
<body>
    <section class="container">
        <article class="container-header">
            <header class="header">
                <ul>
                    <li><a href="como_funciona.php">Como Funciona?</a></li>
                </ul>
            </header>
        </article> 
        <br>
        <article class="semi-container">
            <form method="POST">
                <label for="value" class="label">Ingrese la primera opcion</label> <br>
                <input type="text" name="value">
                <br> 
                <br>
                <label for="value_dos" class="label">Ingrese la primera opcion</label><br>
                <input type="text" name="value_dos"> <br> <br>
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