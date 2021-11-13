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

$idpersona= $obj['id'];

//Instrucción para insertar
$sql_query = "DELETE from persona WHERE id ='$idpersona'";

//Ejecutar la instrucción sql anterior
if(mysqli_query($conn,$sql_query)){
    $mensaje = "Persona eliminada forever";
    $json = json_encode($mensaje);
    echo $json;
}else{
    echo "Error eliminando la persona";
}    

mysqli_close($conn); 


?>                                                                                                                                                                                                                                                                                                                                                          