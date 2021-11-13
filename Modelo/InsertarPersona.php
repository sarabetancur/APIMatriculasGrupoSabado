<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE,OPTIONS');
header('Access-Control-Max-Age:1000');
header('Access-Control-Allow-Headers:Origin,Content-Type, X-Auth-Token,Authorization');


include '../Conexion/ParametrosBD.php';

$conn = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

$json = file_get_contents('php://input');

//Decodificando los datos formato Json en una variable
$obj = json_decode($json,true);

//Variables para enciar datos de la tabla

$nif = $obj ['nif'];
$nombre = $obj['nombre'];
$apellido1 = $obj['apellido1'];
$apellido2 = $obj['apellido2'];
$ciudad = $obj['ciudad'];
$direccion = $obj['direccion'];
$telefono = $obj['telefono'];
$fecha_nacimiento = $obj['fecha_nacimiento'];
$sexo = $obj['sexo'];
$tipo = $obj['tipo'];
$clave = $obj['Clave'];

//Instrucción para insertar
$sql_query = "INSERT into persona(nif,nombre,apellido1,apellido2,ciudad,direccion,telefono,fecha_nacimiento,sexo,tipo,Clave)
    VALUES ('$nif','$nombre','$apellido1','$apellido2','$ciudad','$direccion','$telefono','$fecha_nacimiento','$sexo','$tipo','$clave')";

//Ejecutar la instrucción sql anterior
if(mysqli_query($conn,$sql_query)){
    $mensaje = "GRABADO";
    $json = json_encode($mensaje);
    echo $json;
}else{
    echo "ERROR";
}    

mysqli_close($conn); 


?>                                                                                                                                                                                                                                                                                                                                                          