<?php 

require_once('funciones.php');

function traerTodos(){
    $allUsers = file_get_contents('usuarios.json');

    $arrayDeJSON = explode(PHP_EOL, $allUsers);

    array_pop($arrayDeJSON);

    $arrayPHP = [];

    foreach ($arrayDeJSON as $key => $unUsuarioJSON) {
        $arrayPHP[] = json_decode($unUsuarioJSON, true);
    }

    return $arrayPHP;
}

function traerDatosUsuario($username){
    $todos = traerTodos();
    $usuarioCompleto = [];
    $datos = []; 
    foreach ($todos as $key){
        if($key['user'] == $username){
           $usuarioCompleto[]= $key;
        }
    }
    foreach ($usuarioCompleto as $key) {
        $datos['user'] = $key['user'];
        $datos['key'] = $key['pass'];
    }
    return ($datos);
}

$foo = traerDatosUsuario('JoacoRu');

var_dump($foo['user']);
var_dump($foo['key']);


?>