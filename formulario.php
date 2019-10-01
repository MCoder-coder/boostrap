<?php

error_reporting(-1);

$error = '';
$nombre =$_POST["nombre"];
$email =$_POST["email"];
$mensaje =$_POST["mensaje"];

//VALIDANDO NOMBRE
if(empty($_POST["nombre"])){
    $error = 'ingrese un nombre </br>';
}else{
    $nombre =$_POST["nombre"];
    $nombre =filter_var($nombre, FILTER_SANITIZE_STRING);
}
//VALIDANDO EMAIL
if(empty($_POST["email"])){
    $error .= 'ingresa un Email </br>';
}else {
    $email =$_POST["email"];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error .= 'ingresa un Email valido';
    }else {
        $email = filter_var($email,FILTER_SANITIZE_EMAIL);
    }
}

//VALIDANDO MENSAJE
if(empty($_POST["mensaje"])){
    $error .= 'ingrese un mensaje </br>';
}else{
    $mensaje =$_POST["mensaje"];
    $mensaje =filter_var($mensaje, FILTER_SANITIZE_STRING);
}

//CUERPO DE MENSAJE

$cuerpo = "Nombre: ";
$cuerpo.= $nombre;
$cuerpo.= "\n";

$cuerpo.="Email: ";
$cuerpo.=$email;
$cuerpo.="\n";

$cuerpo.="Mensaje: ";
$cuerpo.=$mensaje;
$cuerpo.="\n";

//DIRECCION
$enviarA = 'jesusreeb@hotmail.com'; //REMPLAZAR CON TU CORREO ELECTRONICO
$asunto = 'Nuevo mensaje de mi sitio web';


//ENVIAR CORREO


if($error == ''){
    $success = mail($enviarA,$asunto,$cuerpo,'de: '.$email);
    echo 'exito';
}else{
    echo $error;
    
    
}


?>


