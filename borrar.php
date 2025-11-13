<html>
    <head></head>
    <body>
<?php
$host="localhost";
$usuario="root";
$clave= "";
$db="email";
$conexion=mysqli_connect($host,$usuario,$clave,$db);

if (!$conexion) {die("Error");}

$id=$_GET['ID'];

$sql= "delete from mensajes where ID='$id'";
$conexion->query($sql);

$l=mysqli_affected_rows($conexion);

if ($l==1) {
    header("Location: listado.php");
    exit();
} else {
    echo "<center><h1>No se ha podido borrar el registro</h1></center>";
}

mysqli_close($conexion);
?>
    </body>
</html>