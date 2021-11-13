<?php

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials:true');
    header('Access-Control-Allow-Methods:GET,PUT,POST,DELETE,OPTIONS');
    header('Access-Control-Max-Age:1000');
    header('Access-Control-Allow-Headers:Origin,Content-Type, X-Auth-Token,Authorization');

    include '../Conexion/ParametrosBD.php';

    $conn=new mysqli($HostName,$HostUser,$HostPass,$DatabaseName);

    if($conn->connect_error){

        die("La conexión no se pudo realizar: ".$conn->connect_error);

    }else{
        $sql="SELECT * FROM asignatura"; //Preparar la consulta
        $result=$conn->query($sql); //Ejecuta la consulta

        //Verificar si devuelve datos o no
        if($result->num_rows > 0){
            while ($row[]=$result->fetch_assoc()){
                $item=$row;
                $json =json_encode($item);
            } 
        }else{
            echo"No hay registros para motrar";
        }
        echo $json;
        $conn->close();

    }

?>