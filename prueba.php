<?php 

require_once('funciones.php');

    $usuarios = traerTodos();
    $arrayDeNombresDeUsuarios = [];
    foreach ($usuarios as $usuario ) {
        array_push($arrayDeNombresDeUsuarios, $usuario['user']);
    }

    echo $arrayDeNombresDeUsuarios;

?>