<?php
session_start();
if (!isset($_POST['usu'])) {
    header("Location: index.html");
    exit();}

$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "email";

$u = $_POST['usu'];
$c = $_POST['cla'];


$codificada = '$' . md5(string: $c); 

$conexion = mysqli_connect(hostname: $host, username: $usuario, password: $contrasena, database: $base_datos);
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$sql = "SELECT * FROM usuario WHERE usuario='$u'";
$resultado = $conexion->query(query: $sql);
$l = mysqli_num_rows(result: $resultado);

if ($l == 1) {
    $fila = $resultado->fetch_array();

    if ($fila['clave'] == $codificada) { 
        $_SESSION['usu'] = $u;
        header(header: "Location: listado.php");
        
    } else {
        echo "<center><h1>La clave es incorrecta</h1></center>";
        session_destroy();
    }
} else {
    echo "<center><h1>El usuario no existe</h1></center>";
}
?>