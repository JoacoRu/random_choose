<?php
function validar($data){
    $user = trim($_POST['user']);
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $pass = trim($_POST['pass']);
    $rpass = trim($_POST['rpass']);

    if($user == ''){
        $errores['user'] = 'Porfavor elige un usuario';
    }elseif(strlen($user) <= 3){
        $errores['user'] = 'Porfavor elige un nombre de usuario que al menos tenga 4 caracteres';
    }elseif(validarUsuario($user) == false){
        $errores['user'] = 'Ese nombre de usuario ya esta registrado, porfavor elegi otro!';
    }
    if($nombre == ''){
        $errores['nombre'] = 'Porfavor completa tu nombre';
    }elseif(strlen($nombre) <= 3){
        $errores['nombre'] = 'Porfavor elige un nombre que al menos tenga 4 caracteres';
    }
    if($apellido == ''){
        $errores['apellidos'] = 'Porfavor completa tu apellido';
    }
    if($pass == '' || $rpass == ''){
        $errores['pass'] = 'Porfavor completa tus contraseñas';
    } elseif(strlen($pass) <= 5){
        $errores['pass'] = 'Porfavor ingrese una contraseña de al menos 6 digitos';
    
    }elseif($pass != $rpass){
        $errores['pass'] = 'Tus contraseñas no coinciden';
    }

    return $errores;
}

function guardarUsuario($data){
    $usuario = [
        "id" => traerUltimoID(),
        "user" => $data['user'],
        "name" => $data['nombre'],
        "lastname" => $data['apellido'],
        "pass" => password_hash($data['pass'], PASSWORD_DEFAULT),
    ];

    $usuarioJSON = json_encode($usuario);

    file_put_contents('usuarios.json', $usuarioJSON . PHP_EOL, FILE_APPEND);
}

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

function traerPorID($id){
    $usuarios = traerTodos();
    foreach ($usuarios as $usuario) {
        if ($usuario['id'] == $id) {
            return $usuario;
        }
    }
    return false;
}

function traerPorUsuario(){
    $usuarios = traerTodos();
    $arrayDeNombresDeUsuarios = [];
    foreach ($usuarios as $usuario ) {
        array_push($arrayDeNombresDeUsuarios, $usuario['user']);
    }

    return $arrayDeNombresDeUsuarios;
}

function validarUsuario($user){
    $usuarios = traerPorUsuario();
    foreach ($usuarios as $usuario) {
        if($usuario == $user){
            return false;
        }
    }
}

function traerUltimoID(){
    $todos = traerTodos();

    if(count($todos) == 0){
        return 1;
    }

    $ultimo = array_pop($todos);
    $ultimoID = $ultimo['id'];

    return $ultimoID +1;
}

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