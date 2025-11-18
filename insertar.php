<?php 
session_start();
if (!isset($_POST['para'])) {
    header("Location: listado.php");
    exit();
}
$host="localhost";
$usuario="root";
$clave= "";
$db="email";
$conexion=mysqli_connect($host,$usuario,$clave,$db);
if (!$conexion) {die("Error");}
$de = $_SESSION['usu'];
$para=$_POST['para'];
$fecha=$_POST['fecha'];
$asunto=$_POST['asunto'];
$cuerpo=$_POST['cuerpo'];
$sql= "insert into mensajes (de,para,fecha,asunto,cuerpo) values ('$de','$para','$fecha','$asunto','$cuerpo')";
$conexion->query($sql);

$l=mysqli_affected_rows($conexion);
if ($l==1) {
    header("Location: listado.php");
    exit();
} else {
    echo "<center><h1>No se ha podido insertar el registro</h1></center>";
}

mysqli_close($conexion);
?>