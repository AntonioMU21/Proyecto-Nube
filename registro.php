<?php
$u=$_POST['usuario'];
$n=$_POST['nombre'];
$c=$_POST['clave'];
$codificada=md5($c);


$host = "localhost";     // Servidor (por ejemplo, 127.0.0.1)
$usuario = "root";       // Usuario de MySQL
$contrasena = "";        // Contraseña del usuario
$base_datos = "email"; // Nombre de la base de datos

// Crear la conexión
$conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Si todo va bien
$sql = "insert into usuario values('$u','$$codificada','$n')";
$resultado = $conexion->query($sql);
$l=mysqli_affected_rows($conexion);
if ($l==1) header("Location: prueba.html");
else echo "<center><h1>No se ha podido insertar el registro</h1></center>";
?>