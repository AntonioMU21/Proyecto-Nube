<html>
<head>
<style>
    /* --- Estilos Generales --- */
    body {
        font-family: "Segoe UI", Arial, sans-serif; /* Fuente moderna */
        background-color: #f4f6f8; /* Fondo gris suave */
        margin: 0;
        padding: 20px;
    }

    /* --- Tu Banner (Intacto) --- */
    #banner {
        background: linear-gradient(to right, #0078d7, #005a9e);
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        color: white;
        font-size: 24px;
        font-weight: bold;
        border: none;
        text-align: center;
    }

    /* --- Nueva Caja para el Mensaje (Estilo Tarjeta) --- */
    .mensaje-card {
        background-color: white;
        width: 60%; /* Un ancho cómodo para leer */
        margin: 40px auto; /* Centrado y separado del banner */
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        text-align: left; /* El texto del correo se lee mejor alineado a la izquierda */
        color: #333;
        font-size: 16px;
        line-height: 1.6; /* Separación entre líneas para leer mejor */
    }

    h2 {
        color: #0078d7;
        margin-top: 0;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 10px;
    }

    /* --- Botón Volver --- */
    .btn-volver {
        display: inline-block;
        background-color: #6c757d; /* Gris elegante */
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        margin-top: 20px;
        transition: background 0.3s;
    }
    .btn-volver:hover {
        background-color: #5a6268;
    }
</style>
</head>
<body>

<center><table id="banner"><tr><td>WEB MAIL DEL DEPARTAMENTO</td></tr></table></center>

<?php
session_start();

$host = "localhost";
$usuario = "root";
$clave = "";
$db = "email";

$conexion = mysqli_connect($host, $usuario, $clave, $db);

// Recogemos el ID (usamos isset para evitar errores si entran directo)
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    
    $sql = "select cuerpo from mensajes where id='$id'";
    $resultado = $conexion->query($sql);
    
    if ($fila = $resultado->fetch_array()) {
        echo "<div align='center'>
        <div class='mensaje-card'>
            <h2>Contenido del Mensaje</h2>".$fila['cuerpo']."<br><br>
            <center><a href='listado.php' class='btn-volver'>Volver a la bandeja</a></center>
        </div>
        </div>";
    } else {
        echo "<br><center><h1>Mensaje no encontrado</h1><a href='listado.php' class='btn-volver'>Volver</a></center>";
    }

} else {
    echo "<br><center><h1>No has seleccionado ningún mensaje</h1><a href='listado.php' class='btn-volver'>Volver</a></center>";
}
?>

</body>
</html>