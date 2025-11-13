<?php
session_start();

$host = "localhost";
$usuario = "root";
$clave = "";
$db = "email";

$conexion = mysqli_connect($host, $usuario, $clave, $db);

// Recogemos el ID y buscamos el mensaje
$id = $_GET['ID'];
$sql = "select cuerpo from mensajes where id='$id'";
$resultado = $conexion->query($sql);
$fila = $resultado->fetch_array();

// A partir de aquí, IMPRIMIMOS el HTML usando echo
echo "<html>
    <head>

    </head>
    <body>

    <div align='center'>
        <h1>" . $fila['cuerpo'] . "</h1>
    </div>
    </body>";
?>